<?php  
   // if (!isset($_SESSION['TYPE'])=='Administrator'){
   //    redirect(web_root."index.php");
   //   }

  @$user_id = $_GET['id'];
    if($user_id==''){
  redirect("index.php");
}
  $user = New User();
  $singleuser = $user->single_user($user_id);

?> 

<form class="form-horizontal mx-auto max-w-md mt-8" action="controller.php?action=edit" method="POST">
    <div class="mb-8">
        <h1 class="text-2xl font-bold">Update User</h1>
    </div>
    <div class="mb-4">
        <label for="user_name" class="block text-sm font-medium">Name:</label>
        <input class="form-input mt-1 block w-full" id="user_name" name="user_name" placeholder="Account Name" type="text" value="<?php echo $singleuser->NAME; ?>">
    </div>
    <div class="mb-4">
        <label for="user_email" class="block text-sm font-medium">Username:</label>
        <input class="form-input mt-1 block w-full" id="user_email" name="user_email" placeholder="Username" type="text" value="<?php echo $singleuser->UEMAIL; ?>">
    </div>
    <div class="mb-4">
        <label for="user_pass" class="block text-sm font-medium">Password:</label>
        <input class="form-input mt-1 block w-full" id="user_pass" name="user_pass" placeholder="Account Password" type="password" value="">
    </div>
    <div class="mb-4">
        <label for="retype_user_pass" class="block text-sm font-medium">Retype Password:</label>
        <input class="form-input mt-1 block w-full" id="retype_user_pass" name="retype_user_pass" placeholder="Retype Password" type="password" value="">
    </div>
    <div class="mb-4">
        <button class="btn btn_kcctc bg-blue-500 text-white active:bg-blue-600 font-bold uppercase text-sm px-6 py-3 rounded shadow hover:shadow-lg mr-4" id="usersave" name="save" type="submit">Save</button>
        <a href="index.php" class="btn btn_kcctc bg-gray-300 text-gray-700 active:bg-gray-400 font-bold uppercase text-sm px-6 py-3 rounded shadow hover:shadow-lg"><span class="glyphicon glyphicon-arrow-left"></span>&nbsp;<strong>List of Users</strong></a>
    </div>
</form>

 