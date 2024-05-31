<?php
require_once("../include/initialize.php");

 ?>
  <?php
 // login confirmation
  if(isset($_SESSION['USERID'])){
    redirect(web_root."admin/index.php");
  }
  ?>
 <!DOCTYPE html>
<html lang="en">
<head>
  <title>Login V14</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->  


<link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="icon" type="image/png" href="<?php echo web_root;?>plugins/adminlogin/images/icons/favicon.ico" />
</head>
<body>
  
<div class="max-w-md w-full space-y-8 m-auto mt-20">
    <div>
        <h2 class="mt-6 text-center text-3xl font-extrabold text-gray-900">Admin Account Login</h2>
    </div>
    <form class="mt-8 space-y-6" method="POST" action="login.php">
        <div class="rounded-md shadow-sm space-y-3">
            <div>
                <label for="user_email" class="block text-sm font-medium text-gray-700">Username</label>
                <input id="user_email" name="user_email" type="text" required
                    class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
            </div>
            <div>
                <label for="user_pass" class="block text-sm font-medium text-gray-700">Password</label>
                <input id="user_pass" name="user_pass" type="password" required
                    class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
            </div>
        </div>

        <div class="flex items-center justify-between">
            <div class="flex items-center">
                <input id="remember-me" name="remember-me" type="checkbox"
                    class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded">
                <label for="remember-me" class="ml-2 block text-sm text-gray-900">Remember me</label>
            </div>

            <div class="text-sm">
                <a href="#" class="font-medium text-indigo-600 hover:text-indigo-500">Forgot your password?</a>
            </div>
        </div>

        <div>
            <button type="submit" name="btnLogin"
                class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                Login
            </button>
        </div>

      
    </form>  <!-- Additional button for "Login as a user" -->
        <div>
            <a href ="../login.php" ><button type="submit" name="btnLoginUser"
                class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-gray-600 hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500 mt-3">
                Login as a Student
            </button></a>
        </div>
</div>

  

  <div id="dropDownSelect1"></div>
  
<!--===============================================================================================-->
  <script src="<?php echo web_root;?>plugins/adminlogin/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
  <script src="<?php echo web_root;?>plugins/adminlogin/vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
  <script src="<?php echo web_root;?>plugins/adminlogin/vendor/bootstrap/js/popper.js"></script>
  <script src="<?php echo web_root;?>plugins/adminlogin/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
  <script src="<?php echo web_root;?>plugins/adminlogin/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
  <script src="<?php echo web_root;?>plugins/adminlogin/vendor/daterangepicker/moment.min.js"></script>
  <script src="<?php echo web_root;?>plugins/adminlogin/vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
  <script src="<?php echo web_root;?>plugins/adminlogin/vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
  <script src="<?php echo web_root;?>plugins/adminlogin/js/main.js"></script>

</body>
</html>
 
<?php

if(isset($_POST['btnLogin'])){
  $email = trim($_POST['user_email']);
  $upass  = trim($_POST['user_pass']);
  $h_upass = sha1($upass);

   if ($email == '' OR $upass == '') {

      message("Invalid Username and Password!", "error");
      redirect("login.php");

    } else {
  //it creates a new objects of member
    $user = new User();
    //make use of the static function, and we passed to parameters
    $res = $user::userAuthentication($email, $h_upass);
    if ($res==true) {
       message("You login as ".$_SESSION['TYPE'].".","success");
      if ($_SESSION['TYPE']=='Administrator'){
         redirect(web_root."admin/index.php");
      }else{
           redirect(web_root."admin/login.php");
      }
    }else{
      message("Account does not exist! Please contact Administrator.", "error");
       redirect(web_root."admin/login.php");
    }
 }
 }
 ?> 