#LaraFrame is a laravel quickstart.

Using laravel, bootstrap, vueJS and an admin template (for now its admin LTE), we create a base for creating web apps.

### The features on LaraFrame are:
+ User with dynamic roles and permission.
+ Menu management for sidebar and also customizable for other components
+ Menu access for each roles are managable
+ User Management
+ Dynamic settings and easily customizable

### Prerequisite:
+ Environment for laravel 5.2 (PHP >= 5.6, ..)
+ PHP Composer installed
+ Also npm latest version (npm v3.8.x and node 6.x.x) *optional

### Installation:

1. do composer install
    ```
    composer install
    ```

2. load the javascript node libraries using npm install
    ```
    npm install
    ```
    this is optional. if you don't really use node for development and only use plain javascript you may skip these.

3. Prepare a database, can be mysql, sqlite, etc.

4. Create `/.env` file and also `/config/database.php` file

5. For security, generate key using
   ```
   php artisan key:generate
   ```

6. Edit .env and config/database.php based on your database setting.

7. Use php artisan migrate to create database tables and also `--seed` for the dummy data.
   ```
   php artisan migrate --seed
   ```

8. Serve your lara-frame on http://localhost:8000
   ```
   php artisan serve
   ```