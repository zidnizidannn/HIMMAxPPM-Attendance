<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sakuhimma";

$db = new mysqli($servername, $username, $password, $dbname);

// Terima data dari form
$username = $_POST['username'];
$no_wa = $_POST['noWa']; 
$password = $_POST['pass'];

if(empty($username)){
    echo "Username tidak boleh kosong";
    exit();
}

if(empty($no_wa)){
    echo "No. Whatsapp tidak boleh kosong";
    exit();
} 

if(empty($password)){
    echo "Password tidak boleh kosong";
    exit();
}

// Enkripsi password
$password = md5($password); 

// Query insert data ke database
$query = "INSERT INTO loginuser VALUES ('', '$username', '$no_wa', '$password')";

if($db->query($query)){

  // Berhasil insert, redirect ke halaman utama
    header('Location: index.html');

} else {

    echo "Gagal insert data";

}

?>