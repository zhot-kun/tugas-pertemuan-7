<?php
require './../config/db.php';

session_start();

if (isset($_POST['submit'])) {

    $email = $_POST['email'];
    $password = $_POST['password'];

    $user = mysqli_query($db_connect, "SELECT * FROM users WHERE email = '$email'");
    if (mysqli_num_rows($user) > 0) {
        $data = mysqli_fetch_assoc($user);

        if (password_verify($password, $data['password'])) {

            //otorisasi
            $_SESSION['role'] = $data['role'];
            $_SESSION['name'] = $data['name'];

            switch ($data['role']) {
                case 'user':
                    header('Location: ./../profile.php');
                    exit();
                case 'admin':
                    header('Location: ./../admin.php');
                    exit();
            }
        } else {
            echo "password salah";
            die;
        }

    } else {
        echo "email atau password salah";
        die;
    }
}
?>