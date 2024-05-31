<?php
require_once ("../../../include/initialize.php");
if (!isset($_SESSION['USERID'])){
    redirect(web_root."admin/index.php");
}

$action = isset($_GET['action']) ? $_GET['action'] : '';

switch ($action) {
    case 'add':
        doInsert();
        break;
    
    case 'edit':
        doEdit();
        break;
    
    case 'delete':
        doDelete();
        break;
}

function doInsert(){
    global $mydb;
    if(isset($_POST['save'])){
        $autonum = new Autonumber();
        $resauto = $autonum->set_autonumber('ExerciseID');
        $ExerciseID  = date('Y').$resauto->AUTO;

        $exercise = new Exercise();  
        $exercise->ExerciseID = $ExerciseID; 
        $exercise->LessonID = intval($_POST['Lesson']); 
        $exercise->Question = $mydb->escapeString($_POST['Question']); 
        $exercise->Answer = $mydb->escapeString($_POST['Answer']);
        $exercise->ChoiceA = $mydb->escapeString($_POST['ChoiceA']);
        $exercise->ChoiceB = $mydb->escapeString($_POST['ChoiceB']); 
        $exercise->ChoiceC = $mydb->escapeString($_POST['ChoiceC']); 
        $exercise->ChoiceD = $mydb->escapeString($_POST['ChoiceD']); 
        $exercise->create(); 

        $sql = "SELECT * FROM tblstudent";
        $mydb->setQuery($sql);
        $cur = $mydb->loadResultList();
        foreach ($cur as $result) { 
            $sql = "INSERT INTO tblstudentquestion 
                    (ExerciseID, LessonID, StudentID, Question, CA, CB, CC, CD, QA) 
                    VALUES 
                    ('".$ExerciseID."', '".intval($_POST['Lesson'])."', '".$result->StudentID."', '".$mydb->escapeString($_POST['Question'])."', '".$mydb->escapeString($_POST['ChoiceA'])."', '".$mydb->escapeString($_POST['ChoiceB'])."', '".$mydb->escapeString($_POST['ChoiceC'])."', '".$mydb->escapeString($_POST['ChoiceD'])."', '".$mydb->escapeString($_POST['Answer'])."')";
            $mydb->setQuery($sql);
            $mydb->executeQuery();
        }

        $autonum->auto_update('ExerciseID');

        message("New Question created successfully!", "success");
        redirect("index.php");
    }
}

function doEdit(){
    global $mydb;
    if(isset($_POST['save'])){
        $id = intval($_POST['ExerciseID']); // Ensuring the ID is an integer for safety

        $lesson = intval($_POST['Lesson']); // Ensuring the Lesson ID is an integer for safety
        $question = $mydb->escapeString($_POST['Question']);
        $answer = $mydb->escapeString($_POST['Answer']);
        $choiceA = $mydb->escapeString($_POST['ChoiceA']);
        $choiceB = $mydb->escapeString($_POST['ChoiceB']);
        $choiceC = $mydb->escapeString($_POST['ChoiceC']);
        $choiceD = $mydb->escapeString($_POST['ChoiceD']);

        // Updating the exercise details
        $exercise = new Exercise();   
        $exercise->LessonID = $lesson; 
        $exercise->Question = $question; 
        $exercise->Answer = $answer;
        $exercise->ChoiceA = $choiceA;
        $exercise->ChoiceB = $choiceB; 
        $exercise->ChoiceC = $choiceC; 
        $exercise->ChoiceD = $choiceD; 
        $exercise->update($id); 

        // Updating the student questions related to this exercise
        $sql = "UPDATE tblstudentquestion SET 
                LessonID = '$lesson', 
                Question = '$question', 
                CA = '$choiceA', 
                CB = '$choiceB', 
                CC = '$choiceC', 
                CD = '$choiceD', 
                QA = '$answer' 
                WHERE ExerciseID = '$id'";

        $mydb->setQuery($sql);
        if ($mydb->executeQuery()) {
            message("Question has been updated!", "success");
        } else {
            message("Error updating question: " . $mydb->escapeString($mydb->conn->error), "error");
        }
        
        redirect("index.php");
    }
}

function doDelete(){
    global $mydb;
    $id = intval($_GET['id']); // Ensuring the ID is an integer for safety

    $exercise = new Exercise();
    $exercise->delete($id);

    $sql = "DELETE FROM tblstudentquestion WHERE ExerciseID = '$id'";
    $mydb->setQuery($sql);
    $mydb->executeQuery();
    
    message("Question already Deleted!","info");
    redirect('index.php');
}
?>
