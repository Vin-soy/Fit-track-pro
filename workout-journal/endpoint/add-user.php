<?php
include("../conn/conn.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['first_name'], $_POST['last_name'], $_POST['weight'], $_POST['height'], $_POST['birthday'], $_POST['contact_number'], $_POST['email'], $_POST['username'], $_POST['password'])) {
        $firstName = mysqli_real_escape_string($conn, $_POST['first_name']);
        $lastName = mysqli_real_escape_string($conn, $_POST['last_name']);
        $weight = mysqli_real_escape_string($conn, $_POST['weight']);
        $height = mysqli_real_escape_string($conn, $_POST['height']);
        $birthday = mysqli_real_escape_string($conn, $_POST['birthday']);
        $contactNumber = mysqli_real_escape_string($conn, $_POST['contact_number']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $username = mysqli_real_escape_string($conn, $_POST['username']);
        $password = ($_POST['password']);

        $sql = "INSERT INTO tbl_user (first_name, last_name, weight, height, birthday, contact_number, email, username, password) VALUES ('$firstName', '$lastName', '$weight', '$height', '$birthday', '$contactNumber', '$email', '$username', '$password')";

        if (mysqli_query($conn, $sql)) {
            echo "
                <script>
                    alert('Account Registered Successfully!');
                    window.location.href = 'http://localhost/workout-journal/';
                </script>
            ";
        } else {
            echo "
                <script>
                    alert('Error: " . mysqli_error($conn) . "');
                    window.location.href = 'http://localhost/workout-journal/';
                </script>
            ";
        }
    } else {
        echo "
            <script>
                alert('Please fill in all fields!');
                window.location.href = 'http://localhost/workout-journal/';
            </script>
        ";
    }

    mysqli_close($conn);
}
?>