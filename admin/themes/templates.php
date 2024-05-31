 <!DOCTYPE html>
<html lang="en">
<head>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>E-Learning System</title>
        <link type="text/css" href="<?php echo web_root; ?>e_admin/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link type="text/css" href="<?php echo web_root; ?>e_admin/bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
        <link type="text/css" href="<?php echo web_root; ?>e_admin/css/theme.css" rel="stylesheet">
        <link type="text/css" href="<?php echo web_root; ?>e_admin/images/icons/css/font-awesome.css" rel="stylesheet">
        <link type="text/css" href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600'
            rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.8.2/css/lightbox.min.css">
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">

    <script src="https://cdn.tailwindcss.com"></script>
    <script
  type="text/javascript"
  src="../node_modules/tw-elements/dist/js/tw-elements.umd.min.js"></script>

    <style>
    .drawer-open {
      width: 16rem; /* 64 * 0.25rem */
    }
    .drawer-closed {
      width: 4rem; /* Only icons are visible */
    }
  </style>
    </head>
    <body>
    <div class="bg-sky-950 text-white relative top-0 w-full z-10">
  <div class="container flex  justify-between p-4 " >
    <div class="flex m-auto items-center justify-center "> <!-- Added justify-center and lg:justify-start -->
    
      <p class="text-lg font-semibold">LicenseBoostHub (Admin)</p>
     
    </div>

    <div class="flex items-center space-x-4">
      
    
    </div>
  </div>
</div>

<script>
  document.querySelectorAll('.relative button').forEach(button => {
    button.addEventListener('click', () => {
      const dropdown = button.nextElementSibling;
      dropdown.classList.toggle('hidden');
    });
  });

  window.addEventListener('click', (e) => {
    if (!e.target.closest('.relative')) {
      document.querySelectorAll('.relative ul').forEach(dropdown => {
        dropdown.classList.add('hidden');
      });
    }
  });
</script>
 
        <!-- /navbar -->
        <div class="flex">
  <div id="sidebar" class="bg-gray-800 text-white absolute h-screen transition-all duration-300 drawer-closed">
    <div class="flex justify-end p-2">
      <button onclick="toggleDrawer()" class="text-white focus:outline-none">
        <i class="menu-icon icon-chevron-right"></i>
      </button>
    </div>
    <ul class="space-y-2 py-4">
    <a href="<?php echo web_root; ?>/admin"><li class="flex items-center p-3 hover:bg-gray-600 rounded-lg">
        <i class="menu-icon icon-dashboard mr-3"></i>
        <span class="drawer-text hidden">Dashboard</span>
      </li></a>
      <a href="<?php echo web_root; ?>admin/modules/lesson/index.php"> <li class="flex items-center p-3 hover:bg-gray-600 rounded-lg">
        <i class="menu-icon icon-book mr-3"></i>
       <span class="drawer-text hidden">Lesson</span>
      </li></a>
      <a href="<?php echo web_root; ?>admin/modules/exercises/index.php"><li class="flex items-center p-3 hover:bg-gray-600 rounded-lg">
        <i class="menu-icon icon-pencil mr-3"></i>
        <span class="drawer-text hidden">Exercises</span>
      </li></a>
    </ul>

    <ul class="space-y-2 py-4">
    <a href="<?php echo web_root; ?>admin/modules/galery/index.php"><li class="flex items-center p-3 hover:bg-gray-600 rounded-lg">
        <i class="menu-icon icon-film mr-3"></i>
        <span class="drawer-text hidden">Gallery</span>
      </li></a>
      <a href="<?php echo web_root; ?>admin/modules/modstudent/index.php"><li class="flex items-center p-3 hover:bg-gray-600 rounded-lg">
        <i class="menu-icon  icon-user  mr-3"></i>
        <span class="drawer-text hidden">Manage Students</span>
      </li></a>
      <a href="<?php echo web_root; ?>admin/modules/user/index.php"><li class="flex items-center p-3 hover:bg-gray-600 rounded-lg">
        <i class="menu-icon icon-user mr-3"></i>
        <span class="drawer-text hidden">Manage Users</span>
      </li></a>
    </ul>

   
  </div>

  <div class="flex-1 ml-16 transition-all duration-300">
    <div class="p-6">
      <div class="module bg-white rounded-lg shadow-md p-6">
        <?php check_message(); ?>
        <?php require_once $content; ?>
      </div>
    </div>
  </div>
</div>
 
        <script src="<?php echo web_root; ?>e_admin/scripts/jquery-1.9.1.min.js" type="text/javascript"></script>
        <script src="<?php echo web_root; ?>e_admin/scripts/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>
        <script src="<?php echo web_root; ?>e_admin/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="<?php echo web_root; ?>e_admin/scripts/flot/jquery.flot.js" type="text/javascript"></script>
        <script src="<?php echo web_root; ?>e_admin/scripts/flot/jquery.flot.resize.js" type="text/javascript"></script>
        <script src="<?php echo web_root; ?>e_admin/scripts/datatables/jquery.dataTables.js" type="text/javascript"></script>
        <script src="<?php echo web_root; ?>e_admin/scripts/common.js" type="text/javascript"></script> 
        <script src="<?php echo web_root; ?>e_admin/scripts/datatables/jquery.dataTables.js"></script>
       <script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.8.2/js/lightbox.min.js"></script> 
    </body> 
</html>

<script>
  function toggleDrawer() {
    const sidebar = document.getElementById('sidebar');
    const drawerText = sidebar.querySelectorAll('.drawer-text');
    sidebar.classList.toggle('drawer-open');
    sidebar.classList.toggle('drawer-closed');
    drawerText.forEach(text => text.classList.toggle('hidden'));
  }
</script>
 

 <script>
        $(document).ready(function() {
            $('.datatable-1').dataTable();
            $('.dataTables_paginate').addClass("btn-group datatable-pagination");
            $('.dataTables_paginate > a').wrapInner('<span />');
            $('.dataTables_paginate > a:first-child').append('<i class="icon-chevron-left shaded"></i>');
            $('.dataTables_paginate > a:last-child').append('<i class="icon-chevron-right shaded"></i>');
        } ); 
    </script>