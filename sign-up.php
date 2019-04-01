<?php
/**
 * Created by PhpStorm.
 * User: imene
 * Date: 28/03/2019
 * Time: 20:28
 */
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <LINK rel="stylesheet" type="text/css" href="style.css">
</head>
<body style="background-image: url('img/1.jpg'); background-repeat: no-repeat;background-size: cover;">

<div class="container container_body">
    <div class="row">
        <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
            <div class="card card-signin my-5">
                <div class="card-body">
                    <h5 class="card-title text-center">Sign Up</h5>
                    <form class="form-signin" name="sign-up" method="post" action="index.php?page=register">
                        <div class="form-label-group">
                            <input type="text" id="username" name="username" class="form-control" placeholder="Username" >
                            <label for="username">Username</label>
                            <p class="help-block text-danger"></p>
                        </div>

                        <div class="form-label-group">
                            <input type="password" name="password" id="password" class="form-control" placeholder="Password"  minlength="8" required>
                            <label for="password">Password</label>
                            <p class="help-block text-danger"></p>
                        </div>

                        <div class="form-label-group">
                            <input type="password" name="confirmpassword" id="confirmpassword" class="form-control" placeholder="Confirm Password" required>
                            <label for="confirmpassword">Confirm Password</label>
                            <p class="help-block text-danger"></p>
                        </div>

                        <?php



                        if(isset($_POST['sign-up']) && isset($user) ) {
                            ?>
                            <p>
                                <span class="error"  style = "color: red" > Username already taken </span>
                            </p>

                            <?php
                        }else {


                              if (isset($_POST['sign-up']) && isset($password_dismatch)) {
                                ?>
                                <p>
                                    <span class="error"  style = "color: red"> please confirm your password correctly  </span>
                                </p>

                                <?php
                                  }
                              }?>


                        <button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit" name="sign-up">Sign up</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>

