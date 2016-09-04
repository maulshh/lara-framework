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
+ Environment for laravel (PHP 5.5, composer ..)
+ npm, gulp cli

### Installation:

<pre>composer install</pre>
<pre>npm install</pre>

Prepare a database, can be mysql, sqlite, etc.

Edit the ``.env` file and also `config/database.php`

comment on these two code, inside the boot method:

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
these codes are booted in php artisan and causes error before the database tables are created.

<pre>php artisan migrate --seed</pre>

<pre>gulp</pre>

uncomment the two codes on `app\Providers\AuthServiceProvider.php` and `app\Providers\AppServiceProvider.php`.

<pre>php artisan serve</pre>