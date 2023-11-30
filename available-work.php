<!--Controller-->
<?php
require("partials/session.php");
require("../db_connection.php");

$statement = "SELECT `work`.`work_id`, `work`.`client_id`, `clients`.`username`, `clients`.`phone_number`, `clients`.`location`, `clients`.`apartment_number`, `work`.`status`
FROM `clients`
    LEFT JOIN `work` ON `work`.`client_id` = `clients`.`id`
";
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
    <title>Check available work</title>
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
            <h4>Available work</h4>
            <div class="table-responsive">
                <table class="table table-bordered table-striped">
                    <tr>
                        <th>Work Id</th>
                        <th>Client's Name</th>
                        <th>Telephone Number</th>
                        <th>Location</th>
                        <th>Apartment Number</th>
                        <th>Work Status</th>
                        <th class="hidden-print">Manage</th>
                    </tr>
                    <?php foreach ($results as $result) : ?>
                        <tr>
                            <td><?= $result['work_id'] ?></td>
                            <td><?= $result['username'] ?></td>
                            <td><?= $result['phone_number'] ?></td>
                            <td><?= $result['location'] ?></td>
                            <td><?= $result['apartment_number'] ?></td>
                            <td><?= $result['status'] ?></td>
                            <td class="hidden-print">
                                <a href="available-work-edit.php?q=<?= $result['work_id'] ?>"><button id="edit">Edit</button></a>
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