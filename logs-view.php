<!--Controller-->
<?php
require("partials/session.php");
require("../db_connection2.php");

$statement = "SELECT * FROM `general_log` where argument like '%client%'";
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
    <title>View Logs</title>
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
            <h4>Listing all Logs:</h4>
            <div class="table-responsive">
                <table class="table table-bordered table-striped">
                    <tr>
                        <th>Event time</th>
                        <th>User host</th>
                        <th>Thread ID</th>
                        <th>Server ID</th>
                        <th>Command Type</th>
                        <th>Argument</th>
                    </tr>
                    <?php foreach ($results as $result) : ?>
                        <tr>
                            <td><?= $result['event_time'] ?></td>
                            <td><?= $result['user_host'] ?></td>
                            <td><?= $result['thread_id'] ?></td>
                            <td><?= $result['server_id'] ?></td>
                            <td><?= $result['command_type'] ?></td>
                            <td><?= $result['argument'] ?></td>
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