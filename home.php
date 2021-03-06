
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <link href="css/display-items.css" rel="stylesheet" type="text/css">
    <link href="css/search-bar.css" rel="stylesheet" type="text/css">



</head>
<body></body>
<header class="masthead" style="background-image: url('img/home.jpg')">
    <div class="overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
                <div class="site-heading">
                    <h2>Technology for everyone</h2>
                    <span class="subheading">Join our community and learn something new everyday ! </span>
                </div>

            </div>
        </div>
        <div>
            <form method ="POST" action="index.php?action=search" >

                <input name="search" type="search" placeholder="Search..">
                <i class="fa fa-search" ></i>

            </form>
        </div>
    </div>
</header>

<?php




if (isset($_GET['action'])) {
    if ($_GET['action']=="search") {

        $search = $_POST['search'];
        $article_sql="SELECT *
                  FROM article 
                  where article.confirmed=1 and article.title LIKE '%$search%'";

        }
    } else {

        //select all articles
        $article_sql="SELECT *
                          FROM article 
                          where article.confirmed=1";
        }

    if ($article_query=mysqli_query($dbconnect, $article_sql)) {
        $article_res = mysqli_fetch_assoc($article_query);
    }


    if (mysqli_num_rows($article_query)==0) {

        ?>
        <p style="margin-left: auto; margin-right: auto;text-align: center">
            No articles found
        </p>
        <?php
    } else {
        ?>

    <div class="offset col">

        <?php
        do {
            ?>   <div class="row ">

                        <div class="col-3" >
                            <img  src="images/<?php echo $article_res['img']; ?>" style="width:100%; padding-top: 60px;  "alt="Card image cap">
                        </div>
                        <div class="col" >
                            <div >
                                <h5> <?php echo $article_res['title']; ?></h5>
                                <hr>
                            </div>
                            <div >
                                <p class="text_article"> <?php echo $article_res['text']; ?> ... </p>
                                <p class="suspension">  ... </p>
                                <hr>
                            </div>

                            <div class="btn_view">
                                 <a href="index.php?page=item&articleID=<?php echo $article_res['id']; ?>" class="btn btn-primary">View More </a>
                            </div>
                        </div>
                 </div>
                 <br/>

            <?php
        }while ($article_res = mysqli_fetch_assoc($article_query));
        ?>

    </div>
<?php
}?>
</body>
</html>

