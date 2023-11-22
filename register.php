<?php
error_reporting(E_ALL);

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sakuhimma";

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


?>