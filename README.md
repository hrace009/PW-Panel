# Welcome to PW-Panel 👋

![Version](https://img.shields.io/badge/version-1.0-blue.svg?cacheSeconds=2592000)
[![Documentation](https://img.shields.io/badge/documentation-yes-brightgreen.svg)](doc)
[![License: GPLv2](https://img.shields.io/badge/License-GPLv2-yellow.svg)](lic)
[![Twitter: hrace009](https://img.shields.io/twitter/follow/hrace009.svg?style=social)](https://twitter.com/hrace009)

> Web panel for Perfect World MMORPG private server, powered with laravel and tailwindcss

### 🏠 [Homepage](https://youtube.com/c/hrace009)

## Requirements
1. [Composer](https://getcomposer.org/doc/00-intro.md#installation-linux-unix-macos) & [Git](https://github.com/git-guides/install-git)
2. PHP 7.3 or higher
3. PHP GD extension, not sure if you have it? Try to search it on [Google](https://gprivate.com/60ifz)

## Setup Environtment
1. Rename file `.env.example` to `.env`.
2. Change your database configuration at `.env` with text editor.
3. Change permissions to 777 for following folder / files:
   - storage/app/
   - storage/framework/
   - storage/logs/
   - bootstrap/cache/
   - .env

## Install
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
