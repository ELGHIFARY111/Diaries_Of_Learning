<?php
require_once "./model/database_admin_user.php"; 
require_once "./model/role.php"; 


/* ambil data role */
function sekolah_get_all($koneksi)
{
    $query = mysqli_query($koneksi, "SELECT * FROM sekolah ORDER BY id_sekolah DESC");
    $result = [];
    while ($row = mysqli_fetch_assoc($query)) {
        $result[] = $row;
    }
    return $result;
}

function sekolah_insert($koneksi, $nama, $alamat)
{
    mysqli_query($koneksi, "INSERT INTO sekolah (nama_sekolah, alamat) VALUES ('$nama', '$alamat')");
}

function sekolah_get_by_id($koneksi, $id)
{
    $q = mysqli_query($koneksi, "SELECT * FROM sekolah WHERE id_sekolah='$id'");
    return mysqli_fetch_assoc($q);
}

function sekolah_update($koneksi, $id, $nama, $alamat)
{
    mysqli_query($koneksi,
        "UPDATE sekolah 
        SET nama_sekolah='$nama', alamat='$alamat'
        WHERE id_sekolah='$id'"
    );
}

function sekolah_delete($koneksi, $id)
{
    mysqli_query($koneksi, "DELETE FROM sekolah WHERE id_sekolah='$id'");
}






// pemanggilan
function top_navigasi_superadmin(){
    $dataMaster= cek_role();
    include "./views/superAdmin/navigasiAtas.php";
}

function dashboard_admin_page($koneksi) {
    $data = user_get_all($koneksi);
    include "./views/superAdmin/dashboard_admin.php";
}

/* DAFTAR SEKOLAH */
function institusi_sekolah_index($koneksi)
{
    $data_sekolah = sekolah_get_all($koneksi);
    include "./views/superAdmin/institusi/sekolah.php";
}

/* TAMBAH SEKOLAH */
function institusi_sekolah_tambah_page()
{
    include "./views/superAdmin/institusi/sekolah_tambah.php";
}

function institusi_sekolah_tambah_process($koneksi)
{
    $nama = $_POST['nama_sekolah'];
    $alamat = $_POST['alamat'];

    sekolah_insert($koneksi, $nama, $alamat);

    header("Location: index.php?page=institusi/sekolah");
    exit;
}

/* EDIT SEKOLAH */
function institusi_sekolah_edit_page($koneksi)
{
    $id = $_GET['id'];
    $data = sekolah_get_by_id($koneksi, $id);
    include "./views/superAdmin/institusi/sekolah_edit.php";
}

function institusi_sekolah_edit_process($koneksi)
{
    $id = $_POST['id'];
    $nama = $_POST['nama_sekolah'];
    $alamat = $_POST['alamat'];

    sekolah_update($koneksi, $id, $nama, $alamat);

    header("Location: index.php?page=institusi/sekolah");
    exit;
}

/* HAPUS */
function institusi_sekolah_hapus($koneksi)
{
    $id = $_GET['id'];
    sekolah_delete($koneksi, $id);

    header("Location: index.php?page=institusi/sekolah");
    exit;
}

?>