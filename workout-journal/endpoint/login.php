<?php
include ('../conn/conn.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    $sql = "SELECT `password`, `tbl_user_id` FROM `tbl_user` WHERE `username` = '$username'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $stored_password = $row['password'];
        $user_id = $row['tbl_user_id'];

        if ($password === $stored_password) {
            session_start();

            $_SESSION['user_id'] = $user_id;

            echo "
            <script>
                alert('Login Successfully!');
                window.location.href = 'http://localhost/workout-journal/home.php';
            </script>
            "; 
        } else {
            echo "
            <script>
                alert('Login Failed, Incorrect Password!');
                window.location.href = 'http://localhost/workout-journal/home.php';
            </script>
            ";
        }
    } else {
        echo "
            <script>
                alert('Login Failed, User Not Found!');
                window.location.href = 'http://localhost/workout-journal/home.php';
            </script>
            ";
    }

    mysqli_close($conn);
}
?>