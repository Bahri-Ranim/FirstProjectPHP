<!-- Page Header -->
<header class="masthead">
    <div class="overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
            </div>
        </div>
    </div>
</header>


<?php
    session_start();
    if(isset($_SESSION['admin'])) {
        include("cpanel.php");
    } else {
        include ("login.php");
    }
