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
      ?>

            <div class="offset-1 col">

                <?php
                do {
                    ?>
                    <div class="row " style ="width: 80%; border: 2px solid #C0C0C0; border-radius: 5px;">

                        <div class="col-3" >
                            <img  src="images/<?php echo $article_res['img']; ?>" style="width:100%; padding-top: 60px;  "alt="Card image cap">
                        </div>
                        <div class="col" style="padding-bottom: 10px; padding-top: 10px; ">
                            <div  style="padding-left:20px; ">
                                <h5 style="color: 	#787878"> <?php echo $article_res['title']; ?> </h5>
                                <hr style="border: 0.5px solid 	#C0C0C0">
                            </div>
                            <div style="padding-left: 20px; ">
                                <p  style="line-height:1.2em; height:2.4em; overflow:hidden;"> <?php echo $article_res['text']; ?> </p>
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



           <!--
            <div class="item">
                <a href="index.php?page=item&articleID=<?php /*echo $article_res['id']; */?>">
                    <p>
                        <h2><?php /*echo $article_res['title']; */?></h2>
                    </p>
                </a>

                <p>
                    <img src="images/<?php /*echo $article_res['img']; */?>" style="width:200px;height:150px;">

                </p>
            </div>
        --><?php
/*        } while ($article_res=mysqli_fetch_assoc($article_query));
        */?>
    <?php
    }  ?>


