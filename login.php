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
                    <h5 class="card-title text-center">Sign In</h5>
                    <form class="form-signin" name="login" method="post" action="index.php?page=admin">
                        <div class="form-label-group">
                            <input type="text" id="username" name="username" class="form-control" placeholder="Username" >
                            <label for="username">Username</label>
                            <p class="help-block text-danger"></p>
                        </div>

                        <div class="form-label-group">
                            <input type="password" name="password" id="password" class="form-control" placeholder="Password" required>
                            <label for="password">Password</label>
                            <p class="help-block text-danger"></p>
                        </div>

                        <div class="custom-control custom-checkbox mb-3">
                            <input type="checkbox" class="custom-control-input" id="customCheck1">
                            <label class="custom-control-label" for="customCheck1">Remember password</label>
                            <p class="help-block text-danger"></p>
                        </div>

                        <?php

                            if(isset($_POST['login']) && !isset($_SESSION['admin']))  {
                                ?>
                                    <p>
                                        <span class="error"> Incorrect username or password</span>
                                    </p>

                                <?php
                            }
                        ?>


                        <button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit" name="login">Sign in</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>





<?php
/**
 * Created by PhpStorm.
 * User: Asus
 * Date: 28/03/2019
 * Time: 14:53
 */