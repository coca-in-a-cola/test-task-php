<?php

require 'connect.php';
$csvFilePath = "data/gamers-list.csv";

$file = fopen($csvFilePath, "r");
// Пропустим первую строку файла
fgets($file);

// Создаём необходимые таблицы
// ВНИМАНИЕ! Пересоздаёт таблицу User
$mysqli->query("DROP TABLE IF EXISTS User");
$mysqli->query(
    "CREATE TABLE User (
        nickname VARCHAR(255) NOT NULL,
        email VARCHAR(255) NOT NULL PRIMARY KEY,
        reg_date INTEGER,
        status VARCHAR(255))"
);


// Читаем построчно CSV файл
while (($row = fgetcsv($file, null, ';')) !== FALSE) {

    // Шаблон для вставки пользователя
    $stmt = $mysqli->prepare("INSERT INTO User (nickname, email, reg_date, status)
    VALUES (?, ?, ?, ?)");

    // Разбираем дату и время
    $datestring = $row[2];
    $parts = explode(' ', $datestring);
    $time = explode(':', end($parts));
    $date = explode('.', prev($parts));
    // В PHP Unix timestamp отлично влезает в int, поэтому дополнительных преобразований не требуется
    $timestamp = mktime($time[0], $time[1], 0, $date[1], $date[0], $date[2]);

    // Применяем значения и выполняем запрос на добавление
    $stmt->bind_param("ssds", $row[0], $row[1], $timestamp, $row[3]);
    $stmt->execute(); 
}
?>