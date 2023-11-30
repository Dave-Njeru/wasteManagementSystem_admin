<!--controller-->
<?php
require("partials/session.php");
require("../db_connection.php");

$value = $_GET['q'];

//fetch data and display in textboxes
$statement = "select * from work where work_id = :id";
$query = $pdo->prepare($statement);
$query->execute(["id"=> $value]);

$results = $query->fetch();

//fetch data from work and clients tables
$statement2 = "select id from clients";
$query2 = $pdo->prepare($statement2);
$query2->execute();

$results2 = $query2->fetchAll();
?>

<!--view-->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit available work</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="admin.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js" defer></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js" defer></script>
</head>

<body>
    <div class="container">

        <?php require("partials/header.php") ?>

        <div class="main">
            <div>
                <h4>Edit work details</h4>
                <form method="post" action="available-work-update.php" ?>
                    <label for="id">Work Id:</label>
                    <input type="number" name="id" readonly value="<?= $results['work_id'] ?>"><br>
                    <label for="status">Status:</label>
                    <select name="status" id="status">
                        <option value="Not started" <?php if ($results['status'] == "Not started") echo "selected" ?>>Not started</option>
                        <option value="In progress" <?php if ($results['status'] == "In progress") echo "selected" ?>>In progress</option>
                        <option value="Finished" <?php if ($results['status'] == "Finished") echo "selected" ?>>Finished</option>
                    </select><br>
                    <label for="client-id">Client Id:</label>
                    <select name="client-id" id="client-id">
                        <?php foreach ($results2 as $row) : ?>
                            <option value="<?= $row['id']; ?>" <?php if ($results['client_id'] == $row['id']) echo "selected" ?>>
                                <?= $row['id']; ?></option>
                        <?php endforeach; ?>
                    </select><br><br>
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