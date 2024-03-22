<?php
// Подключение к базе данных

require_once('db.php');

// Получение ID пользователя из HTML-формы
$user_id = $_GET['user_id'];

// Защита от SQL-инъекций
$user_id = pg_escape_string($user_id);

// Запрос на выборку пользователя по ID
$query = "SELECT * FROM users WHERE id = '$user_id'";
$result = pg_query($dbconn, $query);

if ($result) {
    // Проверка наличия пользователя
    if (pg_num_rows($result) > 0) {
        $user = pg_fetch_assoc($result);
        echo "ID: " . $user['id'] . "<br>";
        echo "Имя пользователя: " . $user['name'] . "<br>";
        echo "Email: " . $user['email'] . "<br>";
        echo "Создан: " . $user['created_at'] . "<br>";
    } else {
        echo "Пользователь с таким ID не найден.";
    }
} else {
    echo "Ошибка при выполнении запроса: " . pg_last_error($dbconn);
}

// Закрытие соединения с базой данных
pg_close($dbconn);

