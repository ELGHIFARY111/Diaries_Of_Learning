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

// --- PROSES REGISTRASI ---
function auth_regist_process($koneksi) {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $errors = [];
        $data = $_POST;
        
        // 1. Validasi Input
        if (empty($data['username'])) $errors['username'] = "Username wajib diisi.";
        if (empty($data['password'])) $errors['password'] = "Password wajib diisi.";
        elseif (strlen($data['password']) < 6) $errors['password'] = "Password minimal 6 karakter.";
        
        if (empty($data['nama_lengkap'])) $errors['nama_lengkap'] = "Nama lengkap wajib diisi.";
        
        if (empty($data['email'])) $errors['email'] = "Email wajib diisi.";
        elseif (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) $errors['email'] = "Format email salah.";

        // Validasi Sekolah (Khusus Siswa)
        if (isset($data['user_role_selection']) && $data['user_role_selection'] == 'siswa') {
            if (empty($data['sekolah']) && empty($data['kode_sekolah'])) {
                $errors['sekolah'] = "Pilih sekolah atau masukkan kode sekolah.";
            }
        }

        // 2. Jika ada error validasi dasar
        if (!empty($errors)) {
            $peran_sekarang = $data['user_role_selection'];
            $data_sekolah = sekolah_get_all($koneksi);
            include "./views/php/registrasi.php"; // Muat ulang view dengan error
            return;
        }

        // 3. Cek Database (Model)
        $status = auth_regist_user($koneksi, $data);
        
        if ($status === "duplicate") {
            $errors['username'] = "Username atau Email sudah terdaftar.";
            $errors['email'] = "Cek kembali email anda.";
            
            $peran_sekarang = $data['user_role_selection'];
            $data_sekolah = sekolah_get_all($koneksi);
            include "./views/php/registrasi.php";
            return;
        } elseif ($status === true) {
            echo "<script>alert('Registrasi Berhasil! Silakan Login.'); window.location='index.php';</script>";
        } else {
            echo "<script>alert('Error System: " . $status . "'); window.history.back();</script>";
        }
    }
}

// --- PROSES LOGIN ---
function auth_authenticate($koneksi) {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $errors = [];

        // 1. Validasi Input Kosong
        if (empty($username)) $errors['username'] = "Username harus diisi.";
        if (empty($password)) $errors['password'] = "Password harus diisi.";

        // 2. Jika input ada, baru cek database
        if (empty($errors)) {
            $user = auth_get_user_by_username($koneksi, $username);
            
            if ($user) {
                $input_hash = hash('sha256', $password);
                if ($input_hash === $user['password_hash']) {
                    // Login Sukses
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
                    $errors['password'] = "Password salah!";
                }
            } else {
                $errors['username'] = "Username tidak ditemukan!";
            }
        }

        include "./views/php/login.php";
    }
}

function auth_logout() {
    session_destroy();
    header("Location: index.php?page=login");
    exit;
}
?>