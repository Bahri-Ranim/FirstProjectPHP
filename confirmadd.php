<?php
    session_start();
    //check if user in logged in
    if(!isset($_SESSION['admin']) && !isset($_SESSION['user'])) {
        header("location:index.php?page=admin");
    }

    //check if user has submitted the add article form
    if (isset($_POST['submit'])) {
        header("location:index.php?page=admin");
    }


    //set addarticle session
    $_SESSION['addarticle']['title'] = $_POST['title'];
    $_SESSION['addarticle']['image'] = $_POST['image'];
    $_SESSION['addarticle']['text'] = $_POST['text'];
    $_SESSION['addarticle']['category'] = $_POST['category'];

?>


<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <LINK rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<body>
<div class="container">
    <div class="row">
        <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
            <div class="card card-signin my-5">
                <div class="card-body">
                    <h5 class="card-title text-center">Confirmation</h5>

                    <p>
                    <h4>You entred : </h4>
                        <h5><p><?php echo $_POST['title'] ?></p></h5>
                        <p><?php echo $_POST['text'] ?></p>
                    </p>

                    <p>
                        <a href="index.php?page=enterarticle">Correct, continue </a>
                        |
                        <a href="index.php?page=addarticle">Oops, go back</a>
                    </p>

                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>




