<?php
session_start();

$username = $_POST["uname"];
$password = $_POST["pword"];

//on mamp no 8889
$dbHost = "localhost";
$dbUser = "root";
$dbPass = "root";
$db     = "unit_7";

$conn = mysqli_connect($dbHost, $dbUser, $dbPass, $db);

//Checking is user existing in the database or not
$query = mysqli_query($conn, "SELECT * FROM `users` WHERE username='$username' and password='$password'");

$rows = mysqli_num_rows($query);

echo "\$rows: $rows<br>";

if ($rows == 1) {
    
    if (mysqli_num_rows($query) > 0) {
        while ($row = mysqli_fetch_assoc($query)) {
            $user_id = $row["user_id"];
        }
        //setcookie("user_id", $user_id);
        $_SESSION["user_id"] = $user_id;
        $session_id          = session_id();
        $_SESSION["sess_id"] = $session_id;
        $time                = time();
        
        echo "user_id $user_id found. sess_id $session_id set at $time<br />";
        
        $sql = "INSERT INTO  login_sessions
                    (user_id, session_id, last_access_time)
            VALUES
                ('$user_id', '$session_id', '$time')";
        header("Location: admin.php");
        mysqli_query($conn, $sql);
    }
} 
else {
    header("Location: login.html");
    
}

?>