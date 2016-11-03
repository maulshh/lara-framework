#LaraFrame is a laravel quickstart.

Using laravel and an admin template (for now its admin LTE), we create a base for creating web apps.

### The features on LaraFrame are:
+ User with dynamic roles and permission.
+ Menu management for sidebar and also customizable for other components
+ Menu access for each roles are managable
+ User Management
+ Dynamic system setting and customizable
+ Service provider for permission and setting for an ease of accessing variables

### Prerequisite:
+ Environment for laravel (PHP >= 5.6, ..)
+ Composer installed
+ Also npm latest version (npm v3.8.x and node 6.x.x)
+ gulp cli

### Installation:

1. do composer install
    ```
    composer install
    ```

2. load the javascript node libraries using npm install
    ```
    npm install
    ```

3. Prepare a database, can be mysql, sqlite, etc.

4. Edit the `.env` file and also `config/database.php`

5. Comment on these two code, inside the boot method:
   `app\Providers\AppServiceProvider.php`
   ```php
        $settings = Setting::all();
        foreach($settings as $setting){
            define(strtoupper($setting->name), $setting->getValue());
        }
   ```

   `app\Providers\AuthServiceProvider.php`
   ```php
        foreach ($this->getPermissions() as $permission) {
            $gate->define($permission->name, function($user) use ($permission){
                return $user->hasRole($permission->roles);
            });
        }
   ```
   These codes are booted in php artisan and causes error before the database tables are created.

6. use php artisan migrate to create database tables and also `--seed` for the dummy data.
   ```
   php artisan optimize
   ```
   ```
   php artisan migrate --seed
   ```

7. gulp dependencies
   ```
   gulp
   ```

8. Uncomment the two codes on `app\Providers\AuthServiceProvider.php` and `app\Providers\AppServiceProvider.php`.

9. Serve your quickstart
   ```
   php artisan serve
   ```