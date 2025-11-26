<?php
session_start();

require_once "./connection/koneksi.php";
require_once "./controller/user_controller.php";
require_once "./controller/auth_controller.php";

$page = $_GET['page'] ?? 'user';

if (!isset($_SESSION['login']) && $page !== 'login' && $page !== 'login_process') {
    header("Location: index.php?page=login");
    exit;
}

switch ($page) {
    case 'login':
        auth_login_page();
        break;
        
    case 'login_process':
        auth_authenticate($koneksi);
        break;
        
    case 'logout':
        auth_logout();
        break;
        
    case 'user':
        user_index($koneksi);
        break;
        
    default:
        echo "Halaman tidak ditemukan";
        break;
}
?>