<?php
// Get the image data from the database based on the StudentID
$servername = "sql205.infinityfree.com";
$username = "if0_36646792";
$password = "C3u1jueVHdKJ4";
$dbname = "if0_36646792_db_elearning";

$studentID = $_GET['StudentID'];

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname;", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $stmt = $conn->prepare("SELECT profile_pictures FROM tblstudent WHERE StudentID = :studentID");
    $stmt->bindParam(':studentID', $studentID);
    $stmt->execute();

    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($row) {
        $imageData = $row['profile_pictures'];
    } else {
        $imageData = "";
    }

    $conn = null;

    // Output the image data with the correct headers
    header("Content-Type: image/jpeg");
    echo $imageData;

} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>