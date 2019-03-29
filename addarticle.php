<?php
    session_start();
    //check if user in logged in
    if(!isset($_SESSION['admin'])) {
        header("location:index.php?page=admin");
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
                    <form class="form-signin" name="add" method="post" action="index.php?page=enterarticle">

                        <div class="form-label-group">
                            Title :
                            <input type="text" name="title" class="form-control" placeholder="Title" >
                            <p class="help-block text-danger"></p>
                        </div>

                        <div class="form-label-group">
                            Image :
                            <input type="text" name="image" class="form-control" placeholder="Image" >
                            <p class="help-block text-danger"></p>
                        </div>

                        <div class="form-label-group">
                            Category :
                                <select class="custom-select-sm" name="category">
                                    <option value="0">Select category:</option>
                                    <option value="1">News</option>
                                    <option value="2">Tips & Tricks</option>
                                </select>
                        </div>


                        <div class="form-label-group">
                            Text :
                            <TEXTAREA class="form-control" name="text" rows=4 cols=30></TEXTAREA>
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
