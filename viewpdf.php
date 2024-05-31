<?php  
  @$id = $_GET['id'];
    if($id==''){
  redirect("index.php");
}
  $lesson = New Lesson();
  $res = $lesson->single_lesson($id);

?> 
<div class="container mx-auto mt-8">
    <h2 class="text-2xl font-bold mb-4">View PDF File</h2>
    <p class="text-lg font-semibold mb-4">Chapter: <?php echo $res->LessonChapter; ?> | Title: <?php echo $res->LessonTitle; ?></p>
    <div class="w-full h-96">
        <embed class="w-full h-full" src="<?php echo web_root.'admin/modules/lesson/'.$res->FileLocation; ?>" type="application/pdf">
    </div>
</div>
