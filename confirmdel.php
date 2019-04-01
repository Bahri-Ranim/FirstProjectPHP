<?php

// this file allows to confirm article to delete

session_start();
//check if user in logged in
if(!isset($_SESSION['admin'])) {
    header("location:index.php");
}


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
                    <h5 class="card-title text-center">Confirm article to delete </h5>
                    <?php
                    $delart_sql="select * from article where id=".$_GET['articleID'];
                    $delart_query=mysqli_query($dbconnect, $delart_sql);
                    $delart_res=mysqli_fetch_assoc($delart_query);
                    echo "do you really wish to delete".$delart_res['title']." ?";
                        ?>
                           <p >
                               <button class="btn btn-outline-secondary " >
                               <a href="index.php?page=confirmeddel&articleID=<?php echo $_GET['articleID']; ?>">
                                    Yes, delete it !
                               </a>
                               </button>

                               <button class="btn btn-outline-danger " >
                               <a href="index.php?page=deletearticle">
                                    No, go back
                               </a>
                               </button>
                           </p>

                               <br>
                            <p>
                               <button class="btn btn-outline-secondary ">
                               <a href="index.php?page=admin">
                                   Back to admin panel
                               </a>
                               </button>
                           </p>
                        <?php
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
