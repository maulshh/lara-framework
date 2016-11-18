#LaraFrame is a laravel quickstart.

Using <a href="https://laravel.com">laravel</a>, <a href="https://getbootstrap.com">bootstrap</a>, <a href="https://vuejs.org">vueJS</a> and an admin template (for now its <a href="https://almsaeedstudio.com">admin LTE</a>), we create a base for creating web apps.

### The features on LaraFrame are:
+ User with dynamic roles and permission.
+ Menu management for sidebar and also customizable for other components
+ Menu access for each roles are managable
+ User Management
+ Dynamic settings and easily customizable

### Prerequisite:
+ Environment for <a href="https://laravel.com/docs/5.2/#server-requirements">laravel 5.2 </a> (PHP >= 5.5.9, ..)
+ PHP <a href="https://getcomposer.org">Composer</a> installed
+ Also <a href="https://nodejs.org/en/download">npm latest version</a> (npm v3.8.x and node 6.x.x) *optional

### Installation:

1. Prepare a database, can be mysql, sqlite, etc.

2. Create `/.env` file and also `/config/database.php` file

3. do composer install
   ```
   composer install
   ```

4. For security, generate key using
   ```
   php artisan key:generate
   ```

5. Edit .env and config/database.php based on your database setting.

6. Use php artisan migrate to create database tables and also `--seed` for the dummy data.
   ```
   php artisan migrate --seed
   ```

7. load the javascript node libraries using npm install
   ```
   npm install
   ```
   this is optional. if you don't really use node for development and only use plain javascript you may skip these.

8. Serve your lara-frame on http://localhost:8000
   ```
   php artisan serve
   ```

9. Username and password for each roles are:
   + Webmaster : webmaster@laraframe.com / password
   + Admin : admin@laraframe.com / password
