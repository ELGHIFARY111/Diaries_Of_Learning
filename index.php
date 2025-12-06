<?php
session_start();

require_once "./connection/koneksi.php";
require_once "./controller/auth_controller.php";
require_once "./controller/superAdmin_controller.php";
require_once "./controller/guru_controller.php";
require_once "./controller/murid_controller.php";
require_once "./controller/global_controller.php";

$page = $_GET['page'] ?? '';

$page_exception=['login','login_process','regist','regist_process'];
if(!isset($_SESSION['login']) && !in_array($page,$page_exception)) {
    header("Location: index.php?page=login");
    exit;
}

// nav
if ($page !== 'login'&& $page!== 'regist' && $_SESSION['user_role']==1) {
    top_navigasi_superadmin();
}elseif($page !== 'login'&& $page!== 'regist' && $_SESSION['user_role']==2){
    navigasi_guru();
}elseif($page !== 'login'&& $page!== 'regist' && $_SESSION['user_role']==3){
    navigasi_murid();
}
// page
switch ($page) {
// auth 
    case 'login':
        auth_login_page();
        break;

    case 'regist':
        auth_regist_page($koneksi);
        break;

    case 'login_process':
        auth_authenticate($koneksi);
        break;

    case 'regist_process': 
        auth_regist_process($koneksi);
        break;

    case 'logout':
        auth_logout();
        break;
// admin
    case 'dashboard':
        dashboard_admin_page($koneksi);
        break;

    case 'institusi/sekolah':
        institusi_sekolah_index($koneksi);
        break;

    case 'institusi/user':
        institusi_user_index($koneksi);
        break;

    case 'monitoring/catatan':
        monitoring_catatan_page($koneksi);
        break;

    case 'monitoring/progres':
        monitoring_progres_page($koneksi);
        break;

    case 'monitoring/sekolah':
        monitoring_sekolah_page($koneksi);
        break;
        
    case 'pengaturan/profil':
        pengaturan_profil_page($koneksi);
        break;

    case 'pengaturan/log':
        pengaturan_log_page($koneksi);
        break;

    case 'pengaturan/konfigurasi':
        pengaturan_konfigurasi_page($koneksi);
        break;
// guru
    case 'guru':
        guru_dashboard_page($koneksi);
        break;

    case 'guru/laporan_progres':
        laporan_progres_page($koneksi);
        break;

    case 'guru/misi_kosakata':
        misi_kosakata_page($koneksi);
        break;

    case 'guru/monitoring':
        monitoring_page($koneksi);
        break;

    case 'guru/profil':
        profil_page($koneksi);
        break;

    case 'guru/review_catatan':
        review_catatan_page($koneksi);
        break;
// murid
    case 'murid':
        murid_dashboard_page($koneksi);
        break;

    case 'murid/catatanMurid':
        catatan_murid_page($koneksi);
        break;

    case 'murid/kosakataMurid':
        kosakata_murid_page($koneksi);
        break;

    case 'murid/misiMurid':
        misi_murid_page($koneksi);
        break;


// eror
    default:
        echo "Halaman tidak ditemukan";
        break;
}
