<?php
/**
 * Created by PhpStorm.
 * User: Asus
 * Date: 28/03/2019
 * Time: 23:50
 */
    session_start();
    //check if user is logged in
    if(!isset($_SESSION['admin']) && !isset($_SESSION['user'])) {
        header("location:index.php?page=admin");
    }

    //check if user has submitted the add article form
    if (!isset($_SESSION['addarticle']['title'])) {
        header("location:index.php?page=admin");
    }

    //enter the new article
    $title= mysqli_real_escape_string($dbconnect, $_SESSION['addarticle']['title']);
    $image= mysqli_real_escape_string($dbconnect,$_SESSION['addarticle']['image']);
    $text= mysqli_real_escape_string($dbconnect,$_SESSION['addarticle']['text']);
    $cat= mysqli_real_escape_string($dbconnect,$_SESSION['addarticle']['category']);
    $confirmed= mysqli_real_escape_string($dbconnect,$_SESSION['addarticle']['confirmed']);

    $article_sql= "insert into article (title , img, text, categoryId, confirmed) values (' ".$title." ', '".$image."', '".$text."','".$cat."','".$confirmed."')";
    $article_qry= mysqli_query($dbconnect, $article_sql);


    unset($_SESSION['addarticle']);
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <LINK rel="stylesheet" type="text/css" href="css/panel.css">
</head>
<body>
<body>
<div class="container container_body">
    <div class="row">
        <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
            <div class="card card-signin my-5">
                <div class="card-body">
                    <h5 class="card-title text-center"></h5>
                    <h4>
                        Your new article has been added !
                    </h4>
                    <p>
                        <h5>
                        <button class="btn btn-outline-secondary " >
                        <a href="index.php?page=admin">
                            Go back
                        </a>
                        </button>
                        </h5>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
