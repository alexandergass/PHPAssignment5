<?php
session_start();
$user_id    = $_SESSION['user_id'];
$session_id = $_SESSION['sess_id'];
$time       = time();

//on mamp no 8889
$dbHost = "localhost";
$dbUser = "root";
$dbPass = "root";
$db     = "unit_7";

$conn = mysqli_connect($dbHost, $dbUser, $dbPass, $db);

// echo "$user_id, $session_id<br>";

$query = mysqli_query($conn, "SELECT * FROM `login_sessions` WHERE user_id='$user_id' and session_id='$session_id'");

$rows = mysqli_num_rows($query);

while ($row = mysqli_fetch_array($query)) {
    if ($row['user_id'] == $user_id && $row['session_id'] == $session_id) {
        // echo "Match found in login_sessions";
        
        //update the time stored in the login_sessions table
        $query = mysqli_query($conn, "UPDATE login_sessions SET last_access_time='$time' WHERE user_id='$user_id'");
        
        echo "Welcome";
        echo "<br>*last_access_time updated to $time";
        
        break;
    } else {
        header("Location: login.html");
        
    }
}

mysqli_close($conn);

// remove all session variables
session_unset();

// destroy the session
session_destroy();
?>