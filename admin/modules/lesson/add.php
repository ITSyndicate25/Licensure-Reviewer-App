                      <?php 
                    if(!isset($_SESSION['USERID'])){
  redirect(web_root."admin/index.php");
}

                      // $autonum = New Autonumber();
                      // $res = $autonum->single_autonumber(2);

                       ?> 
 <form class="max-w-2xl mx-auto" action="controller.php?action=add" method="POST" enctype="multipart/form-data">
    <div class="mb-8">
        <h1 class="text-2xl font-bold">Upload New Lesson</h1>
    </div>

    <div class="mb-6">
        <label for="LessonChapter" class="block text-sm font-medium text-gray-700">Chapter:</label>
        <input id="LessonChapter" name="LessonChapter" type="text" placeholder="Chapter" class="mt-1 p-2 w-full border rounded-md">
    </div>

    <div class="mb-6">
        <label for="LessonTitle" class="block text-sm font-medium text-gray-700">Title:</label>
        <input id="LessonTitle" name="LessonTitle" type="text" placeholder="Title" class="mt-1 p-2 w-full border rounded-md">
    </div>

    <div class="mb-6">
        <label for="Category" class="block text-sm font-medium text-gray-700">Select File Type:</label>
        <select id="Category" name="Category" class="mt-1 p-2 w-full border rounded-md">
            <option>Docs</option>
            <option>Video</option>
        </select>
    </div>

    <div class="mb-6">
    <label for="file" class="block text-sm font-medium text-gray-700">Upload File:</label>
    <input type="file" name="file" class="mt-1 p-2 w-full border rounded-md" style="height: 50px;"/>
</div>


 <div class="mb-6">
        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" type="submit" name="save">
            <span class="fa fa-save mr-2"></span> Save
        </button>
    </div>
</form>
