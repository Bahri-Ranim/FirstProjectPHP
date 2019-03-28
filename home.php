<header class="masthead" style="background-image: url('img/home.jpg')">
    <div class="overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
                <div class="site-heading">
                    <h1>Something</h1>
                    <span class="subheading">Something </span>
                </div>
            </div>
        </div>
    </div>
</header>
<h1> this is our home page</h1>
<?php
//select all articles belonging to the selected categoryID
$article_sql="SELECT *
                  FROM article join category on article.categoryId=category.categoryID";
if ($article_query=mysqli_query($dbconnect, $article_sql)){
    $article_res=mysqli_fetch_assoc($article_query);
}
if (mysqli_num_rows($article_query)==0) {
    echo "no article in the database";
} else {
   do {
        ?>
        <div class="item">
            <p>
            <h2>
                <?php echo $article_res['title']; ?>
            </h2>
            </p>
            <p>
                <img src="images/<?php echo $article_res['img']; ?>" style="width:200px;height:150px;">

            </p>
            <p>
                <?php echo $article_res['text']; ?>
            </p>
        </div>
        <?php
    } while ($article_res=mysqli_fetch_assoc($article_query));
    ?>
    <?php
}