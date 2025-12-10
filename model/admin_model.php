<?php

/* =========================================
   1. DATA MASTER: SEKOLAH
   ========================================= */
function sekolah_get_all($koneksi){
    $sql = "SELECT sekolah.*, user.nama_lengkap
            FROM sekolah
            LEFT JOIN user ON sekolah.id_guru = user.id_user
            ORDER BY id_sekolah DESC";
    $result = mysqli_query($koneksi, $sql);
    if (!$result) return [];
    return mysqli_fetch_all($result, MYSQLI_ASSOC);
}

/* =========================================
   2. DATA MASTER: USER
   ========================================= */
function user_get_all($koneksi, $filter_role = null) {
    $sql = "SELECT user.*, sekolah.nama_sekolah
            FROM user
            LEFT JOIN sekolah ON user.id_sekolah = sekolah.id_sekolah";

    if ($filter_role != null && $filter_role != "") {
        $role_id = (int)$filter_role;
        $sql .= " WHERE user.role = $role_id";
    }

    $sql .= " ORDER BY user.id_user ASC";

    $result = mysqli_query($koneksi, $sql);
    if (!$result) return [];
    return mysqli_fetch_all($result, MYSQLI_ASSOC);
}

function user_get_by_id($koneksi, $id_user) {
    $id_user = (int)$id_user;

    $sql = "SELECT user.*, sekolah.nama_sekolah
            FROM user
            LEFT JOIN sekolah ON user.id_sekolah = sekolah.id_sekolah
            WHERE id_user = $id_user";

    $result = mysqli_query($koneksi, $sql);
    return mysqli_fetch_assoc($result);
}

function user_delete($koneksi, $id) {
    $id = (int)$id;
    $query = "DELETE FROM user WHERE id_user = $id";
    return mysqli_query($koneksi, $query);
}


/* =========================================
   3. DATA MASTER: MISI GLOBAL
   ========================================= */

function misi_global_get_all($koneksi) {
    $sql = "SELECT * FROM misi WHERE kategori='global' ORDER BY id_misi DESC";
    $result = mysqli_query($koneksi, $sql);
    if (!$result) return [];
    return mysqli_fetch_all($result, MYSQLI_ASSOC);
}

function misi_global_get_by_id($koneksi, $id_misi) {
    $id = (int)$id_misi;
    $q = mysqli_query($koneksi, "SELECT * FROM misi WHERE id_misi=$id LIMIT 1");
    return mysqli_fetch_assoc($q);
}



function misi_global_insert($koneksi, $id_pembuat, $judul, $deskripsi, $mulai, $akhir, $kata_target) {

    $judul       = mysqli_real_escape_string($koneksi, $judul);
    $deskripsi   = mysqli_real_escape_string($koneksi, $deskripsi);
    $kata_target = mysqli_real_escape_string($koneksi, $kata_target);

    $sql = "INSERT INTO misi
            (id_pembuat, kategori, judul, deskripsi, tanggal_mulai, tanggal_akhir, kata_target)
            VALUES
            ($id_pembuat, 'global', '$judul', '$deskripsi', '$mulai', '$akhir', '$kata_target')";

    return mysqli_query($koneksi, $sql);
}




function misi_global_update($koneksi, $id_misi, $judul, $deskripsi, $target, $mulai, $akhir) {
    $id         = (int)$id_misi;
    $judul      = mysqli_real_escape_string($koneksi, $judul);
    $deskripsi  = mysqli_real_escape_string($koneksi, $deskripsi);
    $target     = (int)$target;

    $sql = "UPDATE misi SET
            judul='$judul',
            deskripsi='$deskripsi',
            tanggal_mulai='$mulai',
            tanggal_akhir='$akhir',
            target_jumlah_kata=$target
            WHERE id_misi=$id";

    return mysqli_query($koneksi, $sql);
}

function misi_global_delete($koneksi, $id_misi) {
    $id = (int)$id_misi;
    return mysqli_query($koneksi, "DELETE FROM misi WHERE id_misi=$id");
}



function user_update_profile($koneksi, $id_user, $nama, $username, $email) {
    $id_user = (int)$id_user;

    $nama     = mysqli_real_escape_string($koneksi, $nama);
    $username = mysqli_real_escape_string($koneksi, $username);
    $email    = mysqli_real_escape_string($koneksi, $email);

    $sql = "UPDATE user SET
            nama_lengkap = '$nama',
            username = '$username',
            email = '$email'
            WHERE id_user = $id_user";

    return mysqli_query($koneksi, $sql);
}

function dashboard_total_user($koneksi) {
    $sql = "SELECT COUNT(*) AS total FROM user";
    $result = mysqli_query($koneksi, $sql);
    return mysqli_fetch_assoc($result)['total'];
}

function dashboard_total_catatan($koneksi) {
    $sql = "SELECT COUNT(*) AS total FROM catatan"; 
    $result = mysqli_query($koneksi, $sql);
    return mysqli_fetch_assoc($result)['total'];
}

function dashboard_event_global($koneksi) {
    $sql = "SELECT * FROM misi 
            WHERE kategori='global' 
            AND tanggal_akhir >= CURDATE()
            ORDER BY id_misi DESC";

    $result = mysqli_query($koneksi, $sql);
    return mysqli_fetch_all($result, MYSQLI_ASSOC);
}

function dashboard_user_baru($koneksi) {

    // cek apakah kolom created_at ada di tabel user
    $check = mysqli_query($koneksi, "SHOW COLUMNS FROM user LIKE 'created_at'");
    $has_created_at = mysqli_num_rows($check) > 0;

    // kalau ada → pakai created_at
    if ($has_created_at) {
        $sql = "SELECT * FROM user ORDER BY created_at DESC LIMIT 5";
    } else {
        // fallback: ambil berdasarkan id terbaru
        $sql = "SELECT * FROM user ORDER BY id_user DESC LIMIT 5";
    }

    $result = mysqli_query($koneksi, $sql);

    if (!$result) return [];
    return mysqli_fetch_all($result, MYSQLI_ASSOC);
}

function user_get_all_filtered($koneksi, $filter_role = '') {
    if ($filter_role != '') {
        $query = "SELECT u.*, s.nama_sekolah 
                  FROM users u
                  LEFT JOIN sekolah s ON u.id_sekolah = s.id_sekolah
                  WHERE role = '$filter_role'
                  ORDER BY id_user DESC";
    } else {
        $query = "SELECT u.*, s.nama_sekolah 
                  FROM users u
                  LEFT JOIN sekolah s ON u.id_sekolah = s.id_sekolah
                  ORDER BY id_user DESC";
    }

    $result = mysqli_query($koneksi, $query);

    if (!$result) return [];

    return mysqli_fetch_all($result, MYSQLI_ASSOC);
}

function proses_edit_sekolah_page($koneksi) {
    if ($_SERVER['REQUEST_METHOD'] !== 'POST') return;

    $id     = $_POST['id_sekolah'];
    $nama   = $_POST['nama_sekolah'];
    $alamat = $_POST['alamat'];
    $guru   = $_POST['id_guru'];
    $kode   = $_POST['kode_sekolah'];

    $sql = "UPDATE sekolah SET 
            nama_sekolah='$nama',
            alamat='$alamat',
            id_guru='$guru',
            kode_sekolah='$kode'
            WHERE id_sekolah=$id";

    mysqli_query($koneksi, $sql);

    header("Location: index.php?page=institusi/sekolah&status=updated");
    exit;
}


// models/admin_model.php

// Ambil data profil berdasarkan ID
function profil_ambil_data($koneksi, $id_user) {
    $id = mysqli_real_escape_string($koneksi, $id_user);
    $sql = "SELECT * FROM user WHERE id_user = '$id'";
    $result = mysqli_query($koneksi, $sql);
    return mysqli_fetch_assoc($result);
}

// Jalankan query update data
function profil_eksekusi_update($koneksi, $id_user, $data, $password_baru = null) {
    $id = mysqli_real_escape_string($koneksi, $id_user);
    $nama = mysqli_real_escape_string($koneksi, $data['nama_lengkap']);
    $user = mysqli_real_escape_string($koneksi, $data['username']);
    $mail = mysqli_real_escape_string($koneksi, $data['email']);

    if (!empty($password_baru)) {
        // Jika ganti password
        $pass_fix = password_hash($password_baru, PASSWORD_DEFAULT);
        $sql = "UPDATE user SET nama_lengkap='$nama', username='$user', email='$mail', password='$pass_fix' WHERE id_user='$id'";
    } else {
        // Jika tidak ganti password
        $sql = "UPDATE user SET nama_lengkap='$nama', username='$user', email='$mail' WHERE id_user='$id'";
    }

    return mysqli_query($koneksi, $sql);
}


?>
