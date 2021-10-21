<?php

header('Access-Control-Allow-Origin: *');
header("Content-type: application/json; charset=utf-8");

$user = 'root';
$pass = 'root';
$list = [];
try {
    $dbh = new PDO('mysql:host=localhost;dbname=restapi', $user, $pass);
    echo "Good";
    $query = "SELECT  `id`,  `name`, LEFT(`description`, 256),  `price`,  `category_id`,  `created`,  `modified` FROM `restapi`.`products` WHERE id = '1' LIMIT 1000;";
    foreach ($dbh->query($query, PDO::FETCH_ASSOC) as $row) {
        array_push($list, $row);
    }
} catch (PDOException $e) {
    echo "Error {$e}";
}

echo json_encode($list);