<?php
/**
 * Created by PhpStorm.
 * User: imene
 * Date: 28/03/2019
 * Time: 00:35
 */
?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Title</title>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom fonts for this template -->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href='https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>

  <!-- Custom styles for this template -->
   <link href="css/clean-blog.min.css" rel="stylesheet">

  <!-- Style for search bar -->
    <link href="css/search-bar.css" rel="stylesheet" type="text/css">



</head>

<body>

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
    <div class="container">
      <a class="navbar-brand" href="index.php">Title </a>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
    Menu
        <i class="fas fa-bars"></i>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link" href="index.php">Home</a>
          </li>
            <?php
            include("categoryList.php");
            ?>

          <li class="nav-item">
            <a class="nav-link" href="index.php?page=contact">Contact</a>
          </li>
         <!-- <li>

              <form action="">
                  <input type="search" placeholder="Search..">
                  <i  class="fa fa-search"  ></i>
              </form>
          </li>-->
          <li class="nav-link dropdown" >

              <button class="dropbtn">login</button>
                 <div class="dropdown-content">
                     <a href="index.php?page=admin">Login</a>
                     <a href="index.php?page=admin&action=logout">Logout</a>
                 </div>

          </li>
                    <li class="nav-link">
                        <div class="nav-link" >
                            <a class="dropbtn" style="text-decoration: none; color: white;" href="index.php?page=register">Sign-up

                            </a>
                        </div>
                    </li>
        </ul>
      </div>
    </div>
  </nav>