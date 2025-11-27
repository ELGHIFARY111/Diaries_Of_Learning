<?php
require_once "./model/role.php";


function top_navigasi_guru() {
    include "./views/php/navigasi_guru.php";
}

function guru_dashboard_page($koneksi) {
    include "./views/php/guru/dashboard.php";
}

function guru_siswa_page($koneksi) {
    include "./views/php/guru/siswa.php";
}



?>