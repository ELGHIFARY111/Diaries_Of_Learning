<?php

function navigasi_murid() {
    include "./views/murid/navigasiMurid.php";
}
function murid_dashboard_page($koneksi) {
    include "./views/murid/homeMurid.php";
}
function catatan_murid_page($koneksi) {
    include "./views/murid/catatanMurid.php";
}
function kosakata_murid_page($koneksi) {
    include "./views/murid/kosakataMurid.php";
}
function misi_murid_page($koneksi) {
    include "./views/murid/misiMurid.php";
}


?>