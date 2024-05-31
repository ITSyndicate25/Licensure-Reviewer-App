<?php   
  @$id = $_GET['id'];
  if($id == ''){
      header("Location: index.php");
      exit();
  }

  require_once 'index.php'; // Make sure this file is included correctly
  $exercise = new Exercise();
  $res = $exercise->single_exercise($id);
?> 

<form class="w-full max-w-lg mx-auto mt-8" action="controller.php?action=edit" method="POST"> 
    <div class="mb-8">
        <h1 class="text-3xl font-bold mb-4">Update Question</h1>
    </div>
    
    <div class="mb-6">
        <label class="block text-gray-700 text-sm font-bold mb-2" for="Lesson">Lesson:</label>
        <div class="relative">
            <input type="hidden" name="ExerciseID" value="<?php echo htmlspecialchars($res->ExerciseID); ?>"> 
            <select class="block appearance-none w-full bg-white border border-gray-300 hover:border-gray-400 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:border-gray-500" name="Lesson">
                <?php 
                    $sql = "SELECT * FROM `tbllesson` WHERE LessonID = " . intval($res->LessonID);
                    $mydb->setQuery($sql);
                    $cur = $mydb->loadResultList();
                    foreach ($cur as $lesson) {
                        echo '<option SELECTED value="'.htmlspecialchars($lesson->LessonID).'">'.htmlspecialchars($lesson->LessonTitle).'</option>';
                    }

                    $sql = "SELECT * FROM `tbllesson` WHERE LessonID != " . intval($res->LessonID);
                    $mydb->setQuery($sql);
                    $cur = $mydb->loadResultList();
                    foreach ($cur as $lesson) {
                        echo '<option value="'.htmlspecialchars($lesson->LessonID).'">'.htmlspecialchars($lesson->LessonTitle).'</option>';
                    }
                ?>
            </select>
            <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M10 12l-6-6h12z"/></svg>
            </div>
        </div>
    </div>
    
    <!-- Question Text Area -->
    <div class="mb-6">
        <label class="block text-gray-700 text-sm font-bold mb-2" for="Question">Question:</label>
        <textarea class="resize-none appearance-none block w-full bg-white border border-gray-300 hover:border-gray-400 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:border-gray-500" id="Question" name="Question" placeholder="Question Name" type="text"><?php echo htmlspecialchars($res->Question); ?></textarea>
    </div>

    <!-- Choices Input Fields -->
    <?php
        $choices = ['A', 'B', 'C', 'D'];
        foreach ($choices as $choice) {
            $choiceValue = 'Choice' . $choice;
            echo '<div class="mb-6">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="'.$choiceValue.'">'.$choice.':</label>
                    <input class="appearance-none block w-full bg-white border border-gray-300 hover:border-gray-400 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:border-gray-500" id="'.$choiceValue.'" name="'.$choiceValue.'" placeholder="" type="text" value="'.htmlspecialchars($res->$choiceValue).'" required>
                  </div>';
        }
    ?>

    <!-- Answer Input Field -->
    <div class="mb-6">
        <label class="block text-gray-700 text-sm font-bold mb-2" for="Answer">Answer:</label>
        <input class="appearance-none block w-full bg-white border border-gray-300 hover:border-gray-400 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:border-gray-500" id="Answer" name="Answer" placeholder="Answer" type="text" value="<?php echo htmlspecialchars($res->Answer); ?>" required>
    </div>

    <!-- Submit Button -->
    <div class="mb-6">
        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" name="save" type="submit"><span class="fa fa-save fw-fa"></span> Save</button>
    </div>
</form>
