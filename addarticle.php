<?php
    session_start();
    //check if user in logged in
    if(!isset($_SESSION['admin'])) {
        header("location:index.php");
    }

    //set session to blank if user just entred this page
    if(!isset($_SESSION['addarticle']['title'])) {
        $_SESSION['addarticle']['title']="";
    }
    if(!isset($_SESSION['addarticle']['image'])) {
        $_SESSION['addarticle']['image']="";
    }
    if(!isset($_SESSION['addarticle']['text'])) {
        $_SESSION['addarticle']['text']="";
    }
    if(!isset($_SESSION['addarticle']['category'])) {
        $_SESSION['addarticle']['category']="0";
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
                    <h5 class="card-title text-center">Add article</h5>
                    <form class="form-signin" name="add" method="post" action="index.php?page=confirmadd">

                        <div class="form-label-group">
                            Title :
                            <input type="text" name="title" value=" <?php echo $_SESSION['addarticle']['title']; ?>" class="form-control" placeholder="Title" >
                            <p class="help-block text-danger"></p>
                        </div>

                        <div class="form-label-group">
                            Image :
                            <input type="text" name="image" value=" <?php echo $_SESSION['addarticle']['image']; ?>" class="form-control" placeholder="Image" >
                            <p class="help-block text-danger"></p>
                        </div>

                        <div class="form-label-group">
                            Category :
                            <?php
                            $selected=$_SESSION['addarticle']['category'];
                            ?>
                            <select class="custom-select-sm" name="category">
                                <option value="1" <?php if($selected == '1'){echo("selected");}?> >News</option>
                                <option value="2" <?php if($selected == '2'){echo("selected");}?> >Tips & Tricks</option>
                            </select>
                        </div>


                        <div class="form-label-group">
                            Text :
                            <TEXTAREA class="form-control" name="text" rows=4 cols=30>
                                <?php echo $_SESSION['addarticle']['text']; ?>
                            </TEXTAREA>
                            <p class="help-block text-danger"></p>
                        </div>

                        <button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit" name="login">Add</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
