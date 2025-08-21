# MockExam - Laravel API with Octane & PostgreSQL

![Laravel](https://img.shields.io/badge/Laravel-12.x-red)
![PHP](https://img.shields.io/badge/PHP-8.2-blue)
![PostgreSQL](https://img.shields.io/badge/PostgreSQL-15-blue)
![Redis](https://img.shields.io/badge/Redis-7-red)
![Docker](https://img.shields.io/badge/Docker-Ready-blue)
![Kubernetes](https://img.shields.io/badge/Kubernetes-Ready-blue)

A comprehensive Laravel-based mock examination platform with advanced features including teacher/student profiles, course management, exam creation, and real-time performance analytics.

## Features

- **User Management**: Multi-role authentication (Admin, Teacher, Student)
- **Course Management**: Create and manage courses with categories
- **Exam System**: Comprehensive exam creation and management
- **Profile System**: Separate teacher and student profiles with specialized fields
- **API Resources**: Complete RESTful API with proper resource transformations
- **Performance**: Laravel Octane with Swoole for high performance
- **Database**: PostgreSQL with optimized migrations and relationships
- **Caching**: Redis for session, cache, and queue management
- **Admin Panel**: Filament-based admin interface
- **Testing**: Comprehensive test suite with PHPUnit
- **CI/CD**: Complete GitHub Actions and Jenkins pipelines

## Tech Stack

| Component | Version | Purpose |
|-----------|---------|---------|
| Laravel | 12.x | PHP Framework |
| PHP | 8.2 | Backend Language |
| PostgreSQL | 15 | Primary Database |
| Redis | 7 | Cache & Sessions |
| Laravel Octane | Latest | Performance Layer |
| Filament | Latest | Admin Panel |
| Docker | Latest | Containerization |
| Kubernetes | Latest | Orchestration |

## Quick Start

### Prerequisites

- PHP 8.2+
- Composer
- Node.js 18+
- PostgreSQL 15+
- Redis 7+

### Local Development

1. **Clone the repository**
   ```bash
   git clone <repository-url>
   cd MockExam
   ```

2. **Install dependencies**
   ```bash
   composer install
   npm install
   ```

3. **Environment setup**
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

4. **Database setup**
   ```bash
   php artisan migrate:fresh --seed
   ```

5. **Build assets**
   ```bash
   npm run build
   ```

6. **Start development server**
   ```bash
   php artisan octane:start
   ```

### Docker Development

1. **Start services**
   ```bash
   docker-compose up -d
   ```

2. **Run migrations**
   ```bash
   docker-compose exec app php artisan migrate:fresh --seed
   ```

3. **Access application**
   - Web: http://localhost
   - API: http://localhost:8000/docs/api
   - Admin: http://localhost/admin

## Production Deployment

### Docker Production

```bash
docker-compose -f docker-compose.prod.yml up -d
```

### Kubernetes Deployment

```bash
cd k8s
./deploy.sh deploy
```

## API Documentation

### Authentication Endpoints
- `POST /api/auth/login` - User login
- `POST /api/auth/register` - User registration
- `POST /api/auth/logout` - User logout

### Core Resources
- `GET /api/courses` - List courses
- `GET /api/exams` - List exams
- `GET /api/categories` - List categories
- `GET /api/teacher-profiles` - Teacher profiles
- `GET /api/student-profiles` - Student profiles

### Health Check
- `GET /api/health` - Application health status

## Database Schema

### Key Models
- **User**: Base user authentication
- **TeacherProfile**: Teacher-specific data (education, certificates, experience)
- **StudentProfile**: Student-specific data (subjects, progress, certificates)
- **Course**: Course management
- **Exam**: Exam creation and management
- **Question**: Exam questions with multiple choice answers
- **ExamAttempt**: Student exam attempts and results

### Relationships
- Users have one TeacherProfile or StudentProfile
- Teachers can create multiple Courses
- Courses can have multiple Exams
- Students can attempt multiple Exams
- Many-to-many relationship between Students and Teachers

## CI/CD Pipelines

### GitHub Actions
- **Main Pipeline**: `.github/workflows/ci-cd.yml`
- **Docker Build**: `.github/workflows/docker-build.yml`
- **Deployment**: `.github/workflows/deploy.yml`
- **Security Scanning**: `.github/workflows/security.yml`
- **Performance Testing**: `.github/workflows/performance.yml`

### Jenkins
- **Pipeline**: `JenkinsFile`
- Supports PostgreSQL, Redis, Docker, and Kubernetes deployment

### Pipeline Features
- Automated testing (PHPUnit, Feature, Unit)
- Code quality checks (PHP CS Fixer, PHPStan)
- Security scanning (Composer Audit, CodeQL)
- Performance testing (Lighthouse, K6)
- Docker image building and vulnerability scanning
- Kubernetes deployment with rolling updates

## Testing

### Run Tests
```bash
# All tests
php artisan test

# Specific test suite
php artisan test --testsuite=Feature
php artisan test --testsuite=Unit

# With coverage
php artisan test --coverage
```

### Performance Testing
```bash
# Load testing with K6
k6 run tests/performance/load-test.js
```

## Monitoring

### Health Endpoints
- `/api/health` - Application health
- `/metrics` - Prometheus metrics (when enabled)

### Kubernetes Monitoring
- Prometheus ServiceMonitor configured
- Grafana dashboards available
- Alert rules for critical metrics

## Security

### Features
- JWT Authentication
- Rate limiting
- CORS configuration
- SQL injection protection
- XSS protection
- CSRF protection

### Security Scanning
- Automated dependency vulnerability scanning
- CodeQL security analysis
- Secret scanning with TruffleHog

## Contributing

1. Fork the repository
2. Create a feature branch
3. Make your changes
4. Add tests for new functionality
5. Run the test suite
6. Submit a pull request


