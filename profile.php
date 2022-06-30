<?php
ob_start();
session_start();
$pageTitle="Profile";
include 'init.php';
if(isset($_SESSION['user'])) {

    $getUser = $connect->prepare("SELECT * FROM userss WHERE username = ? ");
    $getUser->execute(array($sessionUser));
    $info = $getUser->fetch();
?>

<!-- Code Html -->
<h1 class="text-center">My Profile</h1>
<div class="information block">
    <div class="container">
         <div class="panel panel-default">
         <div class="panel-heading">My Information</div>
         <div class="panel-body">
             <ul class="list-unstyled">
         <li>
             <i class="fa fa-unlock fa-fw"></i>
             <span>Login Name :</span>  <?php echo $info['username']?>
            </li> 
         <li>
             <i class="fa fa-envelope fa-fw"></i>
             <span>Email :</span>  <?php echo $info['email']?>
            </li> 
         <li>
              <i class="fa fa-user fa-fw"></i>
             <span>Full Name :</span> <?php echo $info['fullname']?>
            </li> 
         <li>
              <i class="fa fa-calendar fa-fw"></i>
             <span>Register Date :</span> <?php echo $info['Daatee']?>
            </li> 
         <li>
             <i class="fa fa-tags fa-fw"></i>
             <span>Favourite Category :</span>
            </li>
            </ul> 
            <a href="#" class=" btn btn-default">Edit Information</a>
    </div>
</div>
</div>
</div>

<div id="my-ads" class="my-ads block">
    <div class="xx container">


         <div class="panel panel-default">
         <div class="panel-heading">My Items</div>
         <div class="panel-body">
            <?php
            if(!empty(getItem('member_id',$info['userid']))) {
                echo "<div class='row'>";
            $getItem = getItem('member_id',$info['userid'],1);
            foreach($getItem as $item) {
                ?>
                <div class="'col-sm-6 col-md-3">
                <?php
                echo "<div class=' item-box'>";
                if($item['approve'] == 0) {
                    echo "<span class='approve-status'>Wating Approval</span>";
                }
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
 echo "</div>";
 }
 else 
        {
echo "Sorry Ther's No Ads To Show, Create <a href='newad.php'>New Ad</a>";
         }
        ?> 
       </div>
    </div>
  </div>
</div>

<div class="my-comments block">
    <div class="container">
         <div class="panel panel-default">
         <div class="panel-heading">Latest Comments </div>
         <div class="panel-body">
         <!-- // Select All Users Except Admin -->
         <?php
// Select All Users Except Admin
$stmt = $connect->prepare("SELECT comment FROM commentss WHERE user_id = ?");
//Execute Statement
$stmt->execute(array($info['userid']));
//Assign To Variable
$comments = $stmt->fetchAll();
if(!empty($comments)) {
foreach($comments as $comment) {
echo "<p>".$comment['comment']."</p>";

}
}else {
    echo "Ther's No Comments To Show";
}
}else{
header("Location:login.php");
exit();
}
include $tpl . 'footer.php';
ob_end_flush();
?>