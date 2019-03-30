<?php
/**
 * Created by PhpStorm.
 * User: Asus
 * Date: 30/03/2019
 * Time: 20:14
 */

//this file allows to show the existing article with all information


    session_start();
    //check if user in logged in
    if(!isset($_SESSION['admin'])) {
        header("location:index.php");
    }

    //we need the article id for the update page
    //we only need it when user come here for the first time
    if (isset($_GET['articleID'])) {
        $_SESSION['editarticle']['articleID'] = $_GET['articleID'];
    }

    //if session is not set (user just entred)
    if(!isset($_SESSION['editarticle']['title'])) {
        $editart_sql="select * from article where id=".$_GET['articleID'];
        $editart_query=mysqli_query($dbconnect, $editart_sql);
        $editart_res=mysqli_fetch_assoc($editart_query);

        //set session
        $_SESSION['editarticle']['title']=$editart_res['title'];
        $_SESSION['editarticle']['image']=$editart_res['img'];
        $_SESSION['editarticle']['text']=$editart_res['text'];
        $_SESSION['editarticle']['category']=$editart_res['categoryId'];
    }
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
                    <form class="form-signin" name="add" method="post" action="index.php?page=confirmedit">

                        <div class="form-label-group">
                            Title :
                            <input type="text" name="title" value=" <?php echo $_SESSION['editarticle']['title']; ?>" class="form-control" placeholder="Title" >
                            <p class="help-block text-danger"></p>
                        </div>

                        <div class="form-label-group">
                            Image :
                            <input type="text" name="image" value=" <?php echo $_SESSION['editarticle']['image']; ?>" class="form-control" placeholder="Image" >
                            <p class="help-block text-danger"></p>
                        </div>

                        <div class="form-label-group">
                            Category :
                            <?php
                                $selected=$_SESSION['editarticle']['category'];
                            ?>
                            <select class="custom-select-sm" name="category">
                                <option value="1" <?php if($selected == '1'){echo("selected");}?> >News</option>
                                <option value="2" <?php if($selected == '2'){echo("selected");}?> >Tips & Tricks</option>
                            </select>
                        </div>


                        <div class="form-label-group">
                            Text :
                            <TEXTAREA class="form-control" name="text" rows=4 cols=30>
                                <?php echo $_SESSION['editarticle']['text']; ?>
                            </TEXTAREA>
                            <p class="help-block text-danger"></p>
                        </div>

                        <button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit" name="edit">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
