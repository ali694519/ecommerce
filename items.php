<?php
ob_start();
session_start();
$pageTitle="Show Item";
include 'init.php';

  //Check Id Get Request itemid Is Numeric & Get The Integer Value Of It
  $itemid=isset($_GET['itemid']) && is_numeric($_GET['itemid']) ?
  intval($_GET['itemid']) :0;
  // Select Al  Data Depend On This ID
  $stmt = $connect->prepare("SELECT itemss.*,categoriess.name as Category_Name,userss.username as User_Name FROM itemss INNER JOIN categoriess ON categoriess.id = itemss.cat_id INNER JOIN userss ON userss.userid = itemss.member_id
    WHERE itemid = ? AND approve = 1");
  //Execute Query
  $stmt->execute(array($itemid));

  $count = $stmt->rowCount();

  if($count > 0 ) {
    // Fetch The Data
    $item = $stmt->fetch();
?>

<!-- Code Html -->
<h1 class="text-center"><?php echo $item['name'] ?></h1>
<div class="container">
    <div class="row">
        <div class="col-md-3">

    <img class=" img-responsive img-thumbnail center-block" src="SeekPng.com_silhouette-person-png_1100707.png" alt="">
        </div>
        <div class="col-md-9 item-info">

        <h2><?php echo $item['name'];?></h2>
        <p><?php echo $item['description'];?></p>
        <ul class="list-unstyled">
            <li>
              <i class="fa fa-calendar fa-fw"></i>
              <span>Added Date</span> :<?php echo $item['adddate'];?>
            </li>
            <li>
              <i class="fa fa-money fa-fw"></i>
              <span>Price</span> :<?php echo  $item['price'];?>
            </li>
            <li>
              <i class="fa fa-building fa-fw"></i>
              <span>Made In</span> :<?php echo $item['countrymade'];?>
            </li>
            <li>
              <i class="fa fa-tags fa-fw"></i>
              <span>Category</span> :<a href="categories.php?pageid=<?php echo $item['cat_id'];?>"> <?php echo $item['Category_Name'] ?>
              </a> 
            </li>
            <li>
              <i class="fa fa-user fa-fw"></i>
              <span>Added By</span> : <a href="#"><?php echo $item['User_Name'] ?></a>
            </li>

            <li class='tags-items'>
              <i class="fa fa-user fa-fw"></i>
              <span>Tags</span>
              <?php
              $allTags = explode(",",$item['tags']);
              foreach($allTags as $tag) {
                $tag = str_replace('','',$tag);
                $lowertag = strtolower($tag);
                if(!empty($tag)) {
                  echo"<a  href = 'tags.php?name={$lowertag}'>". $tag." </a>  ";
                }
              }
              ?>
            </li>
        </ul>
        </div>
    </div>
    <!-- Start Add Comment-->
    <hr class="custom-hr">
    <?php if (isset($_SESSION['user'])) {
?>
    <div class="row">
      <div class="m-left col-md-3">
        <div class="add-comment">
        <h3>Add Your Comment</h3>
<form action="<?php echo $_SERVER['PHP_SELF'].'?itemid='.$item['itemid'] ?>" method="POST">
          <textarea name="comment" required>  </textarea>
          <input class="btn btn-primary" type="submit" value="Add Comment">
        </form>
        <?php 
          if($_SERVER['REQUEST_METHOD'] == 'POST')
           {
            $comment = filter_var($_POST['comment'],FILTER_UNSAFE_RAW);
            $itemid  = $item['itemid'];
            $userid  = $_SESSION['uid'];
            if (!empty($comment)) {
              $stmt = $connect->prepare("INSERT INTO commentss(comment,status,commentdate,item_id,user_id) VALUES(:zcomment,0,NOW(),:zitemid,:zuserid)");
              $stmt->execute(array(
                  "zcomment" =>$comment,
                  "zitemid"  =>$itemid,
                  "zuserid"  =>$userid,
              ));
              if($stmt) {
                echo "<br> <div class='alert alert-success'>Comment Added</div>";
              }
            }
          }
?>
        </div>
      </div>
    </div>
  <!-- End Add Comment-->
  <?php } else 
    echo "<a href='login.php'>Login</a> or <a href='login.php'>Register</a> To Add Comment";
    ?>
    <hr class="custom-hr">
    <?php
          // Select All Users Except Admin
          $stmt = $connect->prepare("SELECT commentss.*,userss.username as User_Nmae FROM commentss  INNER JOIN userss ON userss.userid = commentss.user_id
          WHERE item_id = ?
          AND status = 1
          ORDER BY cid DESC
          ");
          //Execute Statement
          $stmt->execute(array($item['itemid']));
          //Assign To Variable
          $comments = $stmt->fetchAll();
        ?>
  <?php
           foreach($comments as $comment) {
              ?>
            <div class="comment-box">
            <div class="x-img row">
              <div class="col-sm-2 text-center">
                <img class=" img-thumbnail" src="SeekPng.com_silhouette-person-png_1100707.png" alt="">
                <?php echo $comment['User_Nmae'];?>
              </div>
              <div class="col-sm-10">
                <p class="lead">
                <?php echo $comment['comment'];?>
                </p>
              </div>
            </div>
            </div>
            <hr class="custom-hr">
          <?php
          }
?>
</div>

<?php
  } else {
      echo "Ther's No Such Id or This Item Wating Approval";
  }

include $tpl . 'footer.php';
ob_end_flush();
?>