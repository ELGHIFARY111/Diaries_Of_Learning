<?php
require_once "./model/auth_model.php";
require_once "./model/database_admin_sekolah.php"; 

function auth_login_page() {
    include "./views/php/login.php";
}

function auth_regist_page($koneksi) {
    $peran_sekarang = isset($_GET['peran']) ? $_GET['peran'] : 'siswa';
    if ($peran_sekarang !== 'guru' && $peran_sekarang !== 'siswa') {
        $peran_sekarang = 'siswa';
    }
    $data_sekolah = sekolah_get_all($koneksi); 
    include "./views/php/registrasi.php";
}

function auth_regist_process($koneksi) {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $status = auth_regist_user($koneksi, $_POST);
        
        if ($status === "duplicate") {
            echo "<script>alert('Username atau Email sudah terdaftar!'); window.history.back();</script>";
        } elseif ($status === true) {
            echo "<script>alert('Registrasi Berhasil! Silakan Login.'); window.location='index.php';</script>";
        } else {
            echo "<script>alert('Registrasi Gagal! " . $status . "'); window.history.back();</script>";
        }
    }
}

function auth_authenticate($koneksi) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    $user = auth_get_user_by_username($koneksi, $username);
    
    if ($user) {
        $input_hash = hash('sha256', $password);

        if ($input_hash === $user['password_hash']) {
            
            $_SESSION['login'] = true;
            $_SESSION['user_id'] = $user['id_user'];
            $_SESSION['user_nama'] = $user['nama_lengkap'];
            $_SESSION['user_role'] = $user['role'];
            
            if($user['role'] == 'superadmin' || $user['role'] == '1'){
                header("Location: index.php?page=admin");
            } elseif($user['role'] == 'guru' || $user['role'] == '2'){
                header("Location: index.php?page=guru");
            } else {
                header("Location: index.php?page=murid");
            }
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