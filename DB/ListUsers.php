<?php
require_once('db.php');

$query = "SELECT * FROM users";
$result = pg_query($dbconn, $query);
$list = "<ul>";

while ($row = pg_fetch_assoc($result)) {
    $list .= "<li>ID: " . $row['id'] . " - Name: " . htmlspecialchars($row['name']) . "</li>";
}

$list .= "</ul>";
echo $list;

pg_close($dbconn);
