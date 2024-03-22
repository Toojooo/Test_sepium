<?php

$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "test_app";

// Соединение с базой данных
$dbconn = pg_connect("host=$servername dbname=$dbname user=$username password=$password");

// Проверка соединения
if (!$dbconn) {
    die("Connection failed: " . pg_last_error());
}

