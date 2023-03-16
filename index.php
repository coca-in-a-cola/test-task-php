<?php
require 'connect.php';
// ВНИМАНИЕ! ДАННЫЙ СКРИПТ ТОЛЬКО ОТОБРАЖАЕТ ТАБЛИЦУ. ДЛЯ ЭКСПОРТА ДАННЫХ ЗАПУСТИТЬ export.php

// Выбираем пользователей из БД
$sqlSelect = 'SELECT * FROM User WHERE status="On" ORDER BY reg_date DESC';
$users = $mysqli->query($sqlSelect)->fetch_all(MYSQLI_ASSOC);

?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Список игроков</title>
  </head>
  <body>
    <div class="container">

      <h1>Игроки</h1>

      <table class="table">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Ник</th>
            <th scope="col">Email</th>
            <th scope="col">Зарегистрирован</th>
            <th scope="col">Статус</th>
          </tr>
        </thead>
        <tbody>
            <?php
            foreach ($users as $idx => $user) {
                ?>
                <tbody>
                    <tr>
                        <th scope="row"><?php  echo $idx + 1 ?></th>
                        <td><?php  echo $user['nickname']; ?></td>
                        <td><?php  echo $user['email']; ?></td>
                        <td><?php  echo date("d.m.Y G:i", $user['reg_date']); ?></td>
                        <td><?php  echo $user['status']; ?></td>
                    </tr>
            <?php
                }
            ?>
        </tbody>
      </table>
            
    </div>
    
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
  </body>
</html>
