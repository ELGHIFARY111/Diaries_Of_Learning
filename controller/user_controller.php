<?php
require_once "./model/database_admin_user.php"; 
require_once "./model/role.php"; 

function user_index($koneksi) {
    $data = user_get_all($koneksi);
    include "./views/php/dashboard_admin.php";
}
function top_navigasi(){
    $dataMaster= cek_role();
    include "./views/php/navigasiAtas.php";
}
?>