<?php
session_start();
ob_start();
 include 'init.php';?>

<div class="container">

    <h1 class='text-center'>Show Category Items</h1>
    <div class="row">
<?php
// $category=isset($_GET['pageid'])&& is_numeric($_GET['pageid'])?intval($_GET['pageid']):0;

if (isset($_GET['pageid'])&& is_numeric($_GET['pageid'])) {
    $category = intval($_GET['pageid']);
$getItem = getItem('cat_id',$category);
foreach($getItem as $item) {
?>
        <div class="col-sm-6 col-md-4">
<?php
    echo "<div class='item-box'>";
            echo "<span class='price-tag'>".$item['price']."</span>"; 
            echo "<img src=\"SeekPng.com_silhouette-person-png_1100707.png\" alt=\"\" class=\"img-thumbnail\">";
            echo "<div class='caption'>";
            echo "<h3> <a href='items.php?itemid=".$item['itemid']."'>".$item['name']."</a></h3>";
            echo "<p>".$item['description']."</p>";
            echo "<div class='date'>".$item['adddate']."</div>";
            echo "</div>";
    echo "</div>";
?>
            </div>
                <?php
             }
            }else {

                echo "You Must Add Page Id";
            }
        ?>
    </div>
 

</div>



<?php include $tpl . 'footer.php';
ob_end_flush();
?>