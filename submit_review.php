<?php
// Connect to your MySQL database
$host = 'localhost';
$db_user = "root";
$db_pass = "";
$db_name ="review" ;

$conn = mysqli_connect('localhost','root','','review');

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $rating = $_POST['rating'];
    $review = $_POST['review'];

    // Validate data here if needed
	if (empty($name) || empty($rating) || empty($review)) {
    // Handle empty fields and provide an error message
    echo "All fields are required.";
    exit();
}
if ($rating < 1 || $rating > 5) {
    // Handle invalid rating and provide an error message
    echo "Invalid rating. Please enter a rating between 1 and 5.";
    exit();
}
$name = mysqli_real_escape_string($conn, $name);
$review = mysqli_real_escape_string($conn, $review);
$name = htmlspecialchars($name);
$review = htmlspecialchars($review);
if (strlen($review) > 1000) {
    // Handle a review that's too long and provide an error message
    echo "Review is too long. Please limit your review to 1000 characters.";
    exit();
}

    // Insert the review into the database
    $sql = "INSERT INTO reviews (name, rating, review) VALUES ('$name', '$rating', '$review')";

    if (mysqli_query($conn, $sql)) {
        header("Location: index.html"); // Redirect back to the review page
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
} else {
    // Handle other HTTP methods or direct access to this PHP file
    echo "Invalid request";
}

mysqli_close($conn);
?>
