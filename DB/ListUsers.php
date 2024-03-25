<?php
require_once('db.php');

$query = "SELECT * FROM users";
$result = mysqli_query($dbconn, $query);
$list = "<ul>";

while ($row = mysqli_fetch_assoc($result)) {
    $list .= "<li>ID: " . $row['id'] . " - Name: " . htmlspecialchars($row['name']) . "</li>";
}

$list .= "</ul>";
echo $list;

mysqli_close($dbconn);

