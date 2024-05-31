<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "db_elearning";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['tbl_card_id'], $_POST['question'], $_POST['answer'])) {
        $cardID = $conn->real_escape_string($_POST['tbl_card_id']);
        $question = $conn->real_escape_string($_POST['question']);
        $answer = $conn->real_escape_string($_POST['answer']);

        $sql = "UPDATE tbl_card SET question = '$question', answer = '$answer' WHERE tbl_card_id = '$cardID'";

        if ($conn->query($sql) === TRUE) {
            header("Location: http://localhost/e-learningsystem/index.php?q=flashcard");
            exit();
        } else {
            echo "Error: " . $conn->error;
        }
    } else {
        echo "
            <script>
                alert('Please fill in all fields!');
                window.location.href = 'http://localhost/e-learningsystem/index.php?q=flashcard';
            </script>
        ";
    }
}

$conn->close();
?>
