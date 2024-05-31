<?php
require_once("include/initialize.php");  

$score = 0;
$studentid = $_SESSION['StudentID'];
$lessonid = $_POST['LessonID'];

// Mark the lesson as submitted
$sql = "UPDATE tblscore SET Submitted = 1 WHERE LessonID='{$lessonid}' AND StudentID='{$studentid}'";
$mydb->setQuery($sql);
$mydb->executeQuery();

// Retrieve all questions for the lesson
$sql = "SELECT * FROM tblexercise WHERE LessonID = '{$lessonid}'";
$mydb->setQuery($sql);
$questions = $mydb->loadResultList();

// Debug: Print the questions to verify the structure
//print_r($questions);

foreach ($questions as $question) {
    // Check if the Answer property exists
    if (isset($question->Answer)) {
        if (isset($_POST['choices'][$question->ExerciseID]) && $_POST['choices'][$question->ExerciseID] == $question->Answer) {
            $score++;
        }
    } else {
        // Debug: Print a warning if Answer is missing
        //echo "Warning: Answer property is missing for ExerciseID {$question->ExerciseID}";
    }
}

// Insert or update the score in the database
$sql = "INSERT INTO tblscore (StudentID, LessonID, Score, Submitted) VALUES ('{$studentid}', '{$lessonid}', '{$score}', 1) 
        ON DUPLICATE KEY UPDATE Score='{$score}', Submitted=1";
$mydb->setQuery($sql);
$mydb->executeQuery();

// Display a success message and redirect to the quiz result page
message("Exercises already submitted.", "success");
redirect("index.php?q=quizresult&id={$lessonid}&score={$score}");
?>
