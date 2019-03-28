<?php
    $catname = "select category.name, category.img from category where category.categoryId=".$_GET['categoryID'] ;
    $cat_query = mysqli_query($dbconnect, $catname);
    $catname_res = mysqli_fetch_assoc($cat_query);



?>

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
    </div>
</header>
<?php
    //if categoryID is not set, redirect back to index page
    if (!isset($_GET['categoryID'])) {
        header("location:index.php");
    }
    //select all articles belonging to the selected categoryID
    $article_sql="SELECT article.id, article.title, article.img, article.text, category.name as catname 
                  FROM article join category on article.categoryId=category.categoryID 
                  WHERE article.categoryId=".$_GET['categoryID'];
    if ($article_query=mysqli_query($dbconnect, $article_sql)){
       $article_res=mysqli_fetch_assoc($article_query);
    }
    if (mysqli_num_rows($article_query)==0) {
        echo "no article in the database";
    } else {
        do {
            ?>
            <div class="item">
                <a href="index.php?page=item&articleID=<?php echo $article_res['id']; ?>">
                    <p>
                        <h2><?php echo $article_res['title']; ?></h2>
                    </p>
                </a>

                <p>
                    <img src="images/<?php echo $article_res['img']; ?>" style="width:200px;height:150px;">

                </p>
            </div>
        <?php
        } while ($article_res=mysqli_fetch_assoc($article_query));
        ?>
    <?php
    }  ?>


