#!/bin/bash

# Скрипт для настройки сервера под Laravel проект
# Использование: ./setup-server.sh [staging|production]

set -e

ENVIRONMENT=${1:-staging}
PROJECT_PATH="/var/www/mockexam"
DOCKER_COMPOSE_FILE="docker-compose.${ENVIRONMENT}.yml"

echo "🚀 Настройка сервера для окружения: $ENVIRONMENT"

# Обновляем систему
echo "📦 Обновление системы..."
sudo apt update && sudo apt upgrade -y

# Устанавливаем необходимые пакеты
echo "📦 Установка необходимых пакетов..."
sudo apt install -y curl git unzip software-properties-common apt-transport-https ca-certificates gnupg lsb-release

# Устанавливаем Docker
echo "🐳 Установка Docker..."
if ! command -v docker &> /dev/null; then
    curl -fsSL https://get.docker.com -o get-docker.sh
    sudo sh get-docker.sh
    sudo usermod -aG docker $USER
    rm get-docker.sh
fi

# Устанавливаем Docker Compose
echo "🐳 Установка Docker Compose..."
if ! command -v docker-compose &> /dev/null; then
    sudo curl -L "https://github.com/docker/compose/releases/latest/download/docker-compose-$(uname -s)-$(uname -m)" -o /usr/local/bin/docker-compose
    sudo chmod +x /usr/local/bin/docker-compose
fi

# Создаем директорию проекта
echo "📁 Создание директории проекта..."
sudo mkdir -p $PROJECT_PATH
sudo chown $USER:$USER $PROJECT_PATH

# Клонируем репозиторий (если еще не клонирован)
if [ ! -d "$PROJECT_PATH/.git" ]; then
    echo "📥 Клонирование репозитория..."
    git clone https://github.com/AIAnsar1/MockExam.git $PROJECT_PATH
fi

cd $PROJECT_PATH

# Создаем необходимые директории
echo "📁 Создание необходимых директорий..."
mkdir -p storage/app/public
mkdir -p storage/framework/cache
mkdir -p storage/framework/sessions
mkdir -p storage/framework/views
mkdir -p storage/logs
mkdir -p bootstrap/cache

# Устанавливаем права доступа
echo "🔐 Настройка прав доступа..."
sudo chown -R $USER:www-data storage bootstrap/cache
sudo chmod -R 775 storage bootstrap/cache

# Копируем файл окружения
echo "⚙️ Настройка окружения..."
if [ ! -f .env ]; then
    cp .env.$ENVIRONMENT .env
    echo "❗ Не забудьте настроить .env файл с вашими настройками!"
fi

# Создаем systemd сервис для автоматического запуска
echo "🔧 Создание systemd сервиса..."
sudo tee /etc/systemd/system/mockexam-$ENVIRONMENT.service > /dev/null <<EOF
[Unit]
Description=MockExam $ENVIRONMENT
Requires=docker.service
After=docker.service

[Service]
Type=oneshot
RemainAfterExit=yes
WorkingDirectory=$PROJECT_PATH
ExecStart=/usr/local/bin/docker-compose -f $DOCKER_COMPOSE_FILE up -d
ExecStop=/usr/local/bin/docker-compose -f $DOCKER_COMPOSE_FILE down
TimeoutStartSec=0

[Install]
WantedBy=multi-user.target
EOF

sudo systemctl daemon-reload
sudo systemctl enable mockexam-$ENVIRONMENT

# Настраиваем логротацию
echo "📝 Настройка логротации..."
sudo tee /etc/logrotate.d/mockexam > /dev/null <<EOF
$PROJECT_PATH/storage/logs/*.log {
    daily
    missingok
    rotate 14
    compress
    notifempty
    create 0644 www-data www-data
    postrotate
        docker-compose -f $PROJECT_PATH/$DOCKER_COMPOSE_FILE exec app php artisan queue:restart > /dev/null 2>&1 || true
    endscript
}
EOF

# Создаем скрипт для деплоя
echo "🚀 Создание скрипта деплоя..."
tee deploy-$ENVIRONMENT.sh > /dev/null <<EOF
#!/bin/bash
set -e

cd $PROJECT_PATH

echo "🚀 Начинаем деплой $ENVIRONMENT..."

# Обновляем код
git pull origin ${ENVIRONMENT == "production" ? "main" : "develop"}

# Логинимся в registry (токен должен быть в переменных окружения)
echo \$GITHUB_TOKEN | docker login ghcr.io -u \$GITHUB_USER --password-stdin

# Останавливаем контейнеры
docker-compose -f $DOCKER_COMPOSE_FILE down

# Обновляем образы
docker-compose -f $DOCKER_COMPOSE_FILE pull

# Запускаем контейнеры
docker-compose -f $DOCKER_COMPOSE_FILE up -d

# Ждем запуска
sleep 15

# Выполняем миграции
docker-compose -f $DOCKER_COMPOSE_FILE exec -T app php artisan migrate --force

# Очищаем кеш
docker-compose -f $DOCKER_COMPOSE_FILE exec -T app php artisan config:cache
docker-compose -f $DOCKER_COMPOSE_FILE exec -T app php artisan route:cache
docker-compose -f $DOCKER_COMPOSE_FILE exec -T app php artisan view:cache

# Перезапускаем очереди
docker-compose -f $DOCKER_COMPOSE_FILE exec -T app php artisan queue:restart

# Очищаем старые образы
docker image prune -f

echo "✅ Деплой $ENVIRONMENT завершен!"
EOF

chmod +x deploy-$ENVIRONMENT.sh

echo "✅ Настройка сервера завершена!"
echo ""
echo "📋 Следующие шаги:"
echo "1. Настройте .env файл с вашими параметрами"
echo "2. Настройте SSL сертификаты для nginx"
echo "3. Настройте переменные окружения GITHUB_TOKEN и GITHUB_USER для деплоя"
echo "4. Запустите проект: sudo systemctl start mockexam-$ENVIRONMENT"
echo ""
echo "🔧 Полезные команды:"
echo "- Просмотр логов: docker-compose -f $DOCKER_COMPOSE_FILE logs -f"
echo "- Перезапуск: sudo systemctl restart mockexam-$ENVIRONMENT"
echo "- Деплой: ./deploy-$ENVIRONMENT.sh"