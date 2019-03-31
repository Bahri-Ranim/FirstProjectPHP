<?php
/**
 * Created by PhpStorm.
 * User: Asus
 * Date: 30/03/2019
 * Time: 21:33
 */

//this file allows update the article in the database


    session_start();
    //check if user in logged in
    if(!isset($_SESSION['admin'])) {
        header("location:index.php");
    }

    //enter the new article
    $title= mysqli_real_escape_string($dbconnect, $_SESSION['editarticle']['title']);
    $image= mysqli_real_escape_string($dbconnect,$_SESSION['editarticle']['image']);
    $text= mysqli_real_escape_string($dbconnect,$_SESSION['editarticle']['text']);
    $cat= mysqli_real_escape_string($dbconnect,$_SESSION['editarticle']['category']);
    $confirmed= mysqli_real_escape_string($dbconnect,$_SESSION['editarticle']['confirmed']);


    $editart_sql="UPDATE article set title='".$title."', img='".$image."' , text= '".$text."', categoryID='".$cat."', confirmed='".$confirmed."' where id=".$_SESSION['editarticle']['articleID'];
    //echo $editart_sql;
    $editart_query=mysqli_query($dbconnect, $editart_sql);

    //when user enter to another article, session should be reset
    unset($_SESSION['editarticle']);
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
                    <h5 class="card-title text-center">Edit article</h5>
                    <h4>
                        Article successfully updated !
                    </h4>
                    <p>
                    <h5>
                        <a href="index.php?page=admin">
                            Back to admin panel
                        </a>
                    </h5>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
