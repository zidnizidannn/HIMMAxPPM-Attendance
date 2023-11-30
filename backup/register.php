<?php
// ======== register ========
error_reporting(E_ALL);

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sakuhimma";

$db = new mysqli($servername, $username, $password, $dbname);

$query = "SELECT MAX(id) AS last_id FROM loginuser";
$result = $db->query($query);
$data = $result->fetch_assoc();
$last_id = $data['last_id'];

if($last_id) {
    $id = substr($last_id, 3);
    $id = str_pad((int)substr($last_id, 3) + 1, 3, 0, STR_PAD_LEFT);
}
else {
    $id = '001'; 
}
$new_id = '354'.$id;

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

// $query = "INSERT INTO loginuser (userName, noWhatsapp, pass) VALUES ('$usernameReg', '$no_waReg', '$passwordReg')";

$query = "INSERT INTO loginuser (id, userName, noWhatsapp, pass) 
        VALUES ('$new_id', '$usernameReg', '$no_waReg', '$passwordReg')";

if($db->query($query)){
    header('Location: index.html');
} else {
    echo "Gagal insert data";
}
mysqli_close($db);

?>