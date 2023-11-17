<?php
function registerUser() {
    $registrasiBerhasil = false;
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $username = $_POST["username"];
        $email = $_POST["email"];
        $password = $_POST["password"];
        $servername = "sql307.infinityfree.com";
        $username_db = "epiz_33835110";
        $password_db = "fc9rLLcxT2n";
        $dbname = "epiz_33835110_db_zidni_zatzet";

        $conn = mysqli_connect($servername, $username_db, $password_db, $dbname);

        if (!$conn) {
            die("Koneksi gagal: " . mysqli_connect_error());
        }
        $sql = "INSERT INTO zatzet (username, email, password) VALUES ('$username', '$email', '$password')";
        
        if (mysqli_query($conn, $sql)) {
            $registrasiBerhasil = true;
            $pesan = "Anda sudah registrasi!";
            echo "<script>window.location.href = 'beranda.php';</script>";
            exit();
        } else {
            $pesan = "Terjadi kesalahan: " . mysqli_error($conn);
        }
        mysqli_close($conn);

        echo "<p>" . $pesan . "</p>";
    }
    return $registrasiBerhasil;
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="layanan.css">
    <link rel="stylesheet" href="index.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="script.js"></script>
    <link rel="icon" href="image/zatzet logos.png" class="rounded-circle">
    <title>zatzet</title>
    <script>
        function showSuccessNotification() {
            alert("Anda berhasil mendaftar!");
        }
    </script>
</head>

<body>
    <nav class="navbar fixed-top navbar-expand-lg navbar-dark shadow" style="background-color: #1D1C26">
        <div class="container">
            <a class="navbar-brand" href="index.php">
                <img src="image/zatzet nav.png" alt="zatzet" width="100%">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link text-light active" id="nav" href="index.php">BERANDA</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light active" id="nav" href="layanan.php">LAYANAN</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light active" id="login" href="#registerModal" data-bs-toggle="modal" data-bs-target="#registerModal" onclick="switchToRegisterForm()">LOGIN</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="jumbotron-fluid mt-5">
        <div class="d-flex justify-content-end">
            <div class="my-auto" style="margin:0% 5%;">
                <h1>Pengiriman yang dipercaya<br>lebih dari <br><p class="list-inline-item" style="color: #289DC2;">100,000</p> bisnis</h1>
                <p class="fw-bold" style="font-family:tommy_thin;">Nikmati pengiriman cepat dan tanpa repot dengan ZatZet.<br> Daftar dan dapatkan layanan terbaik untuk kamu.</p>
                <a href="layanan.html" class="btn btn-orange">Lihat Layanan</a>
            </div>
            <img class="my-auto" src="image/truck fast.svg" style="width: 50%;" alt="">
        </div>

        <div class="beranda d-flex justify-content-between">
            <div class="text-center">
                <h3 class="angka">500,000+</h3>
                <p>Orang sudah menggunakan jasa kami</p>
            </div>
            <div class="garis"></div>
            <div class="text-center">
                <h3 class="angka">1,000,000+</h3>
                <p>Pengiriman setiap hari</p>
            </div>
            <div class="garis"></div>
            <div class="text-center">
                <h3 class="angka">99%</h3>
                <p>Mencakup wilayah Indonesia</p>
            </div>
        </div>

        <div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="loginModalLabel">Login</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form id="loginForm">
                            <div class="mb-3">
                                <label for="usernameOrEmail" class="form-label">Username / Email:</label>
                                <input type="text" class="form-control" id="usernameOrEmail" name="usernameOrEmail" required>
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password:</label>
                                <input type="password" class="form-control" id="password" name="password" required>
                            </div>
                            <button type="submit" class="btn btn-primary" style="background-color: orange; border: none;">Login</button>
                        </form>
                        <p class="text-center mt-3" id="alreadyRegisteredText"><a id="showLoginForm" href="#" data-bs-toggle="modal"
                            data-bs-target="#registerModal">Daftar </a>untuk masuk</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="registerModal" tabindex="-1" aria-labelledby="registerModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="registerModalLabel">Register</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <?php
                        if (registerUser()) {
                            echo "<script>showSuccessNotification();</script>";
                        }
                        ?>
                        <form id="registerForm" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                            <div class="mb-3">
                                <label for="username" class="form-label">Username:</label>
                                <input type="text" class="form-control" id="username" name="username" required>
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email:</label>
                                <input type="email" class="form-control" id="email" name="email" required>
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password:</label>
                                <input type="password" class="form-control" id="password" name="password" required>
                            </div>
                            <div class="mb-3">
                                <label for="confirmPassword" class="form-label">Konfirmasi Password:</label>
                                <input type="password" class="form-control" id="confirmPassword" name="confirmPassword" required>
                            </div>
                            <button type="submit" class="btn btn-primary" style="background-color: orange; border: none;">Register</button>
                        </form>
                        <p class="text-center mt-3" id="alreadyRegisteredText">Sudah punya akun? <a id="showLoginForm" href="#" data-bs-toggle="modal"
                                data-bs-target="#loginModal">Login</a></p>
                    </div>
                </div>
            </div>
        </div>   
    </div>
    
    <footer class="text-white" style="background-color: #1D1C26;">
        <div class="text-center p-2">
            <span><img src="image/zatzet typograph.png" alt="zatzet" width="70px">&copy; <span style="font-family: Arial, Helvetica, sans-serif; font-size: small;">2023 - Zidni Zidan</span></span>
        </div>
    </footer>
</body>
</html>