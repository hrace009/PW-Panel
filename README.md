# Welcome to PW-Panel 👋

![Version](https://img.shields.io/badge/version-1.1-blue.svg?cacheSeconds=2592000)
[![Documentation](https://img.shields.io/badge/documentation-yes-brightgreen.svg)](doc)
[![License: GPLv2](https://img.shields.io/badge/License-GPLv2-yellow.svg)](lic)
[![Twitter: hrace009](https://img.shields.io/twitter/follow/hrace009.svg?style=social)](https://twitter.com/hrace009)

> Web panel for Perfect World MMORPG private server, powered with laravel and tailwindcss
>
> NOTE:
> - THIS PANEL STILL HAVE A LOT OF BUG, YOU SHOULD FIX IT BY YOUR SELF, I DON'T HAVE TIME TO FIX IT
> - THIS PANEL NOT COMPATIBLE WITH VERSION 1.6.X OR 1.7.X

### 🏠 [Homepage](https://youtube.com/c/hrace009)

## Requirements
- [Composer](https://getcomposer.org/doc/00-intro.md#installation-linux-unix-macos) & [Git](https://github.com/git-guides/install-git)
- PHP >= 7.3
- BCMath PHP Extension
- GD PHP Extension, not sure if you have it? Try to search it on [Google](https://gprivate.com/60ifz)
- Ctype PHP Extension
- Fileinfo PHP Extension
- JSON PHP Extension
- Mbstring PHP Extension
- OpenSSL PHP Extension
- PDO PHP Extension
- Tokenizer PHP Extension
- XML PHP Extension

## Setup Environtment
1. Rename file `.env.example` to `.env`.
2. Change your database configuration at `.env` with text editor.
3. Change permissions to 777 for following folder / files:
   - storage/app/
   - storage/framework/
   - storage/logs/
   - bootstrap/cache/
   - .env
  
# Server Configuration
## Nginx
If you are deploying your application to a server that is running Nginx, you may use the following configuration file as a starting point for configuring your web server. Most likely, this file will need to be customized depending on your server's

Please ensure, like the configuration below, your web server directs all requests to your application's `public/index.php` file. You should never attempt to move the `index.php` file to your project's root, as serving the application from the project root will expose many sensitive configuration files to the public Internet:

```
server {
    listen 80;
    listen [::]:80;
    server_name example.com;
    root /srv/example.com/public;
 
    add_header X-Frame-Options "SAMEORIGIN";
    add_header X-Content-Type-Options "nosniff";
 
    index index.php;
 
    charset utf-8;
 
    location / {
        try_files $uri $uri/ /index.php?$query_string;
    }
 
    location = /favicon.ico { access_log off; log_not_found off; }
    location = /robots.txt  { access_log off; log_not_found off; }
 
    error_page 404 /index.php;
 
    location ~ \.php$ {
        fastcgi_pass unix:/var/run/php/php7.4-fpm.sock;
        fastcgi_param SCRIPT_FILENAME $realpath_root$fastcgi_script_name;
        include fastcgi_params;
    }
 
    location ~ /\.(?!well-known).* {
        deny all;
    }
}
```
## Apache
If you are deploying your application to a server that is running apache2, you may use the following configuration file as a starting point for configuring your web server. Most likely, this file will need to be customized depending on your server's

Please ensure, like the configuration below, your web server directs all requests to your application's `public/index.php` file. You should never attempt to move the `index.php` file to your project's root, as serving the application from the project root will expose many sensitive configuration files to the public Internet:
```
# cd /etc/apache2/sites-available
# nano pwpanel.conf
```
Fill this configuration (Replace example.com to your domain)
```
<VirtualHost *:80>
	ServerAdmin webmaster@localhost
	DocumentRoot /var/www/example.com/public
	ServerName example.com

	<Directory /var/www/example.com>
       		AllowOverride All
   	</Directory>

	ErrorLog /var/www/logs/example.com-error.log
	CustomLog /var/www/logs/example.com-access.log combined
</VirtualHost>
```
Save and close the file.

Disable the virtual host configuration file in Apache by running this command: 
```
a2dissite 000-default.conf
```
Activate the new virtual host:
```
a2ensite pwpanel.conf
```
Enable the Apache rewrite module, then restart the Apache service:
```
a2enmod rewrite
systemctl restart apache2
```
# Optimization
## Autoloader Optimization
When deploying to production, make sure that you are optimizing Composer's class autoloader map so Composer can quickly find the proper file to load for a given class:
```
composer install --optimize-autoloader --no-dev
```
> In addition to optimizing the autoloader, you should always be sure to include a composer.lock file in your project's source control repository. Your project's dependencies can be installed much faster when a composer.lock file is present.

## Optimizing Configuration Loading
When deploying your application to production, you should make sure that you run the `config:cache` Artisan command during your deployment process:
```
php artisan config:cache
```
This command will combine all of Laravel's configuration files into a single, cached file, which greatly reduces the number of trips the framework must make to the filesystem when loading your configuration values.
> If you execute the `config:cache` command during your deployment process, you should be sure that you are only calling the `env` function from within your configuration files. Once the configuration has been cached, the `.env` file will not be loaded and all calls to the `env` function for `.env` variables will return `null`.

# Optimizing Route Loading
If you are building a large application with many routes, you should make sure that you are running the `route:cache` Artisan command during your deployment process:
```
php artisan route:cache
```
This command reduces all of your route registrations into a single method call within a cached file, improving the performance of route registration when registering hundreds of routes.

# Optimizing View Loading
When deploying your application to production, you should make sure that you run the `view:cache` Artisan command during your deployment process:
```
php artisan view:cache
```
This command precompiles all your Blade views so they are not compiled on demand, improving the performance of each request that returns a view.

# Debug Mode
The debug option in your config/app.php configuration file determines how much information about an error is actually displayed to the user. By default, this option is set to respect the value of the APP_DEBUG environment variable, which is stored in your .env file.

In your production environment, this value should always be `false`. If the `APP_DEBUG` variable is set to `true` in production, you risk exposing sensitive configuration values to your application's end users.

## Import to Database:
Import database dump from this package, you can find it on your root PW Panel named [dbo.sql](https://github.com/hrace009/PW-Panel/blob/master/dbo.sql)
## Install PW Panel
Note: Make sure your inside the `pw-panel` directory when you run the commands.
```sh
composer install
```
Run the migration
```sh
php artisan migrate
```
Seed database
```sh
php artisan db:seed --class=ServiceSeeder
```
Generate Application Key
```sh
php artisan key:generate
```
Create new Administrator
```sh
php artisan pw:createAdmin
```

## Author
👤 **Harris Marfel**
* Website: https://youtube.com/hrace009
* Twitter: [@hrace009](https://twitter.com/hrace009)
* Github: [@hrace009](https://github.com/hrace009)
* LinkedIn: [@harris-yogasara](https://linkedin.com/in/harris-yogasara)

## 📝 License
Copyright © 2022 [Harris Marfel](https://github.com/hrace009).
Base Code From [@tomirons](https://github.com/tomirons/pw-web)
