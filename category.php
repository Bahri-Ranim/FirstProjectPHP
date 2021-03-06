<?php
    $catname = "select * from category where category.categoryId=".$_GET['categoryID'] ;
    $cat_query = mysqli_query($dbconnect, $catname);
    $catname_res = mysqli_fetch_assoc($cat_query);



?>

<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="css/display-items.css" rel="stylesheet" type="text/css">
</head>
<body>
<header class="masthead" style="background-image: url('<?php echo $catname_res['img'] ?> ')">
    <div class="overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
                <div class="site-heading">
                    <h1></h1>
                    <span class="subheading"></span>
                </div>
            </div>
        </div>
        <div>
            <form method ="POST"
                  action="index.php?page=category&categoryID=<?php echo $catname_res['categoryID']; ?>&action=search">
                <input name="search" type="search" placeholder="Search..">
                <i  class="fa fa-search"  ></i>
            </form>
        </div>
    </div>
</header>
<?php
    //if categoryID is not set, redirect back to index page
    if (!isset($_GET['categoryID'])) {
        header("location:index.php");
    }


    if (isset($_GET['action'])) {
        if ($_GET['action']=="search") {

            $search = $_POST['search'];

            $article_sql="SELECT article.id, article.title, article.img, article.text, category.name as catname 
                  FROM article join category on article.categoryId=category.categoryID 
                  WHERE article.confirmed=1 and article.title like '%$search%'
                  and article.categoryId=".$_GET['categoryID'];
        }} else {

            //select all articles belonging to the selected categoryID
            $article_sql = "SELECT article.id, article.title, article.img, article.text, category.name as catname 
                  FROM article join category on article.categoryId=category.categoryID 
                  WHERE article.confirmed=1 and article.categoryId=" . $_GET['categoryID'];
        }

        if ($article_query=mysqli_query($dbconnect, $article_sql)){
           $article_res=mysqli_fetch_assoc($article_query);
        }

        if (mysqli_num_rows($article_query)==0) {

            ?>
            <p style="margin-left: auto; margin-right: auto;text-align: center">
                No articles found
            </p>
            <?php
        } else {
      ?>

            <div class="offset col" >

                <?php
                do {
                    ?>
                    <div class="row">

                        <div class="col-3" >
                            <img  src="images/<?php echo $article_res['img']; ?>" >
                        </div>
                        <div class="col" >
                            <div >
                                <h5 > <?php echo $article_res['title']; ?> </h5>
                                <hr>
                            </div>
                            <div >
                                <p class="text_article"> <?php echo $article_res['text']; ?> </p>
                                <p class="suspension">  ... </p>


                                <hr>
                            </div>

                            <div class="btn_view"  >
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
    }  ?>

</body>
</html>
