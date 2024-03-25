<?php

// Подключение к базе данных
require_once('db.php');

// Получение данных из HTML-формы
$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];
$created_at = date('Y-m-d H:i:s');

// Защита от SQL-инъекций
$name = mysqli_real_escape_string($dbconn, $name);
$email = mysqli_real_escape_string($dbconn, $email);
$password = mysqli_real_escape_string($dbconn, $password);

// Хеширование пароля
$hashed_password = password_hash($password, PASSWORD_DEFAULT);

// Запрос на добавление нового пользователя
$query = "INSERT INTO users (name, email, password, created_at) VALUES ('$name', '$email', '$hashed_password', '$created_at')";
$result = mysqli_query($dbconn, $query);

if ($result) {
echo "Пользователь успешно создан.";
} else {
echo "Ошибка при создании пользователя: " . mysqli_error($dbconn);
}

// Закрытие соединения с базой данных
mysqli_close($dbconn);