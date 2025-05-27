
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

git clone https://github.com/your-username/your-project-name.git

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

Edit the `.env` file and update your database settings:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=your_database_name
DB_USERNAME=your_database_user
DB_PASSWORD=your_database_password
```

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

