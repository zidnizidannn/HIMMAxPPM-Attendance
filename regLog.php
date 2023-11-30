<?php
error_reporting(E_ALL);

session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sakuhimma";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_POST['action'];

    if ($action == 'register') {
        $conn = new mysqli($servername, $username, $password, $dbname);

        $query = "SELECT MAX(id) AS last_id FROM loginuser";
        $result = $conn->query($query);
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

        // $query = "INSERT INTO loginuser (userName, noWhatsapp, pass) 
                // VALUES ('$usernameReg', '$no_waReg', '$passwordReg')";

        $query = "INSERT INTO loginuser (id, userName, noWhatsapp, pass) 
                VALUES ('$new_id', '$usernameReg', '$no_waReg', '$passwordReg')";

        if($conn->query($query)){
            header('Location: index.html');
        } else {
            echo "Gagal insert data";
        }
        mysqli_close($conn);
    } elseif ($action == 'login') {
        $conn = mysqli_connect($servername, $username, $password, $dbname);

        $usernameLogin = $_POST['username']; 
        $passwordLogin = $_POST['pass'];
        
        // $sql = "SELECT * FROM loginuser WHERE userName='$usernameLogin'";
        $sql = "SELECT * FROM loginuser 
        WHERE userName='$usernameLogin' 
        OR noWhatsapp='$usernameLogin'";
        
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
}
?>