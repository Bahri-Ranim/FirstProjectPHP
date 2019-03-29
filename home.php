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

<?php
//select all articles belonging to the selected categoryID
$article_sql="SELECT article.id, article.title, article.img, article.text
                  FROM article join category on article.categoryId=category.categoryID";
if ($article_query=mysqli_query($dbconnect, $article_sql)){
    $article_res=mysqli_fetch_assoc($article_query);
}
if (mysqli_num_rows($article_query)==0) {
    echo "no article in the database";
} else {
    ?>

    <div class="offset-1 col">

        <?php
        do {
            ?>   <div class="row " style ="width: 80%; border: 2px solid #C0C0C0; border-radius: 5px;">

                        <div class="col-3" >
                            <img  src="images/<?php echo $article_res['img']; ?>" style="width:100%; padding-top: 60px;  "alt="Card image cap">
                        </div>
                        <div class="col" style="padding-bottom: 10px; padding-top: 10px; ">
                            <div  style="padding-left:20px; ">
                                <h5 style="color: 	#787878"> <?php echo $article_res['title']; ?> </h5>
                                <hr style="border: 0.5px solid 	#C0C0C0">
                            </div>
                            <div style="padding-left: 20px; ">
                                <p  style="line-height:1.2em; height:2.4em; overflow:hidden;"> <?php echo $article_res['text']; ?> ... </p>
                                <p style="text-align: center">  ... </p>
                                <hr style="border: 0.5px solid 	#C0C0C0">
                            </div>

                            <div style="padding-left: 20px; text-align: center; ">
                                 <a  style="  margin:0 auto;" href="index.php?page=item&articleID=<?php echo $article_res['id']; ?>" class="btn btn-primary">View More </a>
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

