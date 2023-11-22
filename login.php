<?php
error_reporting(E_ALL);

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sakuhimma";

$conn = mysqli_connect($servername, $username, $password, $dbname);

$usernameLogin = $_POST['username']; 
$passwordLogin = $_POST['pass'];

$sql = "SELECT * FROM loginuser WHERE userName='$usernameLogin'";

$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    if (md5($passwordLogin) === $row['pass']) {
        $_SESSION['user_id'] = $row['id'];
        header("Location: coba.html"); 
    }
    else {
        echo "Password salah!";
    }
} else {
    echo "User tidak ditemukan!";  
}

mysqli_close($conn);
?>