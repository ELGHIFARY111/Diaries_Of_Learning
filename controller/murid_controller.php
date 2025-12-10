<?php

function navigasi_murid() {
    $active = $_GET['active'] ?? 'aktif';
    include "./views/murid/navigasiMurid.php";
}
function murid_dashboard_page($koneksi) {
    $active = $_GET['active'] ?? 'aktif';
    include "./views/murid/homeMurid.php";
}
function catatan_murid_page($koneksi) {
    $active = $_GET['active'] ?? 'aktif';
    include "./views/murid/catatanMurid.php";
}
function kosakata_murid_page($koneksi) {
    $active = $_GET['active'] ?? 'aktif';
    include "./views/murid/kosakataMurid.php";
}
function misi_murid_page($koneksi) {
    $active = $_GET['active'] ?? 'aktif';
    include "./views/murid/misiMurid.php";
}
function kerjakan_misi_murid_page($koneksi) {
    $active = $_GET['active'] ?? 'aktif';
    include "./views/murid/kerjakanMisiMurid.php";
}
function profil_murid_page($koneksi) {
    $active = $_GET['active'] ?? 'aktif';
    include "./views/murid/profilMurid.php";
}
function leaderboard_murid_page($koneksi) {
    $active = $_GET['active'] ?? 'aktif';
    include "./views/murid/leaderboard.php";
}

?>