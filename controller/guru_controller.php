<?php
require_once "./model/role.php";


function navigasi_guru() {
    include "./views/guru/navigasiGuru.php";
}

function guru_dashboard_page($koneksi) {
    include "./views/guru/dashboard_guru.php";
}
function laporan_progres_page($koneksi) {
    include "./views/guru/laporan_progres.php";
}
function misi_kosakata_page($koneksi) {
    include "./views/guru/misi_kosakata.php";
}
function monitoring_page($koneksi) {
    include "./views/guru/monitoring.php";
}
function profil_page($koneksi) {
    include "./views/guru/profil.php";
}
function review_catatan_page($koneksi) {
    include "./views/guru/review_catatan.php";
}


?>