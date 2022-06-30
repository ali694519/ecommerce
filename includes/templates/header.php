
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo getTitle()?></title>
    <link rel="stylesheet" href="layout/fontawesome-free-5.15.3-web/css/all.min.css">
    <link rel="stylesheet" href="<?php echo $css;?>jquery-ui.css" />
    <link rel="stylesheet" href="<?php echo $css;?>jquery.selectBoxIt.css" />
    <link rel="stylesheet" href="<?php echo $css;?>bootstrap.css" />
    <!-- <link rel="stylesheet" href="<?php echo $css;?>frontend.css" /> -->
   <style>

     /* Start Main Rulez*/
body {
    background-color: #f4f4f4;
    font-size: 16px;
}
.input-container {
    position: relative;
}
.asterisk {
    font-size: 20px;
    position: absolute;
    right: 10px;
    top: 7px;
    color: #d20707;
}
.main-form .asterisk  {
    font-size:30px;
    position: absolute;
    right: 30px;
    top: 1px;
    color: #d20707;
}
.nice-message {
    padding: 10px;
    background-color: #fff;
    margin: 10px 0;
    border-left: 5px solid #080;
}
/* End Main Rulez*/
/* Start Navbar*/
a {
    text-decoration: none;
    color: rgba(34,54,69,.7);
    font-weight: 400;
}
a:hover {
    color: #0a3d62;
}
ul {
    list-style-type: none;
}
.navbar {
    background:cornsilk;
}
.navbar .navbar-brand a {
    padding: 1rem 0;
    display: block;
    text-decoration: none;
}
.navbar .navbar-brand {
    font-family: 'pacifico',cursive;
    font-size: 2.1rem;
    color: #0a3d62;
}
.navbar-toggler {
    background:#0a3d62;
    border: none;
    padding: 10px 6px;
    outline: none;
}
.navbar .icon {
    background-color: #0a3d62;
}
.navbar-toggler span  {
    display: block;
    width: 22px;
    height: 2px;
    border: 1px;
    background:#fff;
}
.navbar-toggler span +span {
margin-top: 4px;
width: 18px;
margin-left: 4px;
}
.navbar-toggler span + span + span {
    width: 10px;
    margin-left: 10px;
}
.navbar-expand-lg .navbar-nav .nav-link {
    /* padding: 1rem 1.0rem; */
    font-size: 1.1rem;
    font-weight: bold;
    position: relative;
}
.navbar-expand-lg .navbar-nav .nav-link:hover {
background-color: #ccc;
}
.navbar-expand-lg .navbar-nav .nav-link.active  {
border: 2px solid #0a3d62;
color: #0a3d62;
}
.navbar-nav .dropdown-item:hover {
    color: #0a3d62;
} 
.nav-item .dropdown-menu .dropdown-item {
    font-weight: 800;
    color:#0a3d62 ;
    background-color: mintcream;
}
.nav-item .dropdown-menu .dropdown-item:hover {
    background-color:darkgrey ;
}
/* End Navbar*/
h1{
    font-size: 55px;
    /* margin: 40px 0; */
    margin: 25px 0;
    font-weight: bold;
    color: #181414a3;;
}
                                /** Front End */ 

/** Start Header */
.upper-bar {
padding: 10px;
background-color: #fff;
}
.upper-bar .link-profile {
    color: blue;
}
.upper-bar .link-login {
    color: blue;
}
.upper-bar .link-logout {
    color: blue;
}
.upper-bar .link-newad {
    color: blue;
}
.upper-bar .my-info .menu-one {
    font-size: 20px;
    background: whitesmoke;
    padding: 15px;
}
.my-image {
    width: 40px;
    height: 40px;
    border-radius: 50%;
}
/** End Header */

/**Start Login Page*/
.login-page form {
    max-width: 380px;
    margin: auto;
}
.login-page form input {
    margin-bottom: 10px;
}
.login-page form,
.the-errors {
    max-width: 380px;
    margin: auto;
}
/**Start Login Page */
.login-page [data-class="login"].selected {
color: #337ab7;
}
.login-page [data-class="signup"].selected {
    color: #5cb85c;
}
/**End Login Page */
.login-page .selected {
    color: #b22020;
}
.login-page h1{
    color:#c0c0c0;
}
.login-page h1 span {
    cursor: pointer;
}
.login-page .signup {
    display: none;
}
.the-errors .msg {
    padding: 10px;
    text-align: center;
    border-left: 5px solid #cd6858;
    background-color: #fff;
    margin-bottom: 8px;
    border-right: 1px solid #e0e0e0;
    border-top: 1px solid #e0e0e0;
    border-bottom: 1px solid #e0e0e0;
    color: #919191;
}
.the-errors .error {
    border-left: 5px solid #cd6858;
}

/**End Login Page*/

/** Start Category Page */
.item-box {
    position: relative;
}
.item-box .price-tag {
    background-color: #b4b4b4;
    padding: 2px 10px;
    position: absolute;
    left: 0;
    top: 10px;
    font-weight: bold;
    color: #fff;
}
.item-box .img-thumbnail {
    width: 200px;
}
.tags-items a {
    display: inline-block;
    background-color: #e2e2e2;
    padding: 2px 10px;
    border-radius: 5px;
    color: #666;
    margin-right: 5px;
}
/** End Category Page */
/** Start Profile Page */
.panel-default {
    background-color: white;
    border: 1px solid #337ab7;
    margin-bottom: 20px;
    border-radius: 2px;
}
.panel-heading {
    background: #337ab7;
    border-radius: 1px;
    padding: 6px;
    color: white;
    font-size: 20px;
}
.panel-body {
    padding: 10px;
}
.block {
    margin: 20px 0 0;
}
.information {
    margin-top: 20px;
}
.information ul {
    padding: 0;
    margin: 0;
}
.information ul li {
    padding: 10px;
}
.information ul li:nth-child(odd) {
    background-color: #eee;
}
.information ul li span {
    display: inline-block;
    width: 120px;
}
.my-ads .item-box .date {
/* text-align: right; */
font-size: 13px;
color: #aaa;
font-weight: bold;
}
.item-box h3 a {
    color: blue;
}
.item-box .approve-status {
    position: absolute;
    top: 40px;
    left: 0;
    background-color: #b85a5a;
    color: #fff;
    padding: 3px 5px;
}
.item-box p {
    height: 44px;
    max-height: 44px;
}
.information .btn {
    margin-top: 10px;
}

/** End Profile Page */

/** Start newad Page */
.create-ad .row .img-thumbnail {
  margin-top: 28px;
  width: 300px
}
.create-ad .row .price-tag {
  margin-top: 30px;
}
.create-ad .labell {
    font-size: 16px;
    font-weight: bold;
}
.create-ad .form-group .add-item {
    font-size: 18px;
}

/** End Profile Page */

/** Start Show Item Page */

.item-info h2 {
    padding: 10px;
    margin: 0;
}
.item-info p {
    padding: 10px;
}
.item-info ul li {
padding: 10px;
}
.item-info ul li:nth-child(odd) {
    background-color: #e8e8e8;
}
.item-info ul li span {
    display: inline-block;
    width: 120px;
}
.list-unstyled a {
    color: blue;
}
.container .m-left {
    margin-left: 283px;
}
.add-comment h3 {
    margin: 0 0 10px;
}
.add-comment textarea {
    display: block;
    margin-bottom: 10px;
    width: 500px;
    height: 120px;
}
.container .x-img img {
    border-radius: 50%;
    max-width: 100px;
    display: block;
    margin: auto;
    margin-bottom: 10px;
}
.comment-box {
    margin-bottom: 20px;
}
.comment-box .lead {
    background-color: #c5abab5c;
    position: relative;
    padding: 10px;
}
.comment-box .lead:before {
    content: "";
    width: 0;
    height: 0;
    border-width: 15px;
    border-style: solid;
    border-color: transparent #c5abab5c transparent transparent;
    position: absolute;
    left: -28px;
    top: 10px;

}
/** End Show Item Page */

/** Start Our Custom */
.custom-hr {
    border-top: 1px solid #c9c9c9;
}
/** End Our Custom */
   </style>
</head>
<body>
<div class="upper-bar">
    <div class="container">
        <?php
        if(isset($_SESSION['user'])) {
            ?>
             <img class="my-image img-thumbnail img-circle" src="SeekPng.com_silhouette-person-png_1100707.png" alt="">
    <div class="btn-group my-info">
       
        <span class="btn dropdown-toggle" data-toggle="dropdown">
            <?php echo $sessionUser; ?>
            <span class="caret"></span>
        </span>
        <ul class="menu-one dropdown-menu">
            <li><a href="profile.php">My Profile</a></li>
            <li><a href="newad.php">New Item</a></li>
            <li><a href="profile.php#my-ads">My Items</a></li>
            <li><a href="logout.php">logout</a></li>
        </ul>
    </div>
<?php
        }
        else {?>
        <a  href="login.php">
            <span class='link-login'>Login/Singup</span>
        </a>
        <?php
        }
        ?>
    </div>
</div>
 <nav class="navbar navbar-expand-lg">
  <div class="container-fluid">
    <a class="navbar-brand">HomePage</a>
    <button class="icon navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span></span>
      <span></span>
      <span></span>
    </button>
<div class="collapse navbar-collapse justify-content-between" id="navbarSupportedContent"
    >
    <ul class="navbar-nav ml-auto mb-2  mb-lg-0">
    <?php
foreach(getCat() as $cat) {
      echo '<li class="nav-item">
      <a class="nav-link" href="categories.php?pageid='.$cat['id'].'">' . $cat['name'] . '</a>
      </li>';
} 
        ?>
      </ul>
    </div>
  </div>
</nav> 

