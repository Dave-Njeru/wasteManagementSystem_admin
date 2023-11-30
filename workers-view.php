<!--Controller-->
<?php
require("partials/session.php");
require("../db_connection.php");

$statement = "select ID, concat(first_name, ' ', last_name)as name, telNo from workers";
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
    <title>View all workers</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="admin.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js" defer></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js" defer></script>
    <script defer>
        function deleteWorker(num) {
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    alert(this.responseText);
                }
            };

            xmlhttp.open("GET", "worker-delete.php?q=" + num, true);
            xmlhttp.send();

            //reload the page
            location.reload();
        }

        function printPage() {
            window.print();
        }
    </script>
</head>

<body>
    <div class="container">

        <?php require("partials/header.php"); ?>
        
        <div class="main">
            <div>
                <h4>All workers</h4>
                <table id="display-all-workers">
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Telephone Number</th>
                        <th class="hidden-print">Manage</th>
                        <th class="hidden-print">Action</th>
                    </tr>
                    <?php foreach ($results as $result) : ?>
                        <tr>
                            <td><?= $result['ID'] ?></td>
                            <td><?= $result['name'] ?></td>
                            <td><?= $result['telNo'] ?></td>
                            <td class="hidden-print">
                                <a href="worker-edit.php?q=<?= $result['ID'] ?>"><button id="edit">Edit</button></a>
                            </td>
                            <td class="hidden-print">
                                <button id="delete" onclick="deleteWorker(<?= $result['ID'] ?>)" ;>Delete</button>
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