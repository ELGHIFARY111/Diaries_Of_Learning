<?php
require_once "./model/admin_model.php";
require_once "./model/role.php"; 

function top_navigasi_superadmin(){
    $dataMaster= cek_role();
    include "./views/superAdmin/navigasiAtas.php";
}



function institusi_sekolah_index($koneksi)
{
    $data_sekolah = sekolah_get_all($koneksi);
    $no=1;
    include "./views/superAdmin/institusi/sekolah.php";
}





function update_profil($koneksi) {
    include "./views/superAdmin/profil.php";
}

function manajemen_misi_global($koneksi) {
    $daftar_misi_global = misi_global_get_all($koneksi);
    include "./views/superAdmin/manajemen_misi_global.php";
}

function tambah_misi_global_page($koneksi) {
    include "./views/superAdmin/tambah_misi_global.php";
}

function proses_tambah_misi_global($koneksi) {

    if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
        header("Location: index.php?page=tambah_misi_global");
        exit;
    }

    $id_pembuat  = $_SESSION['user_id'];
    $judul       = trim($_POST['judul']);
    $deskripsi   = trim($_POST['deskripsi']);
    $mulai       = $_POST['tanggal_mulai'];
    $akhir       = $_POST['tanggal_akhir'];
    $kata_target = trim($_POST['kata_target']);

    if ($judul === "" || $mulai === "" || $akhir === "" || $kata_target === "") {
        echo "<script>alert('Semua field wajib diisi'); history.back();</script>";
        exit;
    }

    $insert = misi_global_insert(
        $koneksi,
        $id_pembuat,
        $judul,
        $deskripsi,
        $mulai,
        $akhir,
        $kata_target
    );

    if (!$insert) {
        echo "<h3>Query gagal:</h3><pre>" . mysqli_error($koneksi) . "</pre>";
        exit;
    }

    header("Location: index.php?page=manajemen_misi_global&success=1");
    exit;
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

function dashboard_admin_page($koneksi) {

    $total_user    = dashboard_total_user($koneksi);
    $total_catatan = dashboard_total_catatan($koneksi);
    $event_global  = dashboard_event_global($koneksi);
    $user_baru     = dashboard_user_baru($koneksi);

    $event_aktif = count($event_global);

    include "./views/superAdmin/dashboard_admin.php";
}

function institusi_user_index($koneksi) {
    $filter = isset($_GET['filter_role']) ? $_GET['filter_role'] : null;
    $data_user = user_get_all($koneksi, $filter);
    include "./views/superAdmin/institusi/user.php";
}

function institusi_user_detail($koneksi) {
    if (!isset($_GET['id'])) {
        echo "ID user tidak ditemukan!";
        return;
    }

    $id = $_GET['id'];
    $data_user = user_get_by_id($koneksi, $id);

    include "./views/superAdmin/institusi/detail_user.php";
}

function institusi_user_hapus($koneksi) {
    if (!isset($_GET['id'])) {
        echo "ID tidak ditemukan!";
        return;
    }

    $id = $_GET['id'];
    user_delete($koneksi, $id);

    header("Location: index.php?page=institusi/user&status=deleted");
    exit;
}

function edit_sekolah($koneksi) {
    if (!isset($_GET['id'])) {
        echo "ID sekolah tidak ditemukan!";
        return;
    }

    $id = (int)$_GET['id'];

    $data_sekolah = mysqli_fetch_assoc(
        mysqli_query($koneksi, "SELECT * FROM sekolah WHERE id_sekolah = $id")
    );

    // Ambil semua guru (role 2)
    $data_guru = user_get_all($koneksi, 2);

    include "./views/superAdmin/institusi/edit_sekolah.php";
}



// controllers/admin_controller.php

// Controller tampil profil
function controller_tampil_profil($koneksi) {
    $id_user = $_SESSION['user_id'];
    
    // Panggil Model
    $data_user = profil_ambil_data($koneksi, $id_user);

    // Kirim ke View
    include "./views/superAdmin/profil.php";
}

// Controller tampil form edit
function controller_tampil_edit($koneksi) {
    $id_user = $_SESSION['user_id'];
    
    // Panggil Model
    $data_user = profil_ambil_data($koneksi, $id_user);

    // Kirim ke View Form
    include "./views/superAdmin/edit_profil.php";
}

// Controller proses simpan
function controller_proses_update($koneksi) {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $id_user = $_SESSION['user_id'];
        
        // Data dari form
        $data_form = [
            'nama_lengkap' => $_POST['nama_lengkap'],
            'username' => $_POST['username'],
            'email' => $_POST['email']
        ];
        $password_baru = $_POST['password_baru'];

        // Panggil Model untuk Update
        $simpan = profil_eksekusi_update($koneksi, $id_user, $data_form, $password_baru);

        if ($simpan) {
            $_SESSION['user_nama'] = $_POST['nama_lengkap']; // Update nama di sidebar
            header("Location: index.php?page=profil&status=sukses");
            exit();
        } else {
            die("Error update database.");
        }
    }
}

?>