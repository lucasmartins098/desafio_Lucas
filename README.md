Project developed in <b>Symfony 5.4</b>

* System for managing people, being possible to save, edit, delete and view basic data of Individuals.

<b>Dependencies</b><br>
* Symfony 5.4 - Symfony is a web framework written in PHP.
* PHP - PHP is a general-purpose open source scripting language designed specifically for web development.
* Composer - Composer is an application-level package manager for the PHP programming language.

<b>Installation</b><br>
* Firstly, you need to clone this repository:
* git clone https://github.com/lucasmartins098/desafio_Lucas.git
* You need to have PHP installed on your machine.
* You need to have a mysql server running on your machine and run the database creation script, you can find the script on path "ScriptMySQL\desafio_pessoa.sql".
* Install the dependencies and start the server:
  * You must have scoop installed on your computer to run the command "scoop install symfony-cli"
  * with cmd inside the project folder you must run the following commands: 
   * composer install
   * composer require annotations
   * composer require twig
   * composer require symfony/orm-pack
     * a message will appear asking yes or no, type "y" and proceed
   * composer require doctrine maker
   * composer require symfony/form
   * You must change the .env file to access the database according to your local settings.
   * symfony server:start
  
  * Now you can acess on http://localhost:8000
 
 <b>Copyright (c) 2022 Lucas Ferreira Martins</b>
