<?php
require("partials/session.php");
require("../db_connection.php");

$id = $first_name = $last_name = $telNo = "";

if($_SERVER['REQUEST_METHOD'] == "POST") {
    $id = test_input($_POST['id']);
    $first_name = test_input($_POST['first-name']);
    $last_name = test_input($_POST['last-name']);
    $telNo = test_input($_POST['telNo']);
}

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);

    return $data;
}

//update database
try {
    $statement = "update workers set first_name = :fn, last_name = :ln, telNo = :tn
    where id = :ID";
    $query = $pdo->prepare($statement);
    $query->execute(['fn' => $first_name, 'ln' => $last_name, 'tn' => $telNo, 'ID' => $id]);

    echo ("<script> alert('Successfully updated')</script>");
}
catch (Exception $e) {
    echo ($e->getMessage());
}

echo ("<script>window.history.back()</script>");
