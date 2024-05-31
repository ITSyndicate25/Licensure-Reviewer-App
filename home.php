<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
</head>



<body class="bg-gray-100">
<?php
// Your existing database connection code
$servername = "localhost";
$username = "id22247412_root";
$password = "Admin#1234";
$dbname = "id22247412_db_elearning";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname;", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Error:". $e->getMessage();
}

// Check if user is logged in and retrieve other information
if(isset($_SESSION['StudentID'])) {
    $studentID = $_SESSION['StudentID'];

    // Prepare and execute query to retrieve student's information based on StudentID
    $stmt = $conn->prepare("SELECT Fname, Lname, Address, MobileNo, profile_pictures FROM tblstudent WHERE StudentID = :studentID");
    $stmt->bindParam(':studentID', $studentID);
    $stmt->execute();

    // Fetch the result
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    // Check if a row was returned
    if($row) {
        $fname = $row['Fname'];
        $lname = $row['Lname'];
        $address = $row['Address'];
        $mobileNo = $row['MobileNo'];
        $profilePic = $row['profile_pictures'];
    } else {
        // Default values if no matching record found
        $fname = "Unknown";
        $lname = "Unknown";
        $address = "Unknown";
        $mobileNo = "Unknown";
        $profilePic = ""; // Default empty profile picture
    }
} else {
    // Default values if user not logged in
    $fname = "Unknown";
    $lname = "Unknown";
    $address = "Unknown";
    $mobileNo = "Unknown";
    $profilePic = ""; // Default empty profile picture
}

?>



<main class="container mx-auto py-4">
    <div class="mb-4 flex flex-col items-center"> <!-- Modified flex direction for responsiveness -->
        <div class="bg-white p-8 rounded-lg shadow-md mb-4 w-full sm:w-4/5 md:w-4/6 lg:w-4/12"> <!-- Adjusted width for different screen sizes -->
            <div class="flex items-center mb-6">
                <!-- Display profile picture if available, otherwise use placeholder -->
                <?php if (!empty($profilePic)): ?>
                    <!-- Assuming display_image.php retrieves and outputs the image data -->
                    <img src="student.png" alt="Profile Picture" class="w-16 h-16 rounded-full mr-4">
                <?php else: ?>
                    <img src="student.png" alt="User Avatar" class="w-16 h-16 rounded-full mr-4">
                <?php endif; ?>
                <div>
                    <h1 class="text-xl sm:text-2xl font-bold"><?php echo $fname . " " . $lname; ?></h1> <!-- Adjusted font size for responsiveness -->
                    <p class="text-gray-500 text-sm">Home Address: <?php echo $address; ?></p> <!-- Adjusted font size for responsiveness -->
                    <p class="text-gray-500 text-sm">Mobile Number: <?php echo $mobileNo; ?></p> <!-- Adjusted font size for responsiveness -->
                </div>
            </div>
        </div>
    </div>
</main>





        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            <div class="bg-white p-8 rounded-lg shadow-md">
                <img src="exam.png" alt="Mock Test" class="mx-auto mb-4 w-1/4">
                <h2 class="text-xl font-bold text-center mb-2">Mock Test</h2>
                <p class="text-center text-gray-700"> The Mock Test feature helps users prepare effectively for exams by offering realistic practice opportunities, fostering self-assessment, and enabling targeted study based on performance analysis.</p>
                
            </div>

            <div class="bg-white p-8 rounded-lg shadow-md">
                <img src="book.png" alt="Study Materials" class="mx-auto mb-4 w-1/4">
                <h2 class="text-xl font-bold text-center mb-2">Study Materials</h2>
                <p class="text-center text-gray-700">The Mock Test feature helps users prepare effectively for exams by offering realistic practice opportunities, fostering self-assessment, and enabling targeted study based on performance analysis.</p>
                
            </div>

            <div class="bg-white p-8 rounded-lg shadow-md">
                <img src="flash-card.png" alt="Flashcards" class="mx-auto mb-4 w-1/4">
                <h2 class="text-xl font-bold text-center mb-2">Flashcards</h2>
                <p class="text-center text-gray-700">The Flashcards feature offers an efficient and interactive learning tool, promoting active engagement, improving retention, and streamlining review sessions for effective study.</p>
               
            </div>
        </div>
    </main>
</body>

</html>
