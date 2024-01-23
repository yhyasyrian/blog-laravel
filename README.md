# blog laravel
simple example for create blog with laravel and tailwindcss, This is a training project
## Installation
```bash
git clone https://github.com/yhyasyrian/blog-laravel
cd blog-laravel
composer install
npm i
npm run build
```
## Config project
```bash
cp .env.example .env
```
Then edit file `.env` and you should create account in site `tiny.cloud` after this step, you must create table
```bash
php artisan migrate
```
And you can create test data with command:
```bash
php artisan db:seed
```
And if you don't want create test data, you should run this command:
```bash
php artisan db:seed --class=PostSeeder
```
You can create cache file for improve performance:
```bash
php artisan view:cache
php artisan route:cache
php artisan config:cache 
```
## Features
* Responsive location on various screens
* Supports Arabic and English languages and can add second languages
* Simple control panel
* The authority of editors, so that they can only publish blog posts
* Search engine optimization is done through a tool `artesaos/seotools`
* dark mode
## Contributing
Contributions are welcome!
