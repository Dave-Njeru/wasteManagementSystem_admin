<?php
//start session
session_start();

$user = $password = "";

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $user = test_input($_POST['user']);
    $password = test_input($_POST['password']);
}

function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);

    return $data;
}

if ($user == "admin" && $password == '1234') {

    //session variable
    $_SESSION['user'] = $user;

    //redirect to admin page
    header('location: admin.php');

    echo ("<script> alert('Successfully login')</script>");
} else {
    echo ("<script> alert('Invalid credentials')</script>");
    echo ("<script>window.history.back()</script>");
}
