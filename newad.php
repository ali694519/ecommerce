<?php
ob_start();
session_start();
$pageTitle="Create New Item";
include 'init.php';
if(isset($_SESSION['user'])) {

    if($_SERVER['REQUEST_METHOD'] == 'POST') {

        $formerrors = array();

        $name       = filter_var($_POST['name'],FILTER_UNSAFE_RAW);
        $desc       = filter_var($_POST['description'],FILTER_UNSAFE_RAW);
        $price      = filter_var($_POST['price'],FILTER_SANITIZE_NUMBER_INT);
        $country    = filter_var($_POST['country'],FILTER_UNSAFE_RAW);
        $status     = filter_var($_POST['status'],FILTER_SANITIZE_NUMBER_INT);
        $category   = filter_var($_POST['category'],FILTER_SANITIZE_NUMBER_INT);
        $tags       = filter_var($_POST['tags'],FILTER_UNSAFE_RAW);

        if(strlen($name) < 4) {
            $formerrors[] = "Item Title Must Be At Least 4 Characters";
        }
        if(strlen($desc) < 10) {
            $formerrors[] = "Item Description Must Be At Least 10 Characters";
        }
        if(strlen($country) < 2) {
            $formerrors[] = "Item Country Must Be At Least 2 Characters";
        }
        if(empty($price)) {
            $formerrors[] = "Item Price Must Be Not Empty";
        }
        if(empty($status)) {
            $formerrors[] = "Item Status Must Be Not Empty";
        }
        if(empty($category)) {
            $formerrors[] = "Item Category Must Be Not Empty";
        }

          // If There's No Error Proced The Update Operation
          if(empty($formerrors)) {
            // Insert User Info In DastaBase
        $stmt = $connect->prepare("INSERT INTO itemss(name,description,price,countrymade,status,adddate, cat_id, member_id,tags)
values(:zname, :zdesc, :zprice, :zcountry, :zstatus, now(), :zcat, :zmember,:ztags)");

            $stmt->execute(array(
            "zname"     =>$name ,
            "zdesc"     =>$desc ,
            "zprice"    =>$price,
            "zcountry"  =>$country,
            "zstatus"   =>$status,
            "zcat"      =>$category,
            "zmember"   =>$_SESSION['uid'],
            "ztags"      =>$tags,

            ));

            //echo Success Message
            if($stmt) {

              $scuccesMsg = "Item Has Been Added";

            }
        }
    }



?>

<!-- Code Html -->
<h1 class="text-center"><?php echo $pageTitle ;?></h1>
<div class="block"> <!--// class information-->
    <div class="create-ad">
    <div class="container">
            <div class="panel panel-default">
            <div class="panel-heading"><?php echo $pageTitle; ?></div>
            <div class="panel-body">
           <div class="row">
               <div class="col-md-8">
               <form action="<?php echo $_SERVER['PHP_SELF']?>" method="POST" class="form-horizontal main-form">
        <!-- Start Name Field -->
        <div class="form-group form-group-lg">
            <label class="labell col-sm-2  control-label">Name</label>
            <div class="col-sm-10 ">
                <input
                pattern=".{4,}"
                title="This Field Require At Least 4 Characters"
                 type="text" class="form-control live"  required="required"  name="name" placeholder="Name Of The Item" data-class=".live-title">
            </div>
        </div>
        <!-- End Name Field -->

        <!-- Start Description Field -->
        <div class="form-group form-group-lg">
                    <label class="labell col-sm-2  control-label">Description</label>
                    <div class="col-sm-10 ">
                        <input
                        pattern=".{10,}"
                title="This Field Require At Least 10 Characters"
                        type="text" class="form-control live" required="required"  name="description" placeholder="Description Of The Item"
                       data-class=".live-desc">
                    </div>
                </div>
                <!-- End Description Field -->

                <!-- Start Price Field -->
        <div class="form-group form-group-lg">
                    <label class="labell col-sm-2  control-label">Price</label>
                    <div class="col-sm-10 ">
                        <input type="text" class="form-control live" required="required"  name="price" placeholder="Price Of The Item"  data-class=".live-price">
                    </div>
                </div>
                <!-- End Price Field -->


                <!-- Start Country Field -->
        <div class="form-group form-group-lg">
                    <label class="labell col-sm-2  control-label">Country</label>
                    <div class="col-sm-10 ">
                        <input type="text" class="form-control" required="required"  name="country" placeholder="Country Of Made">
                    </div>
                </div>
                <!-- End Country Field -->
                

                <!-- Start Status Field -->
                <div class="form-group form-group-lg">
                    <label class="labell col-sm-2  control-label">Status</label>
                    <div class="col-sm-10 ">
                        <select name="status" id="" required>
                            <option value="0">...</option>
                            <option value="1">New</option>
                            <option value="2">Like New</option>
                            <option value="3">Used</option>
                            <option value="4">Very Old</option>
                        </select>
                    </div>
                </div>
                <!-- End Status Field -->




                <!-- Start Categories Field -->
                <div class="form-group form-group-lg">
                    <label class="labell col-sm-2  control-label">Categories</label>
                    <div class="col-sm-10 ">
                        <select name="category" required id="">
                            <option value="0">...</option>
                            <?php
                    //    $cats = GetAllFrom("categoriess","id");
                    $cats = getCat();
                          foreach($cats as $cat) {
      echo "<option value ='".$cat['id']."'>".$cat['name']."</option>";
                          }
                          ?>
                        </select>
                    </div>
                </div>
                <!-- End Categories Field -->


<!-- Start Tags Field -->
        <div class="form-group form-group-lg">
            <label class="labell col-sm-2  control-label">Tags</label>
            <div class="col-sm-10 ">
                <input type="text" class="form-control"  name="tags" placeholder="Separte Tags With Comma (,)"
                value="">
            </div>
        </div>
 <!-- End Tags Field -->





        <!-- Start Submit Field -->
        <div class="form-group form-group-lg">
            <div class=" col-sm-offset-2 col-sm-10">
                <input type="submit" class="btn btn-primary btn-sm add-item" value="Add Item">
            </div>
        </div>
        <!-- End Submit Field -->
    </form>
                     </div>
                     <div class="col-md-4">
                    <div class="thumbnail item-box live-preview">
                        <span class="price-tag">
                            $
                            <span class="live-price">
                                0
                            </span>
                        </span>
                         <img src="SeekPng.com_silhouette-person-png_1100707.png" alt="" class="img-thumbnail">
                            <div class="caption">
                                <h3 class="live-title">Title</h3>
                                <p class="live-desc">Description</p>
                            </div>
                         </div>
                       </div>
                   </div>
                   <!--Start Looping Through Errors-->
 <?php
        if(!empty($formerrors)) {
            foreach($formerrors as $error) {
                echo "<div class='alert alert-danger'>".$error."</div>";
            }
        }

        if(isset($scuccesMsg)) {
            echo "<div class='alert alert-success'>".$scuccesMsg."</div>";
        }
?>
                   <!--End Looping Through Errors-->
                </div>
            </div>
        </div>
    </div>
</div>
<?php
}else{
header("Location:login.php");
exit();
}
include $tpl . 'footer.php';
ob_end_flush();
?>