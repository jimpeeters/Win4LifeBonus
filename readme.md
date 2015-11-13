Deploy document

1	Concept

Het thema van deze wedstrijd is win for life. Wanneer je een kraslotje koopt krijg je een extra code bij elk lot. Elke maand worden er lotjes uitgebracht met extra codes op. Op 1 van deze lotjes staat een winnende code van die maand. De winnaar mag levenslang elk jaar gratis op reis. Je geeft de code in op de website en dan zal je nog eens een lotje mogen krabben dat bekent maakt of je gewonnen hebt of niet.

2	Gegevens 

2.1	Codes

Dit is een lijst met alle geldige codes , kan aangevuld worden in ‘database/seed/ValidcodesTableSeeder.php’ : 

Winnende codes :

1110578abc November 
245178bxwb December
136578ghec Januari
548205abfc Februari
Verliezende codes
165478gfgc November
692578avfc November
6548578sdc November
5654821abc December
154578adfc December
145578fdfc December
456978qkfc Januari
564878aafc Januari
184578adfc Februari
159578adfk Februari	

2.2	Admin account

Je kan inloggen met ‘admin@test.be’ en wachtwoord ‘root’ om de bestaande accounts te beheren. 

3	Webhosting handleiding 

1) maak een account op c9 
2) pull uw git repository met laravel project
3) kies php als template
4) do de composer update command in uw root folder
5) bij setting klik op ‘show hidden files’
6) rename de file env.example naar env
7) maak een nieuwe application key aan met deze command: 
	php artisan key:generate
8) zet uw public folder als rootfolder bij apache :
    cat /etc/apache2/sites-enabled/001-cloud9.conf
    
    <VirtualHost *:8080>    DocumentRoot /home/ubuntu/workspace/public
 
9) open de database.php file uit de config folder
10) verander settings : 

'mysql' => [
               'driver' => 'mysql',
               'host' => '127.0.0.1', //here goes your host 127.0.0.1 by default
               'database' => 'c9', //here goes your database name c9 by default
               'username' => 'root', //here goes your default username as you view using mysql-ctl cli command
               'password' => '', //here goes your password leave it blank
               'charset' => 'utf8',
               'collation' => 'utf8_unicode_ci',
               'prefix' => '',
        ]
 
11) doe volgende commands : 

mysql-ctl cli  
use c9; 

12) paste hier nu de SQL query die je vanuit phpmyadmin exporteerd 


## Laravel PHP Framework

[![Build Status](https://travis-ci.org/laravel/framework.svg)](https://travis-ci.org/laravel/framework)
[![Total Downloads](https://poser.pugx.org/laravel/framework/d/total.svg)](https://packagist.org/packages/laravel/framework)
[![Latest Stable Version](https://poser.pugx.org/laravel/framework/v/stable.svg)](https://packagist.org/packages/laravel/framework)
[![Latest Unstable Version](https://poser.pugx.org/laravel/framework/v/unstable.svg)](https://packagist.org/packages/laravel/framework)
[![License](https://poser.pugx.org/laravel/framework/license.svg)](https://packagist.org/packages/laravel/framework)

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable, creative experience to be truly fulfilling. Laravel attempts to take the pain out of development by easing common tasks used in the majority of web projects, such as authentication, routing, sessions, queueing, and caching.

Laravel is accessible, yet powerful, providing powerful tools needed for large, robust applications. A superb inversion of control container, expressive migration system, and tightly integrated unit testing support give you the tools you need to build any application with which you are tasked.

## Official Documentation

Documentation for the framework can be found on the [Laravel website](http://laravel.com/docs).

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](http://laravel.com/docs/contributions).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell at taylor@laravel.com. All security vulnerabilities will be promptly addressed.

### License

The Laravel framework is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT)



