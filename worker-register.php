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

//send to database
try {
    $statement = "insert into workers (id, first_name, last_name, telNo)
    values ('$id', '$first_name', '$last_name', '$telNo')";
    $query = $pdo->prepare($statement);
    $query->execute();

    echo ("<script> alert('Successfully added worker')</script>");
}
catch (Exception $e) {
    echo ($e->getMessage());
}

echo ("<script>window.location.replace('worker-register.view.php')</script>");