<?php
session_start();

require_once "./connection/koneksi.php";
require_once "./controller/superAdmin_controller.php";
require_once "./controller/auth_controller.php";
require_once "./controller/global_controller.php";

$page = $_GET['page'] ?? '';

if (!isset($_SESSION['login']) && $page !== 'login' && $page !== 'login_process') {
    header("Location: index.php?page=login");
    exit;
}

if ($page !== 'login') {
    top_navigasi_superadmin();
}

switch ($page) {

    case 'dashboard':
        dashboard_admin_page($koneksi);
        break;

    case 'login':
        auth_login_page();
        break;

    case 'login_process':
        auth_authenticate($koneksi);
        break;

    case 'logout':
        auth_logout();
        break;

    case 'institusi/sekolah':
        institusi_sekolah_index($koneksi);
        break;

    case 'institusi/user':
        institusi_user_index($koneksi);
        break;

    case 'institusi/sekolah_tambah':
        institusi_sekolah_tambah_page();
        break;

    case 'institusi/sekolah_tambah_process':
        institusi_sekolah_tambah_process($koneksi);
        break;

    case 'institusi/sekolah_edit':
        institusi_sekolah_edit_page($koneksi);
        break;

    case 'institusi/sekolah_edit_process':
        institusi_sekolah_edit_process($koneksi);
        break;

    case 'institusi/sekolah_hapus':
        institusi_sekolah_hapus($koneksi);
        break;

    default:
        echo "Halaman tidak ditemukan";
        break;
}
