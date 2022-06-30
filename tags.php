<?php
session_start();
ob_start();
 include 'init.php';?>

<br>
<div class="container">
    <div class="row">
<?php
if (isset($_GET['name'])) {
    $tag = $_GET['name'];
    ?>
    <h1 class="text-center"><?php echo $tag ?></h1>
    <?php
   
$tagesname = gettags("tags like '%$tag%'",);
foreach($tagesname as $item) {
?>
        <div class="col-sm-6 col-md-4">
<?php
    echo "<div class=' item-box'>";
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

                echo "You Must Enter Tag Name";
            }
        ?>
    </div>
 

</div>



<?php include $tpl . 'footer.php';
ob_end_flush();
?>