<?php

function navigasi_murid() {
    $active = $_GET['active'] ?? 'aktif';
    include "./views/murid/navigasiMurid.php";
}

function murid_dashboard_page($koneksi) {
    $active = $_GET['active'] ?? 'aktif';
    $id_user = $_SESSION['user_id'];
    $nama_lengkap = $_SESSION['nama_lengkap'] ?? 'Murid';

    $query_catatan = mysqli_query($koneksi, "SELECT COUNT(*) as total FROM catatan WHERE id_user = '$id_user'");
    $row_catatan = mysqli_fetch_assoc($query_catatan);
    $total_catatan = $row_catatan['total'];

    $query_kosakata = mysqli_query($koneksi, "SELECT COUNT(*) as total FROM kosakata WHERE id_user = '$id_user'");
    $row_kosakata = mysqli_fetch_assoc($query_kosakata);
    $total_kosakata = $row_kosakata['total'];

    $query_poin = mysqli_query($koneksi, "SELECT SUM(nilai) as total FROM progres WHERE id_user = '$id_user'");
    $row_poin = mysqli_fetch_assoc($query_poin);
    $total_poin = $row_poin['total'] ?? 0;

    $query_user = mysqli_query($koneksi, "SELECT id_sekolah FROM user WHERE id_user = '$id_user'");
    $user_data = mysqli_fetch_assoc($query_user);
    $id_sekolah = $user_data['id_sekolah'];

    $misi_aktif = null;
    $progres_misi = 0;

    if ($id_sekolah) {
        $query_misi = mysqli_query($koneksi, "SELECT * FROM misi WHERE id_sekolah = '$id_sekolah' AND (tanggal_akhir >= CURDATE() OR tanggal_akhir IS NULL) ORDER BY tanggal_mulai DESC LIMIT 1");
        if (mysqli_num_rows($query_misi) > 0) {
            $misi_aktif = mysqli_fetch_assoc($query_misi);
            
            $query_prog_misi = mysqli_query($koneksi, "SELECT nilai FROM progres WHERE id_user = '$id_user' AND jenis_progres = 'misi' ORDER BY tanggal_update DESC LIMIT 1");
            if(mysqli_num_rows($query_prog_misi) > 0){
                $d = mysqli_fetch_assoc($query_prog_misi);
                $progres_misi = $d['nilai'];
            }
        }
    }

    $recent_activities = [];
    $query_activity = mysqli_query($koneksi, "SELECT judul, tipe, tanggal_catatan FROM catatan WHERE id_user = '$id_user' ORDER BY tanggal_catatan DESC LIMIT 2");
    while($row = mysqli_fetch_assoc($query_activity)){
        $recent_activities[] = $row;
    }

    include "./views/murid/homeMurid.php";
}

function catatan_murid_page($koneksi) {
    $active = $_GET['active'] ?? 'aktif';
    include "./views/murid/catatanMurid.php";
}
function kosakata_murid_page($koneksi) {
    $active = $_GET['active'] ?? 'aktif';
    include "./views/murid/kosakataMurid.php";
}
function misi_murid_page($koneksi) {
    $active = $_GET['active'] ?? 'aktif';
    include "./views/murid/misiMurid.php";
}
function kerjakan_misi_murid_page($koneksi) {
    $active = $_GET['active'] ?? 'aktif';
    include "./views/murid/kerjakanMisiMurid.php";
}
function profil_murid_page($koneksi) {
    $active = $_GET['active'] ?? 'aktif';
    include "./views/murid/profilMurid.php";
}
function leaderboard_murid_page($koneksi) {
    $id_guru = $_SESSION['user_id'];
    $data_guru = cari_data_guru($koneksi, $id_guru);
    $id_sekolah = $data_guru['id_sekolah'];

    $scope  = $_GET['scope'] ?? 'school';
    $time   = $_GET['time'] ?? 'all';
    $search = $_GET['search'] ?? '';

    $leaderboard_data = ambil_leaderboard($koneksi, $id_sekolah, $scope, $time, $search);

    include "./views/murid/leaderboard.php";
}
?>