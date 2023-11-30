<!--controller-->
<?php
require("partials/session.php");
require("../db_connection.php");

$value = $_GET['q'];

//fetch data and display in textboxes
$statement = "select * from workers where id = :id";
$query = $pdo->prepare($statement);
$query->execute(['id' => $value]);

$results = $query->fetch();
?>

<!--view-->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit workers</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="admin.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js" defer></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js" defer></script>
</head>

<body>
    <div class="container">

        <?php require("partials/header.php"); ?>
        
        <div class="main">
            <div>
                <h4>Edit worker details</h4>
                <form method="post" action="worker-update.php" ?>
                    <label for="id">ID:</label>
                    <input type="number" name="id" readonly value="<?= $results['ID'] ?>"><br>
                    <label for="first-name">First Name:</label>
                    <input type="text" name="first-name" value="<?= $results['first_name'] ?>"><br>
                    <label for="second-name">Last Name:</label>
                    <input type="text" name="last-name" value="<?= $results['last_name'] ?>"><br>
                    <label for="telNo">Telephone Number:</label>
                    <input type="text" name="telNo" value="<?= $results['telNo'] ?>"><br><br>
                    <input type="Submit">
                </form>
            </div>
        </div>
    </div>
    <footer>
        &copy; 2023 THIKA WASTE MANAGEMENT SYSTEM. All rights reserved.
    </footer>
</body>

</html>