# Настройка CI/CD для Laravel MockExam проекта

## Обзор

Современная CI/CD система для Laravel + PostgreSQL + Redis + Docker проекта с автоматическим тестированием, сборкой и деплоем.

## Структура Workflows

### 1. `ci.yml` - Основной CI/CD pipeline
- Тестирование и проверка качества кода
- Сборка Docker образа
- Автоматический деплой на staging/production
- Уведомления о результатах

### 2. `pr-checks.yml` - Проверки для Pull Request'ов
- Быстрые тесты и проверка стиля кода
- Проверка совместимости с разными версиями PHP
- Проверки безопасности

### 3. `security.yml` - Проверки безопасности
- Сканирование зависимостей
- CodeQL анализ кода
- Поиск секретов в коде
- Сканирование Docker образов

## Необходимые настройки

### GitHub Secrets
Добавь следующие секреты в настройках репозитория:

#### Для Staging
- `STAGING_SSH_KEY` - Приватный SSH ключ для доступа к staging серверу
- `STAGING_USER` - Пользователь на staging сервере
- `STAGING_HOST` - IP или домен staging сервера
- `STAGING_PATH` - Путь к проекту на staging сервере

#### Для Production
- `PRODUCTION_SSH_KEY` - Приватный SSH ключ для доступа к production серверу
- `PRODUCTION_USER` - Пользователь на production сервере
- `PRODUCTION_HOST` - IP или домен production сервера
- `PRODUCTION_PATH` - Путь к проекту на production сервере

#### База данных
- `DB_PASSWORD` - Пароль для PostgreSQL

### GitHub Variables
Добавь следующие переменные в настройках репозитория:

- `STAGING_URL` - URL staging окружения (например: https://staging.yourapp.com)
- `PRODUCTION_URL` - URL production окружения (например: https://yourapp.com)

### Environments
Создай environments в GitHub:
1. `staging` - для staging окружения
2. `production` - для production окружения (с защитой и approval)

## Подготовка серверов

### 1. Установка Docker и Docker Compose на серверах
```bash
# Установка Docker
curl -fsSL https://get.docker.com -o get-docker.sh
sudo sh get-docker.sh

# Установка Docker Compose
sudo curl -L "https://github.com/docker/compose/releases/latest/download/docker-compose-$(uname -s)-$(uname -m)" -o /usr/local/bin/docker-compose
sudo chmod +x /usr/local/bin/docker-compose
```

### 2. Настройка SSH ключей
```bash
# Генерация SSH ключа (на локальной машине)
ssh-keygen -t rsa -b 4096 -C "deploy@yourapp.com"

# Копирование публичного ключа на сервер
ssh-copy-id user@your-server.com
```

### 3. Структура проекта на сервере
```
/var/www/yourapp/
├── docker-compose.staging.yml (или docker-compose.prod.yml)
├── .env
├── storage/
├── bootstrap/cache/
└── ... (остальные файлы проекта)
```

## Использование

### Деплой на Staging
1. Создай Pull Request в ветку `develop`
2. После merge автоматически запустится деплой на staging

### Деплой на Production
1. Создай Pull Request в ветку `main`
2. После merge автоматически запустится деплой на production

### Мониторинг
- Проверяй статус deployments в разделе Actions
- Health checks доступны по адресам:
  - `/up` - встроенный Laravel health check
  - `/health` - расширенный health check с проверкой сервисов
  - `/api/health` - API health check

## Локальная разработка

### Запуск с Laravel Sail
```bash
# Первый запуск
./vendor/bin/sail up -d
./vendor/bin/sail artisan migrate:fresh --seed

# Ежедневная работа
./vendor/bin/sail up -d
./vendor/bin/sail artisan test
```

### Проверка стиля кода
```bash
./vendor/bin/sail artisan pint
```

### Запуск тестов
```bash
./vendor/bin/sail artisan test
```

## Troubleshooting

### Проблемы с Docker Registry
Убедись что GitHub Token имеет права на packages:write

### Проблемы с SSH
Проверь что SSH ключи правильно настроены и пользователь имеет права на выполнение docker команд

### Проблемы с базой данных
Убедись что PostgreSQL запущен и доступен, проверь переменные окружения

## Дополнительные возможности

### Уведомления в Slack/Discord
Раскомментируй и настрой секции notify в workflows

### Мониторинг производительности
Workflow `performance.yml` включает Lighthouse и K6 тесты

### Проверки безопасности
Workflow `security.yml` включает сканирование зависимостей и кода

## Быстрый старт

### 1. Настройка GitHub
```bash
# Зайди в GitHub → Settings → Secrets and variables → Actions
# Добавь секреты (см. раздел "GitHub Secrets" выше)
```

### 2. Настройка сервера
```bash
# Скачай и запусти скрипт настройки
curl -O https://raw.githubusercontent.com/AIAnsar1/MockExam/main/scripts/setup-server.sh
chmod +x setup-server.sh
./setup-server.sh staging  # или production
```

### 3. Первый деплой
```bash
# Push в develop для staging
git push origin develop

# Push в main для production  
git push origin main
```

## Что происходит автоматически:

✅ **При создании PR** → быстрые тесты и проверки  
✅ **При push в develop** → полные тесты + деплой на staging  
✅ **При push в main** → полные тесты + деплой на production  
✅ **Еженедельно** → проверки безопасности  
✅ **При каждом push** → сканирование Docker образов  

## Мониторинг и управление

### Health Check endpoints:
- `/up` - встроенный Laravel health check
- `/health` - расширенный с проверкой сервисов

### Полезные команды на сервере:
```bash
# Просмотр логов
docker-compose -f docker-compose.staging.yml logs -f

# Ручной деплой
./deploy-staging.sh

# Перезапуск сервисов
sudo systemctl restart mockexam-staging
```

## Готово! 🎉

Теперь у тебя полностью автоматизированная CI/CD система для Laravel проекта!