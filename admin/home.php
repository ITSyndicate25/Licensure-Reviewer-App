<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "db_elearning";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname;", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Execute SQL queries to retrieve total number of students, exercises, and lessons
    $stmtStudents = $conn->query("SELECT COUNT(*) AS totalStudents FROM tblstudent");
    $stmtExercises = $conn->query("SELECT COUNT(*) AS totalExercises FROM tblexercise");
    $stmtLessons = $conn->query("SELECT COUNT(*) AS totalLessons FROM tbllesson");

    // Fetch the results
    $totalStudents = $stmtStudents->fetch(PDO::FETCH_ASSOC)['totalStudents'];
    $totalExercises = $stmtExercises->fetch(PDO::FETCH_ASSOC)['totalExercises'];
    $totalLessons = $stmtLessons->fetch(PDO::FETCH_ASSOC)['totalLessons'];
} catch (PDOException $e) {
    echo "Error:". $e->getMessage();
}
?>

<style type="text/css">
    .secondrow > .row {
        border: 1px solid #ddd;
        text-align: center;
        margin: 20px;
        min-height: 50px;
        border-radius: 50%;
    }
    .imgstretch{
        padding: 10px 30px;
    }
    .imgstretch img {
        width: 100%;
        height: 100px;
    }
</style>

<div class="btn-controls">
    <!-- Add a logout button at the top -->
    <div class="logout-button" style="text-align: right; margin-bottom: 10px;">
        <a href="logout.php" class="btn btn-danger">
            <i class="icon-off"></i> Logout
        </a>
    </div>

    <div class="btn-box-row row-fluid">
        <!-- Display total number of lessons -->
        <a href="#" class="btn-box big span4">
            <i class="icon-random"></i><b><?php echo $totalLessons; ?></b>
            <p class="text-muted">Lesson</p>
        </a>
        <!-- Display total number of students -->
        <a href="#" class="btn-box big span4">
            <i class="icon-user"></i><b><?php echo $totalStudents; ?></b>
            <p class="text-muted">New Users</p>
        </a>
        <!-- Display total number of exercises -->
        <a href="#" class="btn-box big span4">
            <i class="icon-money"></i><b><?php echo $totalExercises; ?></b>
            <p class="text-muted">Exercises</p>
        </a>
    </div>
</div>

