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
 
 <form class="form-horizontal mx-auto max-w-md" action="controller.php?action=updatefiles" method="POST" enctype="multipart/form-data">
    <div class="mb-4">
        <h1 class="text-2xl font-bold">Update Files</h1>
    </div>

    <div class="mb-4">
        <label for="LessonChapter" class="block text-sm font-medium">Chapter:</label>
        <input type="hidden" name="LessonID" value="<?php echo $res->LessonID; ?>">
        <label class="block text-sm"><?php echo $res->LessonChapter; ?></label>
    </div>

    <div class="mb-4">
        <label for="LessonTitle" class="block text-sm font-medium">Title:</label>
        <input type="hidden" name="deptid" value="">
        <label class="block text-sm"><?php echo $res->LessonTitle; ?></label>
    </div>

    <div class="mb-4">
        <label for="Category" class="block text-sm font-medium">File Type:</label>
        <input type="hidden" name="deptid" value="">
        <label class="block text-sm"><?php echo $res->Category; ?></label>
    </div>

    <div class="mb-4">
        <label for="file" class="block text-sm font-medium">Upload File:</label>
        <input type="file" name="file" value="<?php echo $res->FileLocation; ?>" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
    </div>

    <div class="mb-4">
        <button class="bg-blue-500 text-white active:bg-blue-600 font-bold uppercase text-sm px-6 py-3 rounded shadow hover:shadow-lg outline-none focus:outline-none mr-1 mb-1" name="save" type="submit">
            <span class="fa fa-save fw-fa"></span> Save
        </button>
    </div>
</form>

 