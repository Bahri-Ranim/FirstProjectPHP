<?php
$category_sql="SELECT category.img as catimg 
                  FROM category join article on article.categoryId=category.categoryID 
                  WHERE article.id=".$_GET['articleID'];
$cat_query = mysqli_query($dbconnect, $category_sql);
$catimg_res = mysqli_fetch_assoc($cat_query);

?>

<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">
        <link href="css/item.css" rel="stylesheet" type="text/css">
</head>

<body>
    <header class="masthead" style="background-image: url('<?php echo $catimg_res['catimg'] ?> '); max-height:70px">
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
    //if articleID is not set, redirect back to index page
    if (!isset($_GET['articleID'])) {
        header("location:index.php");
    }
    //select
    $item_sql="select * from article where id=".$_GET['articleID'];
    if($item_query=mysqli_query($dbconnect, $item_sql)) {
        $item_res=mysqli_fetch_assoc($item_query);
        ?>

        <div class="row item_container">
            <h2> <?php echo $item_res['title']; ?> </h2>
            <div class="col-7">
                <p> <?php echo $item_res['text']; ?> </p>
            </div>
            <div class="col-4">
                <img  src="images/<?php echo $item_res['img']; ?>">
            </div>
        </div>

        <?php
    }
?>

</body>
</html>