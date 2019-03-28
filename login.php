<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <LINK rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <h1>Login</h1> <input type="submit" name="login" value="Submit">
    <div class="control-group">
        <form name="login" method="post" action="index.php?page=admin">
            <p>
                <label>Username</label>
                <input name="username" type="text" maxlength=30 value="name">
            </p>
            <p>
                <label>Password</label>
                <input name="password" type="password" maxlength=30>
            </p>
            <p>
                <button type="submit" name="login" value="Submit">Submit</button>
            </p>
        </form>
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