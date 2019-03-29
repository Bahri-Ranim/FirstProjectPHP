<?php
/**
 * Created by PhpStorm.
 * User: imene
 * Date: 29/03/2019
 * Time: 00:46
 */

session_start();

if(isset($_POST['sign-up'])) {

    $login_sql="select * from user where username='".$_POST['username']."' and password='".$_POST['password']."'";
    if ($login_query=mysqli_query($dbconnect, $login_sql)) {
        $login_res=mysqli_fetch_assoc($login_query);
        $user=$login_res['username'];
    }

    if($_POST['password'] != $_POST['confirmpassword']){
        $password_dismatch = true;
    }

    var_dump(!isset($user) && !isset($password_dismatch));
    if(!isset($user) && !isset($password_dismatch)){
        $register_sql = "insert into user (username, password, admin) values ('".$_POST['username']."','".$_POST['password']."','0')";
        $register_query=mysqli_query($dbconnect, $register_sql);
    }
}


include ("sign-up.php");

