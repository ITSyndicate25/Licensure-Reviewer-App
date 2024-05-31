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

if (isset($_GET['card'])) {
    $card = $_GET['card'];

    try {

        $query = "DELETE FROM tbl_card WHERE tbl_card_id = '$card'";

        $stmt = $conn->prepare($query);

        $query_execute = $stmt->execute();

        if ($query_execute) {
            echo "
                <script>
                    alert('Card deleted successfully!');
                    window.location.href = 'http://localhost/e-learningsystem/index.php?q=flashcard';
                </script>
            ";
        } else {
            echo "
                <script>
                    alert('Failed to delete card!');
                    window.location.href = 'http://localhost/e-learningsystem/index.php?q=flashcard';
                </script>
            ";
        }

    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}

?>