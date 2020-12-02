## Property Analytics

This is a property analytics api build on Lumen PHP Framework.

## How to run the application

Please populate the .env file with the database credentials.

Please run composer install to install the dependencies.

Please run 

``` bash
php artisan migrate
php artisan db:seed
```
to get the DB schema. 

You will need to give read, write (755) permission to /storage folder
To run test
``` bash
vendor/bin/phpunit
```

## Scope of improvements (Due to time limitations)

I have not used indexes on the tables

There could have been logs for debugging

Data validation is done only in one model.

There is only on test written just to give an idea. There could be more tests written.

Api authorisation is not considered.

Api documentation is not done. 

I had plan to do an event driven development for example, when a property is created, there will be an event fired and an event listener will send email to a property manager. Did not do it due to time constrains.


# Lumen PHP Framework

[![Build Status](https://travis-ci.org/laravel/lumen-framework.svg)](https://travis-ci.org/laravel/lumen-framework)
[![Total Downloads](https://poser.pugx.org/laravel/lumen-framework/d/total.svg)](https://packagist.org/packages/laravel/lumen-framework)
[![Latest Stable Version](https://poser.pugx.org/laravel/lumen-framework/v/stable.svg)](https://packagist.org/packages/laravel/lumen-framework)
[![License](https://poser.pugx.org/laravel/lumen-framework/license.svg)](https://packagist.org/packages/laravel/lumen-framework)

Laravel Lumen is a stunningly fast PHP micro-framework for building web applications with expressive, elegant syntax. We believe development must be an enjoyable, creative experience to be truly fulfilling. Lumen attempts to take the pain out of development by easing common tasks used in the majority of web projects, such as routing, database abstraction, queueing, and caching.
