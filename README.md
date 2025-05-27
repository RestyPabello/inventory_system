
## CRUD API with Laravel 12

A simple CRUD (Create, Read, Update, Delete) API built with Laravel 12. This API handles a `Post` resource with basic operations.

## Dependencies

- **Composer**: Latest stable version (2.x)
- **Node.js**: v22.x
- **NPM**: >= 10.9.x
- **PHP**: >= 8.2.x
- **Database**: MySQL 5.7+ or MariaDB 10.4+ 

## Installing

Follow the steps below to set up the project locally:

### 1. Clone the repository

Start by cloning the project repository to your local machine:

```bash
git clone https://github.com/your-username/your-project-name.git
```

### 2. Install PHP and JS Dependencies

```bash
composer install
```
```bash
npm install
```

### 3. Copy Environment File

```bash
cp .env.example .env
```

### 4. Generate Application Key

```bash
php artisan key:generate
```

### 5. Configure Environment

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=your_database_name
DB_USERNAME=your_database_user
DB_PASSWORD=your_database_password


### 6. Run Migrations

```bash
php artisan migrate
```

### 7. Seed the Database (with Factory)

```bash
php artisan db:seed --class=ItemSeeder
```

### 8. Seed the Database (with Factory)

```bash
php artisan serve
```
### Visit your app at:
http://localhost:8000



<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.