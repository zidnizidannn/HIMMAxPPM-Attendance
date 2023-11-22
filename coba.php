<?php
error_reporting(E_ALL);

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sakuhimma";

if($_POST['action'] == 'register') {
        
    $db = new mysqli($servername, $username, $password, $dbname);

    // ======== register ========
    $usernameReg = $_POST['userName'];
    $no_waReg = $_POST['noWa']; 
    $passwordReg = $_POST['pass'];
    if(empty($usernameReg)){
        echo "Username tidak boleh kosong";
        exit();
    }
    if(empty($no_waReg)){
        echo "No. Whatsapp tidak boleh kosong";
        exit();
    } 
    if(empty($passwordReg)){
        echo "Password tidak boleh kosong";
        exit();
    }
    $passwordReg = md5($passwordReg); 
    $query = "INSERT INTO loginuser (userName, noWhatsapp, pass) VALUES ('$usernameReg', '$no_waReg', '$passwordReg')";
    if($db->query($query)){
        header('Location: coba.html');
    } else {
        echo "Gagal insert data";
    }
    mysqli_close($db);
} else if($_POST['action'] == 'login') {
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
}
?>