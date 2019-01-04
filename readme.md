<p align="center"><img src="https://laravel.com/assets/img/components/logo-laravel.svg"></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/d/total.svg" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p>

## Install the Application

First clone application

Go to the clone directory and run composer install or composer update.

	composer install


* Ensure `logs/` is web writeable.

In ubuntu permission issues run following command:

    `sudo chmod 777 storage/logs/`
    `sudo chmod 777 bootstrap/cache/`

Permission for image folder writable:
	
	`sudo chmod 777 storage/`

use below command for env file.
	
	`cp .env.example .env`

use below key for generate key and link storage with public.

	`php artisan key:generate`
	`php artisan storage:link`

Set your database credentials like username, password, database name in env file then need to run below command.

	`php artisan config:cache`

run below command to generate table in database

	`php artisan migrate`

run below command for seeder.
	
	`php artisan db:seed`

That's it! Now go build something cool.

# PROJECT DESCRIPTION
```
	- We have used migration for creating database structure.
	- We have used seeder for creating admin user.
	- After runnig seeder below are the login credential for login.
		email - admin@gmail.com
		password - admin
	- We have used laravel eloquent queries in controller.
```
## APPLICAION MODULES

Module:
```
	Admin:
	 1) Users module 
	 	Users (CRUD) can add user with user role only.
	 2) Images module
	 	Images can be add from admin side to show it in user side.
	 3) Pages module
	 	Admin can add page toshow in user side like about us page.

	User:
	 1) Image like unlike function.
	 2) User can review images without login.
	 3) If user click on like then it pops up the model to login in to system.
	 4) User can show dynamic pages added from admin side.

```