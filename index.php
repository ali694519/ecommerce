<?php
ob_start();
session_start();
$pageTitle="Homepage";
include 'init.php';
?>
<br>
<div class="container">

    <div class="row">
            <?php
            $getAll = GetAllFrom("itemss","itemid","where approve = 1");
            foreach($getAll as $item) {
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
        ?>
    </div>
 

</div>


<?php
ob_end_flush();
include $tpl . 'footer.php';
?>