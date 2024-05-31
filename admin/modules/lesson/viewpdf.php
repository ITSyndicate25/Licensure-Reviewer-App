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
<h2 class="text-xl font-bold"><?php echo $title; ?></h2>
<p class="text-lg font-semibold">Chapter: <?php echo $res->LessonChapter; ?> | Title: <?php echo $res->LessonTitle; ?></p>
<div class="container mx-auto">
    <embed src="<?php echo web_root.'admin/modules/lesson/'.$res->FileLocation; ?>" type="application/pdf" class="w-full h-96" />
</div>
