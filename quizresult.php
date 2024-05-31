<?php 
$studentid = $_SESSION['StudentID'];
if (isset($_GET['score'])) {
    echo '<h1 class="text-2xl font-bold">Your Score is : ' . $_GET['score'] . '</h1>';
}
?>

<div class="container mx-auto p-4">
    <h1 class="text-2xl font-bold mb-4">Question</h1>
    <h5 class="text-lg mb-4">Choose the correct answer.</h5>
    <div class="overflow-y-auto h-64 mb-4"> 
        <form class="space-y-4">
            <?php   
            $id = $_GET['id'];
            if ($id == '') {
                redirect("index.php");
            }
  
            $sql = "SELECT * FROM tblexercise WHERE LessonID = '{$id}'";
            $mydb->setQuery($sql);
            $cur = $mydb->loadResultList();

            foreach ($cur as $res) {
                $sql = "SELECT * FROM tblscore s, tblexercise e WHERE s.ExerciseID=e.ExerciseID AND e.ExerciseID='{$res->ExerciseID}' and StudentID='{$studentid}'";
                $mydb->setQuery($sql);
                $ans = $mydb->loadSingleResult();
            ?> 
            <div class="mb-4">
                <div class="font-semibold mb-2"><?php echo $res->Question; ?></div>
                <div class="flex flex-wrap gap-4">
                    <label class="flex items-center">
                        <input class="mr-2" type="radio" disabled <?php echo ($ans && $ans->Answer == $res->ChoiceA) ? 'checked' : ''; ?>> 
                        A. <?php echo $res->ChoiceA; ?>
                    </label>
                    <label class="flex items-center">
                        <input class="mr-2" type="radio" disabled <?php echo ($ans && $ans->Answer == $res->ChoiceB) ? 'checked' : ''; ?>> 
                        B. <?php echo $res->ChoiceB; ?>
                    </label>
                    <label class="flex items-center">
                        <input class="mr-2" type="radio" disabled <?php echo ($ans && $ans->Answer == $res->ChoiceC) ? 'checked' : ''; ?>> 
                        C. <?php echo $res->ChoiceC; ?>
                    </label>
                    <label class="flex items-center">
                        <input class="mr-2" type="radio" disabled <?php echo ($ans && $ans->Answer == $res->ChoiceD) ? 'checked' : ''; ?>> 
                        D. <?php echo $res->ChoiceD; ?>
                    </label>
                </div>
            </div>
            <?php } ?>
        </form>
    </div>
</div>
