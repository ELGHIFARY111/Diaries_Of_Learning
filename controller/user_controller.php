<?php
require_once "./model/database_admin_user.php"; 

function user_index($koneksi) {
    $data = user_get_all($koneksi);
    include "./views/php/dashboard_admin.php";
}
?>