<?php 
require_once ("include/initialize.php");   
if (isset($_SESSION['StudentID'])) {
  # code...
  redirect('index.php');
}
?> 
  

<style type="text/css">
  body {
    background-color: #fff;
  }
</style>

 <!DOCTYPE html>
<html lang="en">
<head>
  <title>Login</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->  
<link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
</head>
<!--===============================================================================================-->
</head>
<body>
  
<div class="min-h-screen flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-md w-full space-y-8">
        <?php check_message(); ?>
        <div>
            <img class="mx-auto h-12 w-auto" src="<?php echo web_root; ?>images/iconapp.png" alt="icon">
            <h2 class="mt-6 text-center text-3xl font-extrabold text-gray-900">
                Student Login
            </h2>
        </div>
        <form class="mt-8 space-y-6" action="" method="POST">
            <input type="hidden" name="remember" value="true">
            <div class="rounded-md shadow-sm -space-y-px">
                <div>
                    <label for="user_email" class="sr-only">Username</label>
                    <input id="user_email" name="user_email" type="text" autocomplete="email" required
                        class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md focus:outline-none focus:ring-blue-500 focus:border-blue-500 focus:z-10 sm:text-sm"
                        placeholder="Username">
                </div>
                <div>
                    <label for="user_pass" class="sr-only">Password</label>
                    <input id="user_pass" name="user_pass" type="password" autocomplete="current-password"
                        required
                        class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-b-md focus:outline-none focus:ring-blue-500 focus:border-blue-500 focus:z-10 sm:text-sm"
                        placeholder="Password">
                </div>
            </div>

            <div>
                <button type="submit"
                    class="group relative w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500" name="btnLogin">
                    <span class="absolute left-0 inset-y-0 flex items-center pl-3">
                        <svg class="h-5 w-5 text-blue-500 group-hover:text-blue-400" xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                            <path fill-rule="evenodd"
                                d="M10 18a8 8 0 100-16 8 8 0 000 16zm-2.293-5.293a1 1 0 011.414-1.414L10 13.586l1.879-1.879a1 1 0 111.414 1.414l-2.5 2.5a1 1 0 01-1.414 0l-2.5-2.5a1 1 0 111.414-1.414L10 13.586l-1.293-1.293a1 1 0 111.414-1.414l1.293 1.293 2.293-2.293a1 1 0 111.414 1.414L11.414 15.5a1 1 0 01-1.414 0l-2.5-2.5a1 1 0 010-1.414z"
                                clip-rule="evenodd" />
                        </svg>
                    </span>
                    Login
                </button>
            </div>

            <!-- Admin Login Button -->
            <div class="hidden md:block">
    <a href="admin/login.php"
        class="group relative w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-gray-600 hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500">
        <span class="absolute left-0 inset-y-0 flex items-center pl-3">
            <svg class="h-5 w-5 text-gray-500 group-hover:text-gray-400" xmlns="http://www.w3.org/2000/svg"
                viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                <path fill-rule="evenodd"
                    d="M10 18a8 8 0 100-16 8 8 0 000 16zm-2.293-5.293a1 1 0 011.414-1.414L10 13.586l1.879-1.879a1 1 0 111.414 1.414l-2.5 2.5a1 1 0 01-1.414 0l-2.5-2.5a1 1 0 111.414-1.414L10 13.586l-1.293-1.293a1 1 0 111.414-1.414l1.293 1.293 2.293-2.293a1 1 0 111.414 1.414L11.414 15.5a1 1 0 01-1.414 0l-2.5-2.5a1 1 0 010-1.414z"
                    clip-rule="evenodd" />
            </svg>
        </span>
        Login as Admin
    </a>
</div>

            <div class="text-sm text-center">
                <p class="font-medium text-gray-900">Don't have an account? <a href="register.php"
                        class="text-blue-600 hover:text-blue-500">Create your Account</a></p>
            </div>
        </form>
    </div>
</div>

  
  

<?php 

if(isset($_POST['btnLogin'])){
  $email = trim($_POST['user_email']);
  $upass  = trim($_POST['user_pass']);
  $h_upass = sha1($upass);
  
   if ($email == '' OR $upass == '') {

      message("Invalid Username and Password!", "error");
      redirect (web_root."login.php");
         
    } else {  
      //it creates a new objects of member
        $student = new Student();
        //make use of the static function, and we passed to parameters
        $res = $student::studentAuthentication($email, $h_upass);
        if ($res==true) {  
             redirect(web_root."index.php"); 

          echo $_SESSION['StudentID'];
        }else{
          message("Account does not exist! Please contact Administrator.", "error");
          redirect (web_root."login.php");
        }
   }
 } 
 ?> 

<script type="text/javascript" language="javascript" src="<?php echo web_root; ?>js/jquery.js"></script>
<script src="<?php echo web_root; ?>js/bootstrap.min.js"></script> 
<!--===============================================================================================-->
  <script src="<?php echo web_root; ?>vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
  <script src="<?php echo web_root; ?>vendor/tilt/tilt.jquery.min.js"></script>
  <script >
    $('.js-tilt').tilt({
      scale: 1.1
    })
  </script>
<!--===============================================================================================-->
  <script src="js/main.js"></script>

</body>
</html>