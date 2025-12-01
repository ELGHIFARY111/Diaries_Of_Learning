<?php
function auth_get_user_by_username($koneksi, $username) {
    $safe_username = mysqli_real_escape_string($koneksi, $username);
    $sql = "SELECT * FROM user WHERE username = '$safe_username'"; 
    $result = mysqli_query($koneksi, $sql);
    return mysqli_fetch_assoc($result);
}

function auth_regist_user($koneksi, $data){
    $username     = mysqli_real_escape_string($koneksi, $data['username']);
    $password_raw = mysqli_real_escape_string($koneksi, $data['password']);
    $nama_lengkap = mysqli_real_escape_string($koneksi, $data['nama_lengkap']);
    $email        = mysqli_real_escape_string($koneksi, $data['email']);
    
    $selected_role = isset($data['user_role_selection']) ? $data['user_role_selection'] : 'siswa';

    $input_nama_sekolah = isset($data['sekolah']) ? mysqli_real_escape_string($koneksi, $data['sekolah']) : '';
    $input_kode_sekolah = isset($data['kode_sekolah']) ? mysqli_real_escape_string($koneksi, $data['kode_sekolah']) : ''; 

    $check = mysqli_query($koneksi, "SELECT id_user FROM user WHERE username='$username' OR email='$email'");
    if (mysqli_num_rows($check) > 0) {
        return "duplicate";
    }

    $password_hash = hash('sha256', $password_raw);
    
    $id_sekolah_fix = "NULL"; 
    $role_user_db = 3;
    if ($selected_role === 'guru') {
        $role_user_db = 2;
    } 
    else {
        $role_user_db = 3;
        if (!empty($input_kode_sekolah)) {
            $q_cek = mysqli_query($koneksi, "SELECT id_sekolah FROM sekolah WHERE kode_sekolah = '$input_kode_sekolah'");
            if ($row = mysqli_fetch_assoc($q_cek)) {
                $id_sekolah_fix = $row['id_sekolah'];
            }
        } 
        elseif (!empty($input_nama_sekolah)) {
            $q_cek = mysqli_query($koneksi, "SELECT id_sekolah FROM sekolah WHERE nama_sekolah = '$input_nama_sekolah'");
            if ($row = mysqli_fetch_assoc($q_cek)) {
                $id_sekolah_fix = $row['id_sekolah'];
            }
        }
    }

    $q_id = mysqli_query($koneksi, "SELECT MAX(id_user) as max_id FROM user");
    $row_id = mysqli_fetch_assoc($q_id);
    $new_id = $row_id['max_id'] + 1;

    $sql = "INSERT INTO user (id_user, id_sekolah, username, password_hash, nama_lengkap, email, role) 
            VALUES ($new_id, $id_sekolah_fix, '$username', '$password_hash', '$nama_lengkap', '$email', $role_user_db)";

    if (mysqli_query($koneksi, $sql)) {
        return true;
    } else {
        return "Error MySQL: " . mysqli_error($koneksi);
    }
}
?>