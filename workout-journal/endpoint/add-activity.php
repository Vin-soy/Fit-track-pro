<?php
session_start();
include('../conn/conn.php'); 
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_SESSION['user_id'])) {
    $userID = $_SESSION['user_id'];

    // Fetch the user's name from the database
    $query = "SELECT `first_name`, `last_name` FROM `tbl_user` WHERE `tbl_user_id` = '$userID'";
    $result = mysqli_query($conn, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $firstName = $row['first_name'];
        $lastName = $row['last_name'];

        // Process form data and add activities to the database
        $date = sanitizeAndValidate($_POST['date']);
        $timeStart = sanitizeAndValidate($_POST['timeStart']);
        $timeEnd = sanitizeAndValidate($_POST['timeEnd']);

        // Loop through the additional activities and insert into the database
        foreach ($_POST['activity'] as $key => $activity) {
            $activity = sanitizeAndValidate($activity);
            $timeSpent = sanitizeAndValidate($_POST['time'][$key]);
            $distance = sanitizeAndValidate($_POST['distance'][$key]);
            $setCount = intval($_POST['set'][$key]); 
            $reps = intval($_POST['reps'][$key]);
            $activityNote = sanitizeAndValidate($_POST['activityNote'][$key]);

            // Insert data into the database
            $query = "INSERT INTO tbl_activities (user_id, date, time_start, time_end, activity, time_spent, distance, set_count, reps, note) VALUES ('$userID', '$date', '$timeStart', '$timeEnd', '$activity', '$timeSpent', '$distance', $setCount, $reps, '$activityNote')";
            $result = mysqli_query($conn, $query);

            if (!$result) {
                die('Error: ' . mysqli_error($conn)); // Handle error as needed
            }
        }

        // Redirect after successful insertion
        echo "
            <script>
                alert('Activity Added Successfully!');
                window.location.href = 'http://localhost/workout-journal/home.php';
            </script>
        ";
        exit();
    }
}

// Redirect to the login page if the user is not logged in or if there was an issue with fetching user details
header("Location: http://localhost/workout-journal/index.php");
exit();

// Function to sanitize and validate input (you may need to customize this)
function sanitizeAndValidate($input) {
    // Perform any necessary sanitization and validation
    global $conn;
    return mysqli_real_escape_string($conn, htmlspecialchars(trim($input)));
}
?>
