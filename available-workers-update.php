<?php
require("partials/session.php");
require("../db_connection.php");

$id = $working_status = $work_id = "";

if($_SERVER['REQUEST_METHOD'] == "POST") {
    $id = test_input($_POST['id']);
    $working_status = test_input($_POST['working_status']);
    $work_id = test_input($_POST['work_id']);
}

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);

    return $data;
}

//update database
try {
    $statement = "update workers set workingStatus = :st, workID = :wId
    where ID = :id";
    $query = $pdo->prepare($statement);
    $query->execute(['st' => $working_status, 'wId' => $work_id, 'id' => $id]);

    echo ("<script> alert('Successfully updated')</script>");
}
catch (Exception $e) {
    echo ($e->getMessage());
}

echo ("<script>window.history.back()</script>");
