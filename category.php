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
        <h1> <?php echo $article_res['catname']; ?></h1>
        <?php do {
            ?>
            <div class="item">
                <p>
                    <h2>
                        <?php echo $article_res['title']; ?>
                    </h2>
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