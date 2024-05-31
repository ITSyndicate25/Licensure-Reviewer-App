<?php
$studentid = $_SESSION['StudentID'];
$id = $_GET['id'];
if ($id == '') {
    redirect("index.php");
}

$sql = "SELECT SUM(Score) as 'SCORE' FROM tblscore WHERE LessonID='{$id}' AND StudentID='{$studentid}' AND Submitted=1";
$mydb->setQuery($sql);
$row = $mydb->executeQuery(); 
$ans = $mydb->loadSingleResult();
$score = $ans->SCORE;

if ($score != null) {
    redirect("index.php?q=quizresult&id={$id}&score={$score}");
}
?>

<div class="container mx-auto p-4">
    <h1 class="text-2xl font-bold mb-4">Question</h1>
    <h5 class="text-lg mb-4">Choose the correct answer.</h5>
    <div class="overflow-y-auto h-64 mb-4"> 
        <form action="processscore.php" method="POST" class="space-y-4">
            <?php   
            $sql = "SELECT * FROM tblexercise WHERE LessonID = '{$id}'";
            $mydb->setQuery($sql);
            $cur = $mydb->loadResultList();

            foreach ($cur as $res) { 
            ?> 
            <div class="mb-4">
                <div class="font-semibold mb-2"><?php echo $res->Question; ?></div>
                <div class="flex flex-wrap gap-4">
                    <label class="flex items-center">
                        <input class="mr-2" type="radio" id="ChoiceA" data-id="<?php echo $res->ExerciseID; ?>" name="choices[<?php echo $res->ExerciseID; ?>]" value="<?php echo $res->ChoiceA; ?>"> 
                        A. <?php echo $res->ChoiceA; ?>
                    </label>
                    <label class="flex items-center">
                        <input class="mr-2" type="radio" id="ChoiceB" data-id="<?php echo $res->ExerciseID; ?>" name="choices[<?php echo $res->ExerciseID; ?>]" value="<?php echo $res->ChoiceB; ?>"> 
                        B. <?php echo $res->ChoiceB; ?>
                    </label>
                    <label class="flex items-center">
                        <input class="mr-2" type="radio" id="ChoiceC" data-id="<?php echo $res->ExerciseID; ?>" name="choices[<?php echo $res->ExerciseID; ?>]" value="<?php echo $res->ChoiceC; ?>"> 
                        C. <?php echo $res->ChoiceC; ?>
                    </label>
                    <label class="flex items-center">
                        <input class="mr-2" type="radio" id="ChoiceD" data-id="<?php echo $res->ExerciseID; ?>" name="choices[<?php echo $res->ExerciseID; ?>]" value="<?php echo $res->ChoiceD; ?>"> 
                        D. <?php echo $res->ChoiceD; ?>
                    </label>
                </div>
            </div>
            <?php } ?>
            <input type="hidden" name="LessonID" value="<?php echo $id; ?>">
            <div class="text-right">
                <button class="btn btn-md btn-primary bg-blue-500 text-white px-4 py-2 rounded" type="submit" name="btnSubmit">Submit  <i class="fa fa-arrow-right"></i></button>
            </div>
        </form>
    </div>
</div>
