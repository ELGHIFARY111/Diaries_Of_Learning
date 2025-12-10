<?php
require_once "./model/admin_model.php";
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



function update_profil($koneksi) {
    include "./views/superAdmin/profil.php";
}

function manajemen_misi_global($koneksi) {
    $daftar_misi_global = misi_global_get_all($koneksi);
    include "./views/superAdmin/manajemen_misi_global.php";
}

function tambah_misi_global_page($koneksi) {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        $id_pembuat = $_SESSION['user_id'];
        $judul = $_POST['judul'];
        $deskripsi = $_POST['deskripsi'];
        $target = $_POST['target'];
        $mulai = $_POST['tanggal_mulai'];
        $akhir = $_POST['tanggal_akhir'];

        misi_global_insert($koneksi, $id_pembuat, $judul, $deskripsi, $target, $mulai, $akhir);

        header("Location: index.php?page=manajemen_misi_global");
        exit;
    }

    include "./views/superAdmin/tambah_misi_global.php";
}

function edit_misi_global_page($koneksi) {

    $id = $_GET['id'];
    $data = misi_global_get_by_id($koneksi, $id);

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        misi_global_update(
            $koneksi,
            $id,
            $_POST['judul'],
            $_POST['deskripsi'],
            $_POST['target'],
            $_POST['tanggal_mulai'],
            $_POST['tanggal_akhir']
        );

        header("Location: index.php?page=manajemen_misi_global");
        exit;
    }

    include "./views/superAdmin/edit_misi_global.php";
}

function hapus_misi_global_page($koneksi) {
    $id = $_GET['id'];
    misi_global_delete($koneksi, $id);
    header("Location: index.php?page=manajemen_misi_global");
    exit;
}

function profil_user_page($koneksi) {

    if (!isset($_SESSION['user_id'])) {
        echo "User tidak login!";
        exit;
    }

    $id_user = $_SESSION['user_id'];
    $data_user = user_get_by_id($koneksi, $id_user);

    include "./views/superAdmin/profil.php";
}

function profil_user_update($koneksi) {

    if (!isset($_SESSION['user_id'])) {
        echo "User tidak login!";
        exit;
    }

    $id_user = $_SESSION['user_id'];

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        $nama     = $_POST['nama_lengkap'];
        $username = $_POST['username'];
        $email    = $_POST['email'];

        $status = user_update_profile($koneksi, $id_user, $nama, $username, $email);

        if ($status) {
            echo "<script>alert('Profil berhasil diperbarui!'); 
                  window.location='index.php?page=profil';</script>";
        } else {
            echo "<script>alert('Gagal memperbarui profil!'); 
                  window.history.back();</script>";
        }
    }
}



?>