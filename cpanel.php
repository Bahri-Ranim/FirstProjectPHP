<?php

    //this file allows to select article to edit

    //check if user in logged in
    if(!isset($_SESSION['admin'])) {
        header("location:index.php");
    }


    $editart_sql="select * from article where article.confirmed=1";
    $editart_query=mysqli_query($dbconnect, $editart_sql);
    $editart_res=mysqli_fetch_assoc($editart_query);

    $artnotconfirmed_sql="select * from article where article.confirmed=0";
    $artnotconfirmed_query=mysqli_query($dbconnect, $artnotconfirmed_sql);
    $artnotconfirmed_res=mysqli_fetch_assoc($artnotconfirmed_query);



    //when user enter to another article, session should be reset
    unset($_SESSION['editarticle']);
?>



<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <LINK rel="stylesheet" type="text/css" href="css/panel.css">
</head>
<body>
    <div class="container">

        <div class="row">
            <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
                <div class="card card-signin my-5">
                    <div class="card-body">
                        <h5 class="card-title text-center">Control panel</h5>
                        <h6>
                            <p>
                                <a href="index.php?page=addarticle">
                                    Add article
                                </a>
                            </p>
                            <!--<p>
                                <a href="index.php?page=editarticle">
                                    Edit article
                                </a>
                            </p>
                            <p>
                                <a href="index.php?page=deletearticle">
                                    Delete article
                                </a>
                            </p>-->

                            <table class="table">

                                <tbody>

                                <?php
                                if ( $editart_res!=null) {
                                    do {
                                        ?>
                                        <tr>
                                            <td>

                                                <?php
                                                echo $editart_res['title'];
                                                ?>

                                            </td>
                                            <td>
                                                <a type="button"
                                                   href="index.php?page=editing&articleID=<?php echo $editart_res['id']; ?>">
                                                    edit
                                                </a>
                                            </td>

                                            <td>
                                                <a type="button"
                                                   href="index.php?page=confirmdel&articleID=<?php echo $editart_res['id']; ?>">
                                                    delete
                                                </a>
                                            </td>
                                        </tr>
                                        <?php
                                    } while ($editart_res = mysqli_fetch_assoc($editart_query));
                                }

                                if ($artnotconfirmed_res!=null) {
                                    do {
                                        ?>
                                        <tr style="color:red">
                                            <td>

                                                <?php
                                                echo $artnotconfirmed_res['title'];
                                                ?>

                                            </td>
                                            <td>
                                                <a type="button"
                                                   href="index.php?page=editing&articleID=<?php echo $artnotconfirmed_res['id']; ?>">
                                                    edit
                                                </a>
                                            </td>

                                            <td>
                                                <a type="button"
                                                   href="index.php?page=confirmdel&articleID=<?php echo $artnotconfirmed_res['id']; ?>">
                                                    delete
                                                </a>
                                            </td>
                                        </tr>
                                        <?php
                                    } while ($artnotconfirmed_res = mysqli_fetch_assoc($artnotconfirmed_query));
                                }
                                ?>


                                </tbody>
                            </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>


