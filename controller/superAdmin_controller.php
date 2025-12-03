<?php
require_once "./model/database_admin_user.php"; 
require_once "./model/database_admin_sekolah.php"; 
require_once "./model/role.php"; 

function top_navigasi_superadmin(){
    $dataMaster= cek_role();
    include "./views/superAdmin/navigasiAtas.php";
}

function dashboard_admin_page($koneksi) {
    $data_user = user_get_all($koneksi);
    include "./views/superAdmin/dashboard_admin.php";
}

function institusi_sekolah_index($koneksi)
{
    $data_sekolah = sekolah_get_all($koneksi);
    $no=1;
    include "./views/superAdmin/institusi/sekolah.php";
}

function institusi_user_index($koneksi) {
    $filter = isset($_GET['filter_role']) ? $_GET['filter_role'] : null;
    $data_user = user_get_all($koneksi, $filter);
    include "./views/superAdmin/institusi/user.php";
}

function monitoring_catatan_page($koneksi) {
    include "./views/superAdmin/monitoring/catatan.php";
}

function monitoring_progres_page($koneksi) {
    include "./views/superAdmin/monitoring/progres.php";
}

function monitoring_sekolah_page($koneksi) {
    include "./views/superAdmin/monitoring/sekolah.php";
}


function pengaturan_profil_page($koneksi) {
    include "./views/superAdmin/pengaturan/profil.php";
}

function pengaturan_log_page($koneksi) {
    include "./views/superAdmin/pengaturan/log.php";
}

function pengaturan_konfigurasi_page($koneksi) {
    include "./views/superAdmin/pengaturan/konfigurasi.php";
}


?>