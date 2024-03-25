<?php
// Подключение к базе данных
require_once('db.php');

// Получение ID пользователя из HTML-формы
$user_id = $_GET['user_id'];

// Защита от SQL-инъекций
$user_id = mysqli_real_escape_string($dbconn, $user_id);

// Запрос на выборку пользователя по ID
$query = "SELECT * FROM users WHERE id = '$user_id'";
$result = mysqli_query($dbconn, $query);

if ($result) {
    // Проверка наличия пользователя
    if (mysqli_num_rows($result) > 0) {
        $user = mysqli_fetch_assoc($result);
        echo "ID: " . $user['id'] . "<br>";
        echo "Имя пользователя: " . htmlspecialchars($user['name']) . "<br>";
        echo "Email: " . htmlspecialchars($user['email']) . "<br>";
        echo "Создан: " . $user['created_at'] . "<br>";
    } else {
        echo "Пользователь с таким ID не найден.";
    }
} else {
    echo "Ошибка при выполнении запроса: " . mysqli_error($dbconn);
}

// Закрытие соединения с базой данных
mysqli_close($dbconn);

