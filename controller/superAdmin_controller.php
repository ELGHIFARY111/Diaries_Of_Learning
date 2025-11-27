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
    include "./views/superAdmin/institusi/sekolah.php";
}
function institusi_user_index($koneksi)
{
    $result = user_get_all($koneksi);
    include "./views/superAdmin/institusi/user.php";
}

function institusi_sekolah_tambah_page()
{
    include "./views/superAdmin/institusi/sekolah_tambah.php";
}

// function institusi_sekolah_tambah_process($koneksi)
// {
//     $nama = $_POST['nama_sekolah'];
//     $alamat = $_POST['alamat'];

//     sekolah_insert($koneksi, $nama, $alamat);

//     header("Location: index.php?page=institusi/sekolah");
//     exit;
// }

// function institusi_sekolah_edit_page($koneksi)
// {
//     $id = $_GET['id'];
//     $data = sekolah_get_by_id($koneksi, $id);
//     include "./views/superAdmin/institusi/sekolah_edit.php";
// }

// function institusi_sekolah_edit_process($koneksi)
// {
//     $id = $_POST['id'];
//     $nama = $_POST['nama_sekolah'];
//     $alamat = $_POST['alamat'];

//     sekolah_update($koneksi, $id, $nama, $alamat);

//     header("Location: index.php?page=institusi/sekolah");
//     exit;
// }

// function institusi_sekolah_hapus($koneksi)
// {
//     $id = $_GET['id'];
//     sekolah_delete($koneksi, $id);

//     header("Location: index.php?page=institusi/sekolah");
//     exit;
// }

?>