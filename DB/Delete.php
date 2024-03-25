<?php
// Подключение к базе данных
require_once('db.php');

// Получение ID пользователя из HTML-формы
$user_id1 = $_POST['user_id1'];

// Защита от SQL-инъекций
$user_id1 = mysqli_real_escape_string($dbconn, $user_id1);

// Запрос на удаление пользователя по ID
$query = "DELETE FROM users WHERE id = '$user_id1'";
$result = mysqli_query($dbconn, $query);

include('ListUsers.php');

if ($result) {
    echo "Пользователь успешно удален.";
} else {
    echo "Ошибка при удалении пользователя: " . mysqli_error($dbconn);
}

// Закрытие соединения с базой данных
mysqli_close($dbconn);

