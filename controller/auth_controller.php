<?php
require_once "./model/auth_model.php";

function auth_login_page() {
    include "./views/php/login.php";
}

function auth_authenticate($koneksi) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $user = auth_get_user_by_username($koneksi, $username);
    if ($user) {
        if ($password== $user['password_hash']) {
            $_SESSION['login'] = true;
            $_SESSION['user_nama'] = $user['nama_lengkap'];
            $_SESSION['user_role'] = $user['role'];
            header("Location: index.php?page=user");
            exit;
        } else {
            echo "<script>alert('Password salah!'); window.location='index.php?page=login';</script>";
        }
    } else {
        echo "<script>alert('Username tidak ditemukan!'); window.location='index.php?page=login';</script>";
    }
}

function auth_logout() {
    session_destroy();
    header("Location: index.php?page=login");
    exit;
}
?>