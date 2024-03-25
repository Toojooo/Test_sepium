<?php
// Подключение к базе данных

require_once('db.php');

// Получение ID пользователя из HTML-формы
$user_id1 = $_POST['user_id1'];

// Защита от SQL-инъекций
$user_id1 = pg_escape_string($user_id1);

// Запрос на удаление пользователя по ID
$query = "DELETE FROM users WHERE id = '$user_id1'";
$result = pg_query($dbconn, $query);

include('ListUsers.php');

if ($result) {
    echo "Пользователь успешно удален.";
} else {
    echo "Ошибка при удалении пользователя: " . pg_last_error($dbconn);
}

// Закрытие соединения с базой данных
pg_close($dbconn);
