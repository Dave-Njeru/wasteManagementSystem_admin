<?php
require("partials/session.php");
require("../db_connection.php");

$id = $_REQUEST['q'];

try {
    $statement = "delete from workers where id = $id";
    $query = $pdo->prepare($statement);
    $query->execute();

    echo ("Record successully deleted");
}
catch (Exception $e) {
    echo 'An error occurred: ' . $e->getMessage();
}
