<!--controller-->
<?php
require("../db_connection.php");

$value = $_GET['q'];

$statement = "select * from workers where ID = :id";
$query = $pdo->prepare($statement);
$query->execute(["id"=> $value]);

$results = $query->fetch();

//fetch all work ids
$statement2 = "select work_id from work";
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
    <title>Edit available workers</title>
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
                <h3>Edit details</h3>
                <form action="available-workers-update.php" method="post">
                    <label for="id">Worker ID:</label>
                    <input type="number" name="id" id="id" value="<?= $results['ID'] ?>" readonly><br>
                    <label for="first_name">First name:</label>
                    <input type="text" name="first_name" id="first_name" value="<?= $results['first_name'] ?>" readonly><br>
                    <label for="last_name">Last name</label>
                    <input type="text" name="last_name" id="last_name" value="<?= $results['last_name'] ?>" readonly><br>
                    <label for="tel_no">Telephone</label>
                    <input type="number" name="tel_no" id="tel_no" value="<?= $results['telNo'] ?>" readonly><br>
                    <label for="working_status">Working status</label>
                    <select name="working_status" id="working_status">
                        <option value="Work ready" <?php if ($results['workingStatus'] == "Work ready") echo "selected" ?>>Work ready</option>
                        <option value="Working" <?php if ($results['workingStatus'] == "Working") echo "selected" ?>>Working</option>
                    </select><br>
                    <label for="work_id">Assigned work</label>
                    <input type="number" name="work_id" id="work_id" value="<?= $results['workID'] ?>"><br><br>
                    <input type="submit" value="Submit">
                </form>
            </div>
        </div>
    </div>
</body>

</html>