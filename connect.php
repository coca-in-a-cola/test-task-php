<?php

require_once realpath(__DIR__ . "/vendor/autoload.php");

// Импортируем .env файл
use Dotenv\Dotenv;$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();


/* Настройки подключения к БД */
$host = $_ENV['MySQL_DB_HOST'] ? $_ENV['MySQL_DB_HOST'] : 'localhost';
$user = $_ENV['MySQL_DB_USER_NAME'] ? $_ENV['MySQL_DB_USER_NAME'] : 'mysql';
$passwd = $_ENV['MySQL_DB_PASSWORD'] ? $_ENV['MySQL_DB_PASSWORD'] : 'password';
$database = $_ENV['MySQL_DB_NAME'] ? $_ENV['MySQL_DB_NAME'] : 'USERS';

/* Connection with MySQLi, OOP-style */
$mysqli = new mysqli($host, $user, $passwd, $database);
/* Check if the connection succeeded */
if (!is_null($mysqli->connect_error))
{
   echo 'Connection failed<br>';
   echo 'Error number: ' . $mysqli->connect_errno . '<br>';
   echo 'Error message: ' . $mysqli->connect_error . '<br>';
   die();
}