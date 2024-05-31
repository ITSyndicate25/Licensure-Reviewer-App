<?php  
    if(!isset($_SESSION['USERID'])){
  redirect(web_root."admin/index.php");
}

  @$id = $_GET['id'];
    if($id==''){
  redirect("index.php");
}
  $lesson = New Lesson();
  $res = $lesson->single_lesson($id);

?> 
 
 <form class="form-horizontal mx-auto max-w-md" action="controller.php?action=edit" method="POST" enctype="multipart/form-data">
    <div class="mb-4">
        <h1 class="text-2xl font-bold">Update Lesson</h1>
    </div>

    <div class="mb-4">
        <label for="LessonChapter" class="block text-sm font-medium">Chapter:</label>
        <input type="hidden" name="LessonID" value="<?php echo $res->LessonID; ?>">
        <input id="LessonChapter" name="LessonChapter" type="text" placeholder="Chapter" value="<?php echo $res->LessonChapter; ?>" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
    </div>

    <div class="mb-4">
        <label for="LessonTitle" class="block text-sm font-medium">Title:</label>
        <input type="hidden" name="deptid" value="">
        <input id="LessonTitle" name="LessonTitle" type="text" placeholder="Title" value="<?php echo $res->LessonTitle; ?>" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
    </div>

    <div class="mb-4">
        <label for="Category" class="block text-sm font-medium">Select File Type:</label>
        <input type="hidden" name="deptid" value="">
        <select id="Category" name="Category" class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
            <option <?php echo ($res->Category == "Docs") ? "selected" : "" ?>>Docs</option>
            <option <?php echo ($res->Category == "Video") ? "selected" : "" ?>>Video</option>
        </select>
    </div>

    <div class="mb-4">
        <button class="bg-blue-500 text-white active:bg-blue-600 font-bold uppercase text-sm px-6 py-3 rounded shadow hover:shadow-lg outline-none focus:outline-none mr-1 mb-1" type="submit" name="save">
            <span class="fa fa-save fw-fa"></span> Save
        </button>
    </div>
</form>
