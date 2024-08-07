<?php 
session_start();
require './func/functions.php';

// check cookie
if (isset($_COOKIE['X-ID']) && isset($_COOKIE["X-key"])) {
    $id = $_COOKIE["X-ID"];
    $key = $_COOKIE["X-key"];

    $result = mysqli_query($conn, "SELECT name from users where id = '$id'");
    $row = mysqli_fetch_assoc($result);

    // check cookie and name
    if ($key == hash('sha256',$row['name'])) {
        $_SESSION["login"] = true;
    }
}

if (isset($_SESSION["login"])) {
    header("Location: admin.php");
    exit;
}
    if (isset($_POST["login"])) {
        $name = $_POST["name"];
        $password = $_POST["password"];


        $result = mysqli_query($conn, "SELECT * FROM users WHERE name = '$name'");
        if (mysqli_num_rows($result) ===  1) {
            $row = mysqli_fetch_assoc($result);
            if (password_verify($password,$row["password"])) {
                $_SESSION["login"] =true;

                // check cookie
                if (isset($_POST["rememberMe"])) {

                    setcookie('X-ID', $row["id"], time() + 3500);
                    setcookie('X-key', hash('sha256',$row["name"]), time() + 3500);
                }
                header("Location: admin.php");
                exit;
            }
        }

        $error = true;
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LibrarySys</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="index.css">
</head>
<body>
    <?php if(isset($error)) : ?>
    <div id="flash-message" class="flash-message flash-error">
        <p>Login gagal. Periksa kredensial Anda dan coba lagi.</p>
    </div>
    <?php endif; ?>
    <div class="d-flex">
        <div class="sidebar d-none d-md-flex">
            <img src="asset/img/logo.webp" alt="LibrarySys"> 
            <h1>Sistem Informasi</h1>
            <p>Perpustakaan</p>
            <p>LibrarySys</p>
        </div>
        <div class="content-wrapper flex-fill">
            <div class="content mx-auto">
                <h2>Masuk<br>LibrarySys</h2>
                <form action="" method="post">
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" class="form-control" id="username" name="name">
                    </div>
                    <div class="form-group">
                        <label for="password">Kata Sandi</label>
                        <input type="password" class="form-control" id="password" name="password">
                    </div>
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="rememberMe" name="rememberMe">
                        <label class="form-check-label" for="rememberMe">Remember Me</label>
                    </div>
                    <button type="submit" class="btn btn-warning btn-block" name="login">Sign in</button>
                </form>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var flashMessage = document.getElementById('flash-message');
            if (flashMessage) {
                // Tampilkan pesan selama 5 detik
                setTimeout(function() {
                    flashMessage.classList.add('hidden');
                }, 5000); // 5000 ms = 5 detik
            }
        });
    </script>
    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
