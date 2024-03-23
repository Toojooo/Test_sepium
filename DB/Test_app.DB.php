<?php
// Подключение к базе данных

require_once('db.php');

// Получение данных из HTML-формы
$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];
$created_at = date('Y-m-d H:i:s');

// Защита от SQL-инъекций
$name = pg_escape_string($name);
$email = pg_escape_string($email);
$password = pg_escape_string($password);

// Хеширование пароля
$hashed_password = password_hash($password, PASSWORD_DEFAULT);

// Запрос на добавление нового пользователя
$query = "INSERT INTO users (name, email, password, created_at) VALUES ('$name', '$email', '$hashed_password', '$created_at')";
$result = pg_query($dbconn, $query);

if ($result) {
    echo "Пользователь успешно создан.";
} else {
    echo "Ошибка при создании пользователя: " . pg_last_error($dbсoon);
}

// Закрытие соединения с базой данных
pg_close($db);

