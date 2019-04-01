<?php


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
    <div class="container container_body">

        <div class="row">

                <div class="card card_tr card-signin my-5">
                    <div class="card-body">
                        <h5 class="card-title text-center" style="color: black;">Manage articles </h5>
                        <br>
                        <h6>

                               <button class="btn_add btn-light ">
                                <a href="index.php?page=addarticle">
                                    ADD ARTICLE
                                </a>
                               </button>


                        </h6>
                        <br>

                        <h6>

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
                                                <button class="btn btn-secondary " >
                                                <a
                                                   href="index.php?page=editing&articleID=<?php echo $editart_res['id']; ?>">
                                                    edit
                                                </a>
                                                </button>
                                            </td>

                                            <td>
                                                <button class="btn btn-danger " >
                                                <a
                                                   href="index.php?page=confirmdel&articleID=<?php echo $editart_res['id']; ?>">
                                                    delete
                                                </a>
                                                </button>
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
                                                  <button class="btn btn-secondary " >
                                                    <a
                                                       href="index.php?page=editing&articleID=<?php echo $artnotconfirmed_res['id']; ?>">
                                                        edit
                                                    </a>
                                                  </button>
                                            </td>

                                            <td>
                                                <button class="btn btn-danger " >
                                                    <a
                                                       href="index.php?page=confirmdel&articleID=<?php echo $artnotconfirmed_res['id']; ?>">
                                                        delete
                                                    </a>
                                                </button>
                                            </td>
                                        </tr>
                                        <?php
                                    } while ($artnotconfirmed_res = mysqli_fetch_assoc($artnotconfirmed_query));
                                }
                                ?>


                                </tbody>
                            </table>
                            </h6>
                    </div>
                </div>

        </div>
    </div>
</body>


