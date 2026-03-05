Authentication: Stateless API auth using Laravel Sanctum.

RBAC: Role and Permission management (Admin, Organizer, Customer).

Event & Ticket Management: Full CRUD with advanced filtering and date-formatting logic.

Booking System: Mocked payment integration via dedicated Service Layers.

Performance: Strategic caching using Laravel 12’s Cache::memo() for request-lifecycle optimization.

Notifications: Real-time feedback via Mail/Database notifications.

## Installation
- `composer install`
- `php artisan app:setup-database `
- `composer require laravel/sanctum`
- `composer require --dev squizlabs/php_codesniffer friendsofphp/php-cs-fixer ./vendor/bin/phpcs --standard=PSR12 app/`

cp .env.example .env
php artisan key:generate

php artisan migrate:fresh --seed

## Usage

php artisan serve


## API documenttation

https://documenter.getpostman.com/view/36127848/2sB3QKsVih