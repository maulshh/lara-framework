#LaraFrame is a laravel quickstart.

Using <a href="https://laravel.com">laravel</a>, <a href="https://getbootstrap.com">bootstrap</a>, <a href="https://vuejs.org">vueJS</a> and an admin template (for now its <a href="https://almsaeedstudio.com">admin LTE</a>), we create a base for creating web apps.

### The features on LaraFrame are:
+ User with dynamic roles and permission.
+ Menu management for sidebar and also customizable for other components
+ Menu access for each roles are managable
+ User Management
+ Dynamic settings and easily customizable

### Prerequisite:
+ Environment for <a href="https://laravel.com/docs/5.3/#server-requirements">laravel 5.3 </a> (PHP >= 5.6.4, ..)
+ PHP <a href="https://getcomposer.org">Composer</a> installed
+ Also <a href="https://nodejs.org/en/download">npm latest version</a> (npm v3.8.x and node 6.x.x)

### Download:

To clone this repo (dev branch)
```
git clone https://github.com/maulshh/lara-framework.git
```

### Installation:

1. Prepare a database, can be mysql, sqlite, etc.

2. do composer install
   ```
   composer install
   ```

3. Edit .env based on your database setting.

4. Use php artisan migrate to create database tables and also `--seed` for the dummy data.
   ```
   php artisan migrate --seed
   ```

5. load the javascript node libraries using npm install
   ```
   npm install
   ```
   gulp dependencies
   ```
   gulp --production
   ```

6. Serve your lara-frame on http://localhost:8000
   ```
   php artisan serve
   ```

7. Username and password for each roles are:
   + Webmaster : webmaster@bengkel.com / password
   + Admin : admin@bengel.com / password