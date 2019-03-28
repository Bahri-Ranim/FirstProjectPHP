<?php
    $cat_sql="select * from category";
    $cat_query=mysqli_query($dbconnect, $cat_sql);
    $cat_res=mysqli_fetch_assoc($cat_query);
?>

    <?php
        do { ?>
    <li class="nav-item">
            <a  class="nav-link" href="index.php?page=category&categoryID=<?php echo $cat_res['categoryID']; ?>">
            <?php
            echo $cat_res['name'];
            ?>   </a>
    </li>
            <?php
        }while ($cat_res=mysqli_fetch_assoc($cat_query))
    ?>

