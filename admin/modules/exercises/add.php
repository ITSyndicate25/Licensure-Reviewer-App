                      <?php 
                         if (!isset($_SESSION['USERID'])){
                              redirect(web_root."admin/index.php");
                             }

                      // $autonum = New Autonumber();
                      // $res = $autonum->single_autonumber(2);

                       ?> 
                    <form class="form-horizontal mx-auto max-w-md mt-8" action="controller.php?action=add" method="POST"> 
    <div class="mb-8">
        <h1 class="text-2xl font-bold">Add New Question</h1>
    </div>
    <div class="mb-4">
        <label for="Lesson" class="block text-sm font-medium">Lesson:</label>
        <select class="form-select mt-1 block w-full" name="Lesson">
            <?php 
            $sql = "SELECT * FROM `tbllesson`";
            $mydb->setQuery($sql);
            $cur = $mydb->loadResultList();
            foreach ($cur as $res) {
                echo '<option value='.$res->LessonID.'>'.$res->LessonTitle.'</option>';
            }
            ?>
        </select>
    </div> 
    <div class="mb-4">
        <label for="Question" class="block text-sm font-medium">Question:</label>
        <textarea class="form-textarea mt-1 block w-full" id="Question" name="Question" placeholder="Question Name" required></textarea>
    </div>
    <div class="mb-4">
        <label for="ChoiceA" class="block text-sm font-medium">A:</label>
        <input class="form-input mt-1 block w-full" id="ChoiceA" name="ChoiceA" type="text" required>
    </div>
    <div class="mb-4">
        <label for="ChoiceB" class="block text-sm font-medium">B:</label>
        <input class="form-input mt-1 block w-full" id="ChoiceB" name="ChoiceB" type="text" required>
    </div>
    <div class="mb-4">
        <label for="ChoiceC" class="block text-sm font-medium">C:</label>
        <input class="form-input mt-1 block w-full" id="ChoiceC" name="ChoiceC" type="text" required>
    </div>
    <div class="mb-4">
        <label for="ChoiceD" class="block text-sm font-medium">D:</label>
        <input class="form-input mt-1 block w-full" id="ChoiceD" name="ChoiceD" type="text" required>
    </div>
    <div class="mb-4">
        <label for="Answer" class="block text-sm font-medium">Answer:</label>
        <input class="form-input mt-1 block w-full" id="Answer" name="Answer" placeholder="Answer" type="text" required>
    </div>
    <div class="mb-4">
        <button class="bg-blue-500 text-white active:bg-blue-600 font-bold uppercase text-sm px-6 py-3 rounded shadow hover:shadow-lg" name="save" type="submit">
            <span class="fa fa-save fw-fa"></span> Save
        </button>
    </div>
</form>
