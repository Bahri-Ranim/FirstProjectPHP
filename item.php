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
            <h1>
                <?php echo $item_res['title']; ?>
            </h1>
            <p>
                <img src="images/<?php echo $item_res['img']; ?>" style="width:200px;height:150px;">

            </p>
            <p>
                <?php echo $item_res['text']; ?>
            </p>

        <?php
    }

