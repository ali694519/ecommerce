<?php
ob_start();
session_start();
$pageTtile = 'Login';
if(isset($_SESSION['user'])) {
    header('Location: index.php');
}
 include "init.php";
 // Check If User Coming From HTTP Post Request
if($_SERVER['REQUEST_METHOD'] == 'POST')
{
    if(isset($_POST['login'])) {
    $user = $_POST['username'];
    $pass = $_POST['password'];
    $hashedpass = sha1($pass);

  
    // Check If The User Exist In Database
    $stmt = $connect->prepare("SELECT userid , username , password 
       FROM userss
       WHERE username = ?
       AND password = ?"
       );
       $stmt->execute(array($user,$hashedpass));
       $get = $stmt->fetch();
       $count = $stmt->rowCount();
    // If Count > 0 This Mean The Dtabase Contain Record About This Username

    if($count > 0) {
       $_SESSION['user'] = $user; // Register Session Name
       $_SESSION['uid'] = $get['userid']; // Register Session userid
       header('location:index.php'); // Redirect To Dashboard Page
       exit();
    }
} // end if(isset($_POST['login']))

    else {
        $formErrors = array();
        
        $username   =$_POST['username'];
        $password   =$_POST['password'];
        $password2  =$_POST['password2'];
        $email      =$_POST['email'];

        if(isset($username)) {
            $filterUser = filter_var($username,FILTER_UNSAFE_RAW);
            if(strlen($filterUser) < 4) {
                $formErrors[] = 'Username Must Be Larger Than 4 Characters';
            }
        }

        if(isset($password) && isset($password2) ) {
            if(empty($password)) {
                $formErrors[] = "Sorry Password Cant be Empty";
            }
           if(sha1($password) !== sha1($password2)) {
               $formErrors[] = 'Sorry Password Is Not Match';
           }
        }

        if(isset($email)) {
            $filterEmail = filter_var($email,FILTER_SANITIZE_EMAIL);
            if(filter_var($filterEmail, FILTER_VALIDATE_EMAIL) != true) {
                $formErrors[] = "This Email Is Not Valid";
            }
         }

  // If There's No Error Proced The Uses Add
  if(empty($formErrors)) {
    //Check If User Exist In Dtabase
    $check =  checkItem("username","userss",$username);
    if($check == 1) {
        $formErrors[] = "Sorry This User Is Exist";
    }else {
    // Insert User Info In DastaBase
$stmt = $connect->prepare("INSERT INTO userss(username,password,email,regstatus,Daatee)
values(:zuser,:zpass,:zmail,0,now())");

$stmt->execute(array(
"zuser" =>  $username ,
"zpass" => sha1($password),
"zmail" => $email,
));
    //echo Success Message
    $scuccesMsg = "Congrates You Are Now Registerd User";
}
    }
    }//end else isset(signup)
}

?>
<div class="container login-page">
    <h1 class="text-center"><span class=" selected" data-class="login">Login</span> | <span data-class="signup">signup</span></h1>
    <!-- Start Login Form -->
<form action="<?php echo $_SERVER['PHP_SELF'].'' ?>" method="POST" class="login " >
    <div class="input-container">
        <input class="form-control" type="text" name="username" autocomplete="off"
        placeholder="Type Your username" required >
    </div>

    <div class="input-container">
        <input class="form-control" type="password" name="password" autocomplete="new-password"
         placeholder="Type a Complex password" required>
    </div>

    <input type="submit" name="login" class="btn btn-primary btn-block" value="login">
    <!-- End Login Form -->


    <!-- Start Signup Form -->
</form>

<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST" class="signup">
    <div class="input-container">
        <input class="form-control" type="text" name="username" autocomplete="off"
        placeholder="Type Your username" pattern=".{4,}" title="Username Must Be 4 Chars" required>
    </div>

    <div class="input-container">
        <input class="form-control" minlength="4" type="password" name="password" autocomplete="new-password"  required
        placeholder="Type Your password">
    </div>

    <div class="input-container">
    <input class="form-control" minlength="4" type="password" name="password2" autocomplete="new-password" required
        placeholder="Type a password agin">
    </div>

    <div class="input-container">
        <input class="form-control" type="email" name="email"
            placeholder="Type a Valid email" required>
    </div>
<input type="submit" name="signup" class="btn btn-success btn-block" value="Signup">
</form>
    <!-- End Signup Form -->
    <div class="the-errors text-center">
    <?php
        if(!empty($formErrors)) {
            foreach($formErrors as $errors) {
                echo"<div class='msg error'>".$errors."</div>";
            }
        }
        if(isset($scuccesMsg)) {
            echo "<div class='msg success'>".$scuccesMsg."</div>";
        }
    ?>
    </div>
</div>
<?php include $tpl."footer.php";
ob_end_flush();
?>
