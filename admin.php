<?php

    session_start();
    //check if user is logging out
    if (isset($_GET['action']) && ($_GET['action']=="logout") ){
            unset($_SESSION['admin']);
            unset($_SESSION['user']);
    }


    //check if username and password match : ADMIN

    if(isset($_POST['login'])) {
        $login_sql="select * from user where admin=1 and username='".$_POST['username']."' and password='".$_POST['password']."'";

        if ($login_query=mysqli_query($dbconnect, $login_sql)) {
            $login_res=mysqli_fetch_assoc($login_query);
            $_SESSION['admin']=$login_res['username'];
        }
    }

    //check if username and password match : USER

    if(isset($_POST['login'])) {
        $login_sql="select * from user where admin=0 and username='".$_POST['username']."' and password='".$_POST['password']."'";

        if ($login_query=mysqli_query($dbconnect, $login_sql)) {
            $login_res=mysqli_fetch_assoc($login_query);
            $_SESSION['user']=$login_res['username'];
        }
    }

    if(isset($_SESSION['admin'])) {
        include("cpanel.php");
    } else if(isset($_SESSION['user'])) {
        include("userpanel.php");
    } else {
        include ("login.php");
    }
