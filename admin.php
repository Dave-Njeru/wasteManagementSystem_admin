<!--controller-->
<?php
require("partials/session.php");
?>
<!--view-->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin page</title>
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
                <h4>Choose what to do:</h4>
                <div class="buttons">
                    <div>
                        <span class="icon"><i class="fa fa-users" aria-hidden="true"></i></span><br><br>
                        <a href="workers-view.php">View all workers</a>
                    </div>
                    <div>
                        <span class="icon"><i class="fa fa fa-handshake-o" aria-hidden="true"></i></span><br><br>
                        <a href="available-workers.php">Available workers</a>
                    </div>
                    <div>
                        <span class="icon"><i class="fa fa-briefcase" aria-hidden="true"></i></span><br><br>
                        <a href="available-work.php">Check available work</a>
                    </div>
                    <div>
                        <span class="icon"><i class="fa fa-id-card" aria-hidden="true"></i></span><br><br>
                        <a href="worker-register.view.php">Register worker</a>
                    </div>
                    <div>
                        <span class="icon"><i class="fa fa-gears" aria-hidden="true"></i></span><br><br>
                        <a href="logs-view.php">View logs</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <footer>
        &copy; 2023 THIKA WASTE MANAGEMENT SYSTEM. All rights reserved.
    </footer>
</body>

</html>