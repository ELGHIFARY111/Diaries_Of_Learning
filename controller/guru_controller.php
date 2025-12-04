<?php
require_once "./model/role.php";


function navigasi_guru() {
    $active = $_GET['active'] ?? 'aktif';
    include "./views/guru/navigasiGuru.php";
}

function guru_dashboard_page($koneksi) {
    $active = $_GET['active'] ?? 'aktif';
    include "./views/guru/dashboard_guru.php";
}
function laporan_progres_page($koneksi) {
    $active = $_GET['active'] ?? 'aktif';
    include "./views/guru/laporan_progres.php";
}
function misi_kosakata_page($koneksi) {
    $active = $_GET['active'] ?? 'aktif';
    include "./views/guru/misi_kosakata.php";
}
function monitoring_page($koneksi) {
    $active = $_GET['active'] ?? 'aktif';
    include "./views/guru/monitoring.php";
}
function profil_page($koneksi) {
    $active = $_GET['active'] ?? 'aktif';
    include "./views/guru/profil.php";
}
function review_catatan_page($koneksi) {
    $active = $_GET['active'] ?? 'aktif';
    include "./views/guru/review_catatan.php";
}


?>