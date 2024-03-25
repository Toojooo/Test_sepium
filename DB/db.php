<?php

$servername = "localhost";
$username = "admin";
$password = "admin";
$dbname = "test_app";

// Соединение с базой данных
$dbconn = mysqli_connect($servername, $username, $password, $dbname);

// Проверка соединения
if (!$dbconn) {
    die("Connection failed: " . mysqli_connect_error());
}
