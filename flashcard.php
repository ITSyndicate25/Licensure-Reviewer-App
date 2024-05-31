<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Flash Card Quiz App</title>

    <!-- Tailwind CSS -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@500&display=swap');

        
    </style>
</head>
<body>
    
<div class="main mx-auto p-4">
    <div class="title-container flex items-center justify-between">
        <h3 class="text-lg md:text-xl">Flash Card Quiz App</h3>
        
        <button class="btn btn-sm px-4 py-2 text-xs text-white bg-sky-700 rounded hover:bg-sky-950 flex items-center justify-center hover:text-white" onclick="showAddFlashcardModal()">Add Flashcard</button>


        <!-- Add Flashcard Modal -->
       <div class="modal fixed top-0 left-0 w-full h-full flex items-center justify-center hidden" id="addFlashcardModal">
       <div class="modal-overlay absolute w-full h-full bg-transparent"></div>

    <div class="modal-container bg-white w-11/12 md:max-w-md mx-auto rounded shadow-lg z-50 overflow-y-auto">
        <div class="modal-content py-4 text-left px-6">
                    <!--Title-->
                    <div class="flex justify-between items-center pb-3">
                        <p class="text-2xl font-bold">Add Flashcard</p>
                        <div class="modal-close cursor-pointer z-50" data-dismiss="modal">
                            <button type="button" class="modal-close cursor-pointer z-50" onclick="closeAddFlashcardModal()">
                            <svg class="fill-current text-black" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18">
                                <path d="M6.59 6l5 5 1.41-1.41L8.41 6l5-5-1.41-1.41L7.17 4.59 6 3.41 4.59 2 3.17 3.41 4.59 4.83 3.17 6 2 7.17l1.41 1.41L6 8.83l-1.41 1.41L3.17 9.41 2 10.59l1.41 1.41L6 11.17l1.41 1.41 1.42-1.42 1.41 1.42 1.42-1.42L11.17 9l1.42-1.42z"/>
                            </svg>
                        </button>
                        </div>
                    </div>

                    <!--Body-->
                    <div class="my-5">
                        <form action="add-flashcard.php" method="POST">
                            <div class="mb-4">
                                <label for="question" class="block text-gray-700 text-sm font-bold mb-2">Question:</label>
                                <input type="text" id="question" name="question" class="form-input w-full" placeholder="Enter question">
                            </div>
                            <div class="mb-4">
                                <label for="answer" class="block text-gray-700 text-sm font-bold mb-2">Answer:</label>
                                <input type="text" id="answer" name="answer" class="form-input w-full" placeholder="Enter answer">
                            </div>  <div class="flex justify-end pt-2">
    <button class="modal-close px-4 bg-gray-500 p-3 rounded-lg text-white hover:bg-gray-400" onclick="closeAddFlashcardModal()">Close</button>
    <button type="submit" class="px-4 bg-blue-500 p-3 ml-3 rounded-lg text-white hover:bg-blue-400">Add</button>
</div>
                        </form>
                    </div>

                    <!--Footer-->
                 
                </div>
            </div>
        </div>
    </div>
</div>


      <!-- Update Flashcard Modal -->
<!-- Update Flashcard Modal -->
<div class="fixed z-10 inset-0 overflow-y-auto hidden" id="updateFlashcardModal" aria-labelledby="updateFlashcard" role="dialog" aria-modal="true">
    <div class="flex items-center justify-center min-h-screen">
        <div class="relative bg-white rounded-lg max-w-lg mx-auto">
            <div class="absolute right-0 top-0 m-4">
                <button type="button" class="text-gray-400 hover:text-gray-600" onclick="closeUpdateModal()" aria-label="Close">
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>
            <div class="p-6">
                <h3 class="text-xl font-semibold" id="updateFlashcard">Update Flashcard</h3>
                <form action="update-flashcard.php" method="POST">
                    <input type="hidden" id="updateCardID" name="tbl_card_id">
                    <div class="mt-4">
                        <label class="block text-sm font-medium text-gray-700" for="updateQuestion">Question:</label>
                        <input type="text" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" id="updateQuestion" name="question">
                    </div>
                    <div class="mt-4">
                        <label class="block text-sm font-medium text-gray-700" for="updateAnswer">Answer:</label>
                        <input type="text" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" id="updateAnswer" name="answer">
                    </div>
                    <div class="mt-6">
                        <button type="button" class="mr-2 bg-gray-200 text-gray-700 px-4 py-2 rounded-md hover:bg-gray-300" onclick="closeUpdateModal()" aria-hidden="true">Close</button>
                        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">Save Changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<hr class="my-2 md:my-4">
<div class="container mx-auto">
    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
        <?php 
           $servername = "localhost";
           $username = "root";
           $password = "";
           $dbname = "db_elearning";
           
           try {
               $conn = new PDO("mysql:host=$servername;dbname=$dbname;", $username, $password);
               $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
           } catch (PDOException $e) {
               echo "Error:". $e->getMessage();
           }
        
            $stmt = $conn->prepare("SELECT * FROM tbl_card");
            $stmt->execute();

            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $questionNumber = 0;    

            foreach($result as $row) {
                $cardID = $row['tbl_card_id'];
                $question = $row['question'];
                $answer = $row['answer'];
                $questionNumber++;
                ?>

                <div class="p-4">
                    <div class="bg-white shadow-md rounded-md p-4">
                        <h5 class="text-lg font-semibold">Question <?= $questionNumber ?></h5>
                        <h4 id="question-<?= $cardID ?>" class="text-xl"><?= $question ?></h4>
                        <div class="flex justify-between items-center mt-4">
                            <button class="bg-blue-500 text-white px-3 py-1 rounded-md hover:bg-blue-600" onclick="updateFlashcard(<?= $cardID ?>)">
                                Update
                            </button>
                            <button class="bg-red-500 text-white px-3 py-1 rounded-md hover:bg-red-600" onclick="deleteFlashcard(<?= $cardID?>)">
                                Delete
                            </button>
                        </div>
                        <button class="bg-gray-300 text-gray-700 px-3 py-1 rounded-md mt-4" onclick="showAnswer(<?= $cardID ?>);">Show/Hide Answer</button>
                        <div class="answer-con">
                            <p id="answer-<?= $cardID ?>" class="hidden"><?= $answer ?></p>
                        </div>
                    </div>
                </div>

                <?php
            }
        ?>
    </div>
</div>

<!-- Script JS -->
<script src="https://code.jquery.com/jquery-1.9.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
<script>
    function showAnswer(id) {
        var answerElement = document.getElementById('answer-' + id);

        if (answerElement.classList.contains('hidden')) {
            answerElement.classList.remove('hidden');
        } else {
            answerElement.classList.add('hidden');
        }
    }

    function updateFlashcard(id) {
        document.getElementById('updateFlashcardModal').classList.remove('hidden');

        var updateQuestion = document.getElementById('question-' + id).innerHTML;
        var updateAnswer = document.getElementById('answer-' + id).innerHTML;

        document.getElementById('updateCardID').value = id;
        document.getElementById('updateQuestion').value = updateQuestion;
        document.getElementById('updateAnswer').value = updateAnswer;
    }

    function deleteFlashcard(id) {
        if (confirm("Do you want to delete this flashcard?")) {
            window.location = "delete-flashcard.php?card=" + id;
        }
    }
    function showAllActionButtons() {
        // Implement your logic to show all action buttons
    }

    function showAddFlashcardModal() {
        document.getElementById('addFlashcardModal').classList.remove('hidden');
    }

    function closeAddFlashcardModal() {
        document.getElementById('addFlashcardModal').classList.add('hidden');
    }



    // Function to close the update modal
    function closeUpdateModal() {
        document.getElementById('updateFlashcardModal').classList.add('hidden');
    }
</script>




</body>

</html>