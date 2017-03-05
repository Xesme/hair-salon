# Hair Salon Database

#### _A webpage that simulates a hair salon database, 24th February 2017_

#### By _**Xia Amendolara**_

## Description

This web application that simulates a management database for a hair salon, and allows the user to manage stylists as well as client list.

## User Story
* Write PHPUnit tests to create a Stylist class. It must contain the following methods: constructor, getters and setters, save, getAll, deleteAll, find, update, and delete.

* Do not integrate Silex until all Stylist tests pass. After writing Stylist routes in Silex, test and create a Client class.

* Client requires the same methods as Stylist.

* After Client is present, construct a method to return all of a stylist's clients.

* After writing all Client methods , finish your Silex app to demonstrate it working.

* The app should have 2 pages at this point: One to list all stylists at the salon, including a form to add new stylists. Another to display all clients a particular stylist has, including a form to add more clients to a stylist.

* Include edit and delete functionality for both classes in Silex.

* Each class will require one additional page for the edit form.

* Export two .sql files containing data from hair_salon and hair_salon_test databases. Include them in your GitHub repository.

## Setup/Installation Requirements

1. _Fork and clone this repository from_ [gitHub]https://github.com/xesme/shoes.
2. See https://mamp.info/ for details on installing _MAMP_.
3. Use MAMP website `http://localhost:8888/phpmyadmin/` to import database and data from SQL file.
4. See https://getcomposer.org/ for details on installing _composer_.
5. Start interactive SQL at command prompt if desired with > `/Applications/MAMP/Library/bin/mysql --host=localhost -uroot -proot`
6. Run `composer install --prefer-source --no-interaction` from project root
7. Create a local server in the /web directory within the project folder using the command: `php -S localhost:8000`
8. Open the directory http://localhost:8000/ in any standard web browser.

                        To use PHPUnit  
* See https://secure.php.net/ for details on installing _PHP_.  Note: PHP is typically already installed on Mac.
* If you would like to try PHPUnit Tests, use MAMP website to copy 'shoes' database to `shoes_test` database (Structure Only).
* To run PHPUnit tests from root > `vendor/bin/phpunit tests`


## Specifications

|Behavior|Input|Output|
|--------|-----|------|
|User can add a new stylist to the database| "Lisa" | "Lisa"|
|User can add a new client to the database | "Marge Simpleson" | "Marge Simpleson"|
|User can view all stylist | clicks home | "Lisa, Beth, Bruce"|
|User can view all clients for that stylist | clicks Lisa | "Marge Simpleson, Lady Gigi"|
|User can delete all information for each stylist | click delete button | " "|
|User can delete all information for each client | click delete button | " "|
|User can edit stylist name | new name: "Liza" click update | "Liza" |
|User can edit client name and or stylist | new name: "Amanda Nines" new stylist: "Bruce" click update | new name: "Amanda Nines" new stylist: "Bruce" |
|User can delete the entire database | click delete all | Database is now empty|

## MySQL Commands Used
* /Applications/MAMP/Library/bin/mysql --host=localhost -uroot -proot
* CREATE DATABASE hair_salon;
* USE hair_salon;
* CREATE TABLE stylists (stylist_name VARCHAR (255), id serial PRIMARY KEY);
* CREATE TABLE clients (name VARCHAR (255), stylist_id BIGINT, id serial PRIMARY KEY);
* CREATE DATABASE hair_salon_test;
* USE hair_salon_test;
* CREATE TABLE stylists (stylist_name VARCHAR (255), id serial PRIMARY KEY);
* CREATE TABLE clients (name VARCHAR (255), stylist_id BIGINT, id serial PRIMARY KEY);
* DESCRIBE stylists;

| Field        | Type                | Null | Key | Default | Extra          |
|--------------|---------------------|------|-----|---------|----------------|
| stylist_name | varchar(255)        | YES  |     | NULL    |                |
| id           | bigint(20) unsigned | NO   | PRI | NULL    | auto_increment |

* DESCRIBE clients;

| Field      | Type                | Null | Key | Default | Extra          |
|--------------|---------------------|------|-----|---------|----------------|
| name       | varchar(255)        | YES  |     | NULL    |                |
| stylist_id | bigint(11)          | YES  |     | NULL    |                |
| id         | bigint(20) unsigned | NO   | PRI | NULL    | auto_increment |

* INSERT INTO stylists (stylist_name) VALUES ('{$this->getName()}');
* DELETE FROM stylists WHERE id = {$this->getId()};
* UPDATE stylists SET stylist_name = '{$new_stylist_name}' WHERE id = {$this->getId()};
* DELETE FROM stylists;
* SELECT * FROM stylists;
* SELECT * FROM stylists WHERE id = '{$stylist_id}';
* INSERT INTO clients (name, stylist_id) VALUES ('{$this->getName()}', {$this->getStylistId()});
* DELETE FROM clients WHERE id = {$this->getId()};
* UPDATE clients SET name = '{$new_name}', stylist_id = {$new_stylist_id} WHERE id = {$this->getId()};
* DELETE FROM clients;
* SELECT * FROM clients ORDER BY name;
* SELECT * FROM clients WHERE stylist_id = $stylist_id;
* SELECT * FROM clients WHERE id = {$client_id};

## Known Bugs

There are no known bugs at this time.

## Support and contact details

Please contact XiaEsmeAmen@me.com with questions or concerns.

## Technologies Used
* PHP
* MAMP
* mySQL
* Composer
* PHPUnit
* Silex
* Twig
* Bootstrap
* HTML
* CSS
* Git

## License

*MIT license*

Copyright (c) 2017 **Xia Amendolara** All Rights Reserved.
