<!--Controller-->
<?php
require("partials/session.php");
require("../db_connection.php");

$statement = "select * from workers";
$query = $pdo->prepare($statement);
$query->execute();

$results = $query->fetchAll();
?>

<!--View-->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Available workers</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="admin.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js" defer></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js" defer></script>
    <script defer>
        function printPage() {
            window.print();
        }
    </script>
</head>

<body>
    <div class="container">

        <?php require("partials/header.php"); ?>
        
        <div class="main">
            <h4>Available workers</h4>
            <div class="table-responsive">
                <table class="table table-bordered table-striped">
                    <tr>
                        <th>Worker ID</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Telephone</th>
                        <th>Working status</th>
                        <th>Assigned work ID</th>
                        <th class="hidden-print">Manage</th>
                    </tr>
                    <?php foreach ($results as $result) : ?>
                        <tr>
                            <td><?= $result['ID'] ?></td>
                            <td><?= $result['first_name'] ?></td>
                            <td><?= $result['last_name'] ?></td>
                            <td><?= $result['telNo'] ?></td>
                            <td><?= $result['workingStatus'] ?></td>
                            <td><?= $result['workID'] ?></td>
                            <td class="hidden-print">
                                <a href="available-workers-edit.php?q=<?= $result['ID'] ?>"><button id="edit">Edit</button></a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </table>
            </div>
            <div class="text-right hidden-print" id="print">
                <button class="btn btn-primary" onclick="printPage()">Print</button>
            </div>
        </div>
    </div>
    <footer>
        &copy; 2023 THIKA WASTE MANAGEMENT SYSTEM. All rights reserved.
    </footer>
</body>

</html>