# Laravel LMS With CMS Dashboard

Monitor student grades, Work Material Modules also includes user roles for admin, teacher, students with notification.

## Getting Started
Please follow the instructions below to setup the project:

1. Open CMD a navigate to `Laravel-LearningManagementSystem-CMS-Firebase-FCM` diretory
2. Run command `composer install` to install require dependencies.
3. Setup/configure `.env` file from line
```php
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=resettlement
DB_USERNAME=root
DB_PASSWORD=
```
4. Replace the firebase configuration with your config under `app/http/controllers/admin/Firebase/Wekonek.json`
5. Run command `php artisan migrate` to migrate tables on mysql database
6. Run command `php artisan serve`

Project will run at port `127.0.0.1:8000`

End
