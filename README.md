Pure 360 Development Test - GeoIP
=============================


Describes the install procedures and the app usage.

----------

Information
----------------

This project was developed in Laravel, using MySQL database.
You can run easily with vagrant or you need to configure you WebServer and Database to use the project. 

Requirements
-------------------

- Apache or Nginx
- PHP 7.0 or more recent version
- Composer
- MySQL or MariaDB

Installation
----------------

Download or clone  the repository to a configured webserver. You can use a localhost or configure a virtual host or server block if you are using Nginx.

```
git clone https://github.com/rodrigosaraiva/geoiplite_test.git
```
Go to the project root path and if you don't have installed Composer yet, follow this instructions to do, according to you SO: https://getcomposer.org/doc/00-intro.md

Execute this command:
```
composer install
```
At the the project root path and make a **.env.example** file a copy named **.env**.

Change the following parameters:

```
. . .

APP_URL=http://<your URL, could be localhost>

DB_CONNECTION=mysql
DB_HOST=<your DB Host>
DB_PORT=3306
DB_DATABASE=<your database name>
DB_USERNAME=<your database username>
DB_PASSWORD=<your database password>

-- Certify that the queue driver is defined like database
QUEUE_DRIVER=database

```

Than you can run the command to create the tables:
```
php artisan migrate
```

finally, you can run the command to start listen queues:
```
php artisan queue:work
```

**From now on the application is ready for use.**

Usage
----------------

Use the application is simple:

http://yourappbaseURL/api/v1/geoip/127.0.0.1

http://yourappbaseURL/api/v1/geoip/5.133.204.200

http://yourappbaseURL/api/v1/geoip/127.0.0.543

At the first time, the app you return a 503 error code because the database is empty.
Than the app will get the GeoipFile and populate the database.

Tests
----------------

To run the tests you can run this command at project root path:
```
phpunit
