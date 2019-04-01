<?php
/**
 * Created by PhpStorm.
 * User: Asus
 * Date: 30/03/2019
 * Time: 21:13
 */

//this file allows to confirm article to edit


    session_start();
    //check if user in logged in
    if(!isset($_SESSION['admin'])) {
        header("location:index.php");
    }

    $_SESSION['editarticle']['title']=$_POST['title'];
    $_SESSION['editarticle']['image']=$_POST['image'];
    $_SESSION['editarticle']['text']=$_POST['text'];
    $_SESSION['editarticle']['category']=$_POST['category'];
    $_SESSION['editarticle']['confirmed']=$_POST['confirmed'];
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
                    <h5 class="card-title text-center">Confirm article to edit</h5>
                        <?php echo "do you really wish to update ".$_SESSION['editarticle']['title']." ?";
                        ?>
                           <p>
                               <button class="btn btn-outline-secondary " >
                               <a href="index.php?page=update">
                                   Confirm !
                               </a>
                               </button>

                               <button class="btn btn-outline-danger " >
                               <a href="index.php?page=editing">
                                    Oops, go back
                               </a>
                               </button>
                           </p>
                                <br>
                            <p>
                               <button class="btn btn-outline-secondary btn-block " >
                               <a href="index.php?page=admin">
                                   Back to admin panel
                               </a>
                               </button>
                           </p>

                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
