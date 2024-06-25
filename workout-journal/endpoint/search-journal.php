<?php
session_start();
include('../conn/conn.php'); // Assuming this includes your mysqli connection setup

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_SESSION['user_id'])) {
    $userID = $_SESSION['user_id'];

    // Fetch the user's name from the database
    $query = "SELECT `first_name`, `last_name` FROM `tbl_user` WHERE `tbl_user_id` = '$userID'";
    $result = mysqli_query($conn, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $firstName = $row['first_name'];
        $lastName = $row['last_name'];

        // Retrieve activities based on the search date
        $searchDate = sanitizeAndValidate($_POST['searchDate']);

        // Query to fetch activities for a specific date
        $query_activities = "SELECT * FROM tbl_activities WHERE user_id = '$userID' AND date = '$searchDate'";
        $result_activities = mysqli_query($conn, $query_activities);

        // Check if there are results
        if ($result_activities && mysqli_num_rows($result_activities) > 0) {
            // Fetch and display the activities
            while ($row = mysqli_fetch_assoc($result_activities)) {
                // Display the retrieved data as needed
                echo "Activity: " . htmlspecialchars($row['activity']) . "<br>";
                // Add more fields as needed
            }
        } else {
            echo "No activities found for the specified date.";
        }
    }
}

// Function to sanitize and validate input (you may need to customize this)
function sanitizeAndValidate($input) {
    // Perform any necessary sanitization and validation
    global $conn;
    return mysqli_real_escape_string($conn, htmlspecialchars(trim($input)));
}
?>
