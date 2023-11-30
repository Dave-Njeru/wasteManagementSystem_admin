<?php
require("partials/session.php");
require("../db_connection.php");

$id = $first_name = $last_name = "";

if($_SERVER['REQUEST_METHOD'] == "POST") {
    $id = test_input($_POST['id']);
    $status = test_input($_POST['status']);
    $client_id = test_input($_POST['client-id']);
}

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);

    return $data;
}

//update database
try {
    $statement = "update work set status = :st, client_id = :cid
    where work_id = :ID";
    $query = $pdo->prepare($statement);
    $query->execute(['st' => $status, 'cid' => $client_id, 'ID' => $id]);

    echo ("<script> alert('Successfully updated')</script>");

    echo ("<script>window.history.back()</script>");
}
catch (Exception $e) {
    echo ($e->getMessage());
}


