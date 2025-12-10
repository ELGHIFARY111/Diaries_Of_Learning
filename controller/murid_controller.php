<?php
require_once "./model/murid_model.php";
require_once "./model/global_model.php";

function navigasi_murid($koneksi) {
    $active = $_GET['active'] ?? 'aktif';
    $id_guru = $_SESSION['user_id'] ?? 0; 
    $data_guru      = cari_data_murid($koneksi, $id_guru);
    $id_sekolah     = $data_guru['id_sekolah'] ?? 0;
    $nama_guru      = $data_guru['nama_lengkap'] ?? 'Guest';
    $nama_sekolah   = $data_guru['nama_sekolah'] ?? 'Belum ada sekolah';
    include "./views/murid/navigasiMurid.php";
}

function murid_dashboard_page($koneksi) {
    $active = $_GET['active'] ?? 'aktif';
    $id_user = $_SESSION['user_id'] ?? null;
    $nama_lengkap = $_SESSION['nama_lengkap'] ?? 'Murid';

    if (!$id_user) {
        header("Location: index.php?page=login");
        exit;
    }
    $total_catatan = hitung_total_catatan($koneksi, $id_user);
    $total_kosakata = hitung_total_kosakata($koneksi, $id_user);
    $total_poin = hitung_total_poin($koneksi, $id_user);
    $misi_aktif = null;
    $progres_misi = 0;
    
    $id_sekolah = ambil_id_sekolah_murid($koneksi, $id_user);

    if ($id_sekolah) {
        $misi_aktif = ambil_misi_aktif_terbaru($koneksi, $id_sekolah);
        
        if ($misi_aktif) {
            $progres_misi = ambil_progres_misi_terakhir($koneksi, $id_user);
        }
    }

    $recent_activities = ambil_aktivitas_terbaru($koneksi, $id_user);

    include "./views/murid/homeMurid.php";
}
function catatan_murid_page($koneksi) {
    $id_user = $_SESSION['user_id'] ?? $_SESSION['id_user'];

    // Ambil semua catatan
    $daftar_catatan = ambil_semua_catatan($koneksi, $id_user);

    // Tampilkan View List
    include "./views/murid/catatanMurid.php";
}

function tambah_catatan_page($koneksi) {
    $id_user = $_SESSION['user_id'] ?? $_SESSION['id_user'];
    $id_sekolah = ambil_id_sekolah_murid($koneksi, $id_user);

    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['simpan_catatan'])) {
        $judul = $_POST['judul'];
        $isi   = $_POST['isi'];

        if (!empty($judul) && !empty($isi)) {
            if (simpan_catatan_murid($koneksi, $id_user, $judul, $isi)) {
                hitung_progres_misi_spesifik($koneksi, $id_user, $id_sekolah);

                echo "<script>
                        alert('Catatan berhasil disimpan!'); 
                        window.location.href='index.php?page=murid/catatanMurid';
                      </script>";
                exit;
            } else {
                echo "<script>alert('Gagal menyimpan.');</script>";
            }
        }
    }

    include "./views/murid/tambahCatatan.php";
}

function kosakata_murid_page($koneksi) {
    $active = $_GET['active'] ?? 'aktif';
    $id_user = $_SESSION['user_id'] ?? $_SESSION['id_user']; 

    $q_user = mysqli_query($koneksi, "SELECT id_sekolah FROM user WHERE id_user='$id_user'");
    $d_user = mysqli_fetch_assoc($q_user);
    $id_sekolah = $d_user['id_sekolah'] ?? 0;

    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['simpan_kata'])) {
        $data_baru = [
            'id_user' => $id_user,
            'kata_inggris' => $_POST['kata_inggris'],
            'arti' => $_POST['arti'],
            'contoh' => $_POST['contoh']
        ];

        if (tambah_kosakata_murid($koneksi, $data_baru)) {
            hitung_progres_misi_spesifik($koneksi, $id_user, $id_sekolah);

            echo "<script>alert('Berhasil menambah kosakata! Progres misi diperbarui.'); window.location.href='index.php?page=murid/kosakataMurid';</script>";
            exit;
        } else {
            echo "<script>alert('Gagal menambah data.');</script>";
        }
    }

    $keyword = $_GET['search'] ?? '';
    $result_kosakata = ambil_kosakata_murid($koneksi, $id_user, $keyword);
    $daftar_kosakata = [];
    if ($result_kosakata) {
        while($row = mysqli_fetch_assoc($result_kosakata)) { $daftar_kosakata[] = $row; }
    }

    include "./views/murid/kosakataMurid.php";
}
function misi_murid_page($koneksi) {
    $active = $_GET['active'] ?? 'aktif';
    $id_user = $_SESSION['user_id'] ?? $_SESSION['id_user'];
    $id_sekolah = ambil_id_sekolah_murid($koneksi, $id_user);

    $query_misi = mysqli_query($koneksi, "SELECT * FROM misi WHERE kategori='global' OR (kategori='sekolah' AND id_sekolah='$id_sekolah') ORDER BY id_misi DESC");
    
    $daftar_misi = [];
    while ($misi = mysqli_fetch_assoc($query_misi)) {
        
        $id_misi = $misi['id_misi'];
        $q_progres = mysqli_query($koneksi, "SELECT nilai FROM progres WHERE id_user='$id_user' AND id_misi='$id_misi'");
        
        $persen = 0;
        if (mysqli_num_rows($q_progres) > 0) {
            $data_progres = mysqli_fetch_assoc($q_progres);
            $persen = $data_progres['nilai'];
        }
        $misi['persentase_saya'] = $persen; 
        
        $daftar_misi[] = $misi;
    }

    include "./views/murid/misiMurid.php";
}

function kerjakan_misi_murid_page($koneksi) {
    $active = $_GET['active'] ?? 'aktif';
    $id_user = $_SESSION['user_id'] ?? $_SESSION['id_user'];
    $id_misi = $_GET['id'] ?? 0;

    if ($id_misi == 0) {
        header("Location: index.php?page=murid/misiMurid");
        exit;
    }

    $q_misi = mysqli_query($koneksi, "SELECT * FROM misi WHERE id_misi='$id_misi'");
    $info_misi = mysqli_fetch_assoc($q_misi);

    $list_kata_mentah = ambil_list_kata_target_murid($koneksi, $id_misi);

    $checklist = [];
    foreach ($list_kata_mentah as $kata) {
        $status = cek_status_kata($koneksi, $id_user, $kata);
        
        $checklist[] = [
            'kata'   => $kata,
            'status' => $status
        ];
    }
    $total = count($checklist);
    $sudah = 0;
    foreach($checklist as $c) { if($c['status']) $sudah++; }
    $persen = ($total > 0) ? round(($sudah/$total)*100) : 0;

    include "./views/murid/kerjakanMisiMurid.php";
}

// === BAGIAN PERBAIKAN PROFIL ===

function profil_murid_page($koneksi) {
    $active = 'profil'; 
    $id_user = $_SESSION['user_id'] ?? $_SESSION['id_user'];
    
    // Ambil data murid
    $data_murid = cari_data_murid($koneksi, $id_user);

    // Cek jika data tidak ditemukan (misal session habis), kembalikan ke login
    if (!$data_murid) {
        header("Location: index.php?page=login");
        exit;
    }
    
    $nama_sekolah = $data_murid['nama_sekolah'] ?? 'Belum Terdaftar';
    $kode_sekolah = $data_murid['kode_sekolah'] ?? '-';

    $is_edit_mode = (isset($_GET['mode']) && $_GET['mode'] == 'edit');

    include "./views/murid/profilMurid.php";
}

function proses_update_profil_murid($koneksi) {
    $id_user = $_SESSION['user_id'] ?? $_SESSION['id_user'];
    
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $data = [
            'id_user'  => $id_user,
            'nama'     => $_POST['nama'],
            'username' => $_POST['username'],
            'email'    => $_POST['email'],
            'password' => $_POST['password']
        ];

        if (update_profil_murid($koneksi, $data)) {
            $_SESSION['nama_lengkap'] = $_POST['nama'];
            echo "<script>alert('Profil berhasil diperbarui!'); window.location.href='index.php?page=murid/profilMurid&status=sukses';</script>";
        } else {
            echo "<script>alert('Gagal update. Username/Email mungkin sudah ada.'); window.location.href='index.php?page=murid/profilMurid&mode=edit&status=gagal';</script>";
        }
    }
}

function edit_profil_murid_page($koneksi) {
    $_GET['mode'] = 'edit';
    profil_murid_page($koneksi);
}



function leaderboard_murid_page($koneksi) {
    $id_user = $_SESSION['user_id'];
    $data_murid = cari_data_murid($koneksi, $id_user);
    $id_sekolah = $data_murid['id_sekolah'] ?? 0;

    $scope  = $_GET['scope'] ?? 'school';
    $time   = $_GET['time'] ?? 'all';
    $search = $_GET['search'] ?? '';

    if (function_exists('ambil_leaderboard')) {
        $leaderboard_data = ambil_leaderboard_murid($koneksi, $id_sekolah, $scope, $time, $search);
    } else {
        $leaderboard_data = []; 
    }

    include "./views/murid/leaderboard.php";
}

function edit_catatan_page($koneksi) {
    $id_user = $_SESSION['user_id'] ?? $_SESSION['id_user'];
    $id_catatan = $_GET['id'] ?? 0;

    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update_catatan'])) {
        $judul = $_POST['judul'];
        $isi   = $_POST['isi'];

        if (update_catatan_murid($koneksi, $id_catatan, $id_user, $judul, $isi)) {
            $id_sekolah = ambil_id_sekolah_murid($koneksi, $id_user);
            hitung_progres_misi_spesifik($koneksi, $id_user, $id_sekolah);

            echo "<script>
                    alert('Catatan berhasil diperbarui!'); 
                    window.location.href='index.php?page=murid/catatanMurid';
                  </script>";
            exit;
        } else {
            echo "<script>alert('Gagal mengupdate catatan.');</script>";
        }
    }

    $catatan = ambil_satu_catatan($koneksi, $id_catatan, $id_user);

    if (!$catatan) {
        echo "<script>alert('Catatan tidak ditemukan!'); window.location.href='index.php?page=murid/catatanMurid';</script>";
        exit;
    }

    include "./views/murid/editCatatan.php";
}
?>