<?php

    session_start();
    //check if user is logging out
    if (isset($_GET['action'])) {
        if ($_GET['action']=="logout") {
            unset($_SESSION['admin']);
    }}

    //check if username and password match
    if(isset($_POST['login'])) {
        $login_sql="select * from user where admin=1 and username='".$_POST['username']."' and password='".$_POST['password']."'";
        if ($login_query=mysqli_query($dbconnect, $login_sql)) {
            $login_res=mysqli_fetch_assoc($login_query);
            $_SESSION['admin']=$login_res['username'];
        }
    }

    if(isset($_SESSION['admin'])) {
        include("cpanel.php");
    } else {
        include ("login.php");
    }
