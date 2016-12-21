#LaraFrame is a laravel quickstart.

Using <a href="https://laravel.com">laravel</a>, <a href="https://getbootstrap.com">bootstrap</a>, <a href="https://vuejs.org">vueJS</a> and an admin template (for now its <a href="https://almsaeedstudio.com">admin LTE</a>), we create a base for creating web apps.

### The features on LaraFrame are:
+ User with dynamic roles and permission.
+ Menu management for sidebar and also customizable for other components
+ Menu access for each roles are managable
+ User Management
+ Dynamic settings and easily customizable

### Prerequisite:
+ Environment for <a href="https://laravel.com/docs/5.3/#server-requirements">laravel 5.3 </a> (PHP >= 5.5.9, ..)
+ PHP <a href="https://getcomposer.org">Composer</a> installed
+ Also <a href="https://nodejs.org/en/download">npm latest version</a> (npm v3.8.x and node 6.x.x) *optional

### Download:

To clone this branch repo (laravel 5.3 and vue 1.x)
```
git clone -b laravel5.3-vue1.x https://github.com/maulshh/lara-framework.git --single-branch
```

### Installation:

1. Prepare a database, can be mysql, sqlite, etc.

2. Create `/.env` file

3. do composer install
   ```
   composer install
   ```

4. For security, generate key using
   ```
   php artisan key:generate
   ```

5. Edit .env your database setting.

6. Use php artisan migrate to create database tables and also `--seed` for the dummy data.
   ```
   php artisan migrate --seed
   ```

7. load the javascript node libraries using npm install
   ```
   npm install
   ```
   gulp dependencies
   ```
   gulp --production
   ```

8. Serve your lara-frame on http://localhost:8000
   ```
   php artisan serve
   ```

9. Username and password for each roles are:
   + Webmaster : webmaster@laraframe.com / password
   + Admin : admin@laraframe.com / password
