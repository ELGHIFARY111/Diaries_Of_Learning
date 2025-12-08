<?php
require_once "./model/role.php";
require_once "./model/guru_model.php";


function navigasi_guru($koneksi) {
    $active = $_GET['active'] ?? 'aktif';
    $id_guru = $_SESSION['user_id'] ?? 0; 
    $data_guru      = cari_data_guru($koneksi, $id_guru);
    $id_sekolah     = $data_guru['id_sekolah'] ?? 0;
    $nama_guru      = $data_guru['nama_lengkap'] ?? 'Guest';
    $nama_sekolah   = $data_guru['nama_sekolah'] ?? 'Belum ada sekolah';
    include "./views/guru/navigasiGuru.php";
}

function guru_dashboard_page($koneksi) {
    $active = $_GET['active'] ?? 'aktif';
    $id_guru = $_SESSION['user_id'] ?? 0; 

    $data_guru      = cari_data_guru($koneksi, $id_guru);
    
    $id_sekolah     = $data_guru['id_sekolah'] ?? 0;
    $nama_guru      = $data_guru['nama_lengkap'] ?? 'Guest';
    $nama_sekolah   = $data_guru['nama_sekolah'] ?? 'Belum ada sekolah';

    $total_siswa    = hitung_total_siswa($koneksi, $id_sekolah);
    $total_pending  = hitung_catatan_pending($koneksi, $id_sekolah);
    $total_misi     = hitung_misi_aktif($koneksi, $id_sekolah);
    
    $list_progres   = ambil_progres_terbaru($koneksi, $id_sekolah);
    $list_catatan   = ambil_catatan_terbaru($koneksi, $id_sekolah);
    include "./views/guru/dashboard_guru.php";
}
function laporan_progres_page($koneksi) {
    if (!isset($_SESSION['user_id'])) {
        header("Location: index.php?page=login");
        exit;
    }

    $id_guru = $_SESSION['user_id'];
    
    $data_guru = cari_data_guru($koneksi, $id_guru);
    $id_sekolah = $data_guru['id_sekolah'];

    $stats = ambil_statistik_laporan_sekolah($koneksi, $id_sekolah);

    include "./views/guru/laporan_progres.php";
}

function monitoring_page($koneksi) {
    $id_guru = $_SESSION['user_id']; 
    $data_guru = cari_data_guru($koneksi, $id_guru);

    $id_sekolah   = $data_guru['id_sekolah'] ?? 0;
    $nama_sekolah = $data_guru['nama_sekolah'] ?? '';
    $kode_sekolah = $data_guru['kode_sekolah'] ?? '-';
    $total_siswa    = hitung_total_siswa($koneksi, $id_sekolah);
    $total_pending  = hitung_catatan_pending($koneksi, $id_sekolah);
    $keyword = '';
    if (isset($_GET['cari'])) {
        $keyword = mysqli_real_escape_string($koneksi, $_GET['cari']);
    }
    $daftar_siswa = ambil_daftar_siswa($koneksi, $id_sekolah, $keyword);
    $active = $_GET['active'] ?? 'aktif';

    include "./views/guru/monitoring.php";
}
function form_tambah_sekolah_page($koneksi) {
    $id_guru = $_SESSION['user_id'];
    $data_guru = cari_data_guru($koneksi, $id_guru);
    
    if (!empty($data_guru['id_sekolah'])) {
        header("Location: index.php?page=guru/monitoring");
        exit;
    }
    $active = $_GET['active'] ?? 'aktif';
    
    include "./views/guru/tambah_sekolah.php";
}

function proses_tambah_sekolah($koneksi) {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        
        $id_guru = $_SESSION['user_id']; 

        $nama_sekolah = mysqli_real_escape_string($koneksi, $_POST['nama_sekolah']);
        $alamat = mysqli_real_escape_string($koneksi, $_POST['alamat']);
        $berhasil = tambah_sekolah_baru($koneksi, $id_guru, $nama_sekolah, $alamat);
        
        if ($berhasil) {
            $data_terbaru = cari_data_guru($koneksi, $id_guru);
            $_SESSION['id_sekolah'] = $data_terbaru['id_sekolah'];

                header('Location: index.php?page=guru/monitoring');
        } else {
            echo "<script>
                    alert('Gagal membuat sekolah atau update akun guru.'); 
                    window.location='index.php?page=guru/tambah_sekolah';
                    </script>";
        }
    }
}

function detail_sekolah_page($koneksi) {
    $id_guru = $_SESSION['user_id']; 
    $active = $_GET['active'] ?? 'aktif';

    $data_guru = cari_data_guru($koneksi, $id_guru);
    if (empty($data_guru['id_sekolah']) || $data_guru['id_sekolah'] == 0) {
        echo "<script>alert('Anda belum memiliki sekolah!'); window.location='index.php?page=guru/monitoring';</script>";
        exit;
    }

    $id_sekolah = $data_guru['id_sekolah'];
    $info_sekolah = ambil_detail_sekolah($koneksi, $id_sekolah);
    $list_guru = ambil_rekan_guru($koneksi, $id_sekolah);
    $total_siswa = hitung_total_siswa($koneksi, $id_sekolah);
    include "./views/guru/detail_sekolah.php";
}
function edit_sekolah_page($koneksi) {
    $id_guru = $_SESSION['user_id'];
    $active = $_GET['active'] ?? 'aktif';

    $data_guru = cari_data_guru($koneksi, $id_guru);
    if (empty($data_guru['id_sekolah']) || $data_guru['id_sekolah'] == '0') {
        echo "<script>alert('Sekolah tidak ditemukan!'); window.location='index.php?page=guru/monitoring';</script>";
        exit;
    }

    $id_sekolah = $data_guru['id_sekolah'];
    $info_sekolah = ambil_detail_sekolah($koneksi, $id_sekolah);

    include "./views/guru/edit_sekolah.php";
}
function proses_edit_sekolah($koneksi) {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $id_guru = $_SESSION['user_id'];
        $data_guru = cari_data_guru($koneksi, $id_guru);
        $id_sekolah = $data_guru['id_sekolah'];
        $nama_sekolah = mysqli_real_escape_string($koneksi, $_POST['nama_sekolah']);
        $alamat       = mysqli_real_escape_string($koneksi, $_POST['alamat']);
        $berhasil = update_data_sekolah($koneksi, $id_sekolah, $nama_sekolah, $alamat);

        if ($berhasil) {
            echo "<script>
                    alert('Data sekolah berhasil diperbarui!'); 
                    window.location='index.php?page=guru/detail_sekolah';
                    </script>";
        } else {
            echo "<script>
                    alert('Gagal mengupdate data.'); 
                    window.location='index.php?page=guru/edit_sekolah';
                    </script>";
        }
    }
}
function detail_siswa_page($koneksi) {
    $id_guru = $_SESSION['user_id'];
    $id_siswa = $_GET['id'] ?? 0;
    $active = $_GET['active'] ?? 'aktif';

    $data_guru = cari_data_guru($koneksi, $id_guru);
    $id_sekolah = $data_guru['id_sekolah'];

    $query_siswa = "SELECT * FROM user WHERE id_user = '$id_siswa' AND id_sekolah = '$id_sekolah' AND role = '3'";
    $result_siswa = mysqli_query($koneksi, $query_siswa);

    if (mysqli_num_rows($result_siswa) == 0) {
        echo "<script>alert('Siswa tidak ditemukan atau bukan dari sekolah Anda.'); window.location='index.php?page=guru/monitoring';</script>";
        exit;
    }
    $siswa = mysqli_fetch_assoc($result_siswa);


    $q_catatan = "SELECT COUNT(*) as total FROM catatan WHERE id_user = '$id_siswa'";
    $r_catatan = mysqli_query($koneksi, $q_catatan);
    $total_catatan = mysqli_fetch_assoc($r_catatan)['total'];

    $q_kosakata = "SELECT COUNT(*) as total FROM kosakata WHERE id_user = '$id_siswa'";
    $r_kosakata = mysqli_query($koneksi, $q_kosakata);
    $total_kosakata = mysqli_fetch_assoc($r_kosakata)['total'];

    $q_nilai = "SELECT nilai FROM progres WHERE id_user = '$id_siswa' AND jenis_progres = 'menulis'";
    $r_nilai = mysqli_query($koneksi, $q_nilai);
    $data_nilai = mysqli_fetch_assoc($r_nilai);
    $nilai_menulis = $data_nilai['nilai'] ?? 0;
    $q_riwayat = "SELECT * FROM catatan WHERE id_user = '$id_siswa' ORDER BY tanggal_catatan DESC LIMIT 10";
    $riwayat_catatan = mysqli_query($koneksi, $q_riwayat);

    include "./views/guru/detail_siswa.php";
}
function profil_page($koneksi) {
    $id_guru = $_SESSION['user_id'];
    
    $is_edit_mode = isset($_GET['mode']) && $_GET['mode'] == 'edit';

    $data_guru = cari_data_guru($koneksi, $id_guru);
    
    $nama_sekolah = $data_guru['nama_sekolah'] ?? 'Belum bergabung sekolah';
    $kode_sekolah = $data_guru['kode_sekolah'] ?? '-';
    $id_sekolah   = $data_guru['id_sekolah'] ?? 0;

    include "./views/guru/profil.php";
}

function proses_update_profil($koneksi) {
    $id_guru  = $_SESSION['user_id'];
    $nama     = $_POST['nama_lengkap'];
    $username = $_POST['username'];
    $email    = $_POST['email'];
    $password = $_POST['password'];

    if (update_profil_guru($koneksi, $id_guru, $nama, $username, $email, $password)) {
        header("Location: index.php?page=guru/profil&status=sukses");
    } else {
        header("Location: index.php?page=guru/profil&status=gagal");
    }
}
function review_catatan_page($koneksi) {
    $id_guru = $_SESSION['user_id'];
    
    $data_guru = cari_data_guru($koneksi, $id_guru);
    $id_sekolah = $data_guru['id_sekolah'];

    $filter_status = $_GET['status'] ?? 'pending';
    $filter_tipe = $_GET['tipe'] ?? 'all';

    $daftar_catatan = ambil_catatan_siswa_sekolah($koneksi, $id_sekolah, $filter_status, $filter_tipe);
    $total_data = mysqli_num_rows($daftar_catatan);

    include "./views/guru/review_catatan.php";
}

function proses_tandai_review($koneksi) {
    $id_catatan = $_GET['id'];
    
    if (tandai_sudah_review($koneksi, $id_catatan)) {
        echo "<script>
            alert('Catatan berhasil ditandai sudah dibaca!');
            window.location='index.php?page=guru/review_catatan&status=pending'; 
        </script>";
    } else {
        echo "<script>alert('Gagal memproses data.'); window.history.back();</script>";
    }
}
// misi kosakata
function misi_kosakata_page($koneksi) {
    $id_guru = $_SESSION['user_id'];
    $data_guru = cari_data_guru($koneksi, $id_guru);
    if (empty($data_guru['id_sekolah']) || $data_guru['id_sekolah'] == '0') {
        echo "<script>alert('Anda harus memiliki sekolah dulu untuk membuat misi!'); window.location='index.php?page=guru/tambah_sekolah';</script>";
        exit;
    }

    $id_sekolah = $data_guru['id_sekolah'];
    $daftar_misi = ambil_daftar_misi($koneksi, $id_sekolah);

    include "./views/guru/misi_kosakata.php";
}

function form_tambah_misi_page($koneksi) {
    include "./views/guru/tambah_misi.php";
}

function proses_tambah_misi($koneksi) {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $id_guru = $_SESSION['user_id'];
        $data_guru = cari_data_guru($koneksi, $id_guru);

        $data = [
            'id_sekolah' => $data_guru['id_sekolah'],
            'id_pembuat' => $id_guru,
            'judul'      => mysqli_real_escape_string($koneksi, $_POST['judul']),
            'deskripsi'  => mysqli_real_escape_string($koneksi, $_POST['deskripsi']),
            'tanggal_mulai' => $_POST['tanggal_mulai'],
            'tanggal_akhir' => $_POST['tanggal_akhir'],
            'target_jumlah_kata' => $_POST['target']
        ];

        if (tambah_misi($koneksi, $data)) {
            echo "<script>alert('Misi berhasil dibuat!'); window.location='index.php?page=guru/misi_kosakata';</script>";
        } else {
            echo "<script>alert('Gagal membuat misi.'); window.location='index.php?page=guru/tambah_misi';</script>";
        }
    }
}

function form_edit_misi_page($koneksi) {
    $id_misi = $_GET['id'];
    $misi = ambil_detail_misi($koneksi, $id_misi);
    include "./views/guru/edit_misi.php";
}
function proses_edit_misi($koneksi) {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $id_misi = $_POST['id_misi'];
        $data = [
            'judul'      => mysqli_real_escape_string($koneksi, $_POST['judul']),
            'deskripsi'  => mysqli_real_escape_string($koneksi, $_POST['deskripsi']),
            'tanggal_mulai' => $_POST['tanggal_mulai'],
            'tanggal_akhir' => $_POST['tanggal_akhir'],
            'target_jumlah_kata' => $_POST['target']
        ];

        if (update_misi($koneksi, $id_misi, $data)) {
            echo "<script>alert('Misi berhasil diperbarui!'); window.location='index.php?page=guru/misi_kosakata';</script>";
        } else {
            echo "<script>alert('Gagal update misi.'); window.location='index.php?page=guru/misi_kosakata';</script>";
        }
    }
}

function hapus_misi_process($koneksi) {
    $id_misi = $_GET['id'];
    if (hapus_misi($koneksi, $id_misi)) {
        echo "<script>alert('Misi berhasil dihapus!'); window.location='index.php?page=guru/misi_kosakata';</script>";
    } else {
        echo "<script>alert('Gagal menghapus misi.'); window.location='index.php?page=guru/misi_kosakata';</script>";
    }
}
function detail_progres_misi_page($koneksi) {
    $id_guru = $_SESSION['user_id'];
    $data_guru = cari_data_guru($koneksi, $id_guru);
    
    if (empty($_GET['id'])) {
        header("Location: index.php?page=guru/misi_kosakata");
        exit;
    }

    $id_misi = $_GET['id'];
    $id_sekolah = $data_guru['id_sekolah'];
    $misi = ambil_detail_misi($koneksi, $id_misi);
    $result_progres = ambil_progres_siswa_per_misi($koneksi, $id_sekolah, $id_misi);
    $daftar_siswa = $result_progres['data'];
    $target_misi  = $result_progres['target'];

    include "./views/guru/detail_progres_misi.php";
}
function leaderboard_guru_page($koneksi) {
    $id_guru = $_SESSION['user_id'];
    $data_guru = cari_data_guru($koneksi, $id_guru);
    $id_sekolah = $data_guru['id_sekolah'];

    $scope  = $_GET['scope'] ?? 'school';
    $time   = $_GET['time'] ?? 'all';
    $search = $_GET['search'] ?? '';

    $leaderboard_data = ambil_leaderboard($koneksi, $id_sekolah, $scope, $time, $search);

    include "./views/guru/leaderboard.php";
}
?>