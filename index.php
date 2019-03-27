<?php
include("dbconnect.php");
?>

<!doctype html>
<html lang="en">
<head>
    <title>TITLE</title>
</head>
<body>
    <div class="container">
        <h1><a href="index.php">Home </a></h1>
        <?php
            include("categoryList.php");
        ?>
    </div>
    <div class="maincontent">
        <?php
            if (!isset($_GET['page'])) {
                include("home.php");
            } else {
                $page=$_GET['page'];
                include("$page.php");
            }
        ?>
    </div>
</body>
</html>



