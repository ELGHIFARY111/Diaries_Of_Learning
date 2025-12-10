<?php
// dashboard

function hitung_total_catatan($koneksi, $id_user) {
    $id_user = mysqli_real_escape_string($koneksi, $id_user);
    $query = mysqli_query($koneksi, "SELECT COUNT(*) as total FROM catatan WHERE id_user = '$id_user'");
    $row = mysqli_fetch_assoc($query);
    return $row['total'];
}

function hitung_total_kosakata($koneksi, $id_user) {
    $id_user = mysqli_real_escape_string($koneksi, $id_user);
    $query = mysqli_query($koneksi, "SELECT COUNT(*) as total FROM kosakata WHERE id_user = '$id_user'");
    $row = mysqli_fetch_assoc($query);
    return $row['total'];
}

function hitung_total_poin($koneksi, $id_user) {
    $id_user = mysqli_real_escape_string($koneksi, $id_user);
    
    $q_catatan = mysqli_query($koneksi, "SELECT COUNT(*) as total FROM catatan WHERE id_user = '$id_user'");
    $catatan = mysqli_fetch_assoc($q_catatan);
    $poin_catatan = ($catatan['total'] ?? 0) * 10;
    
    $q_kosakata = mysqli_query($koneksi, "SELECT COUNT(*) as total FROM kosakata WHERE id_user = '$id_user'");
    $kosakata = mysqli_fetch_assoc($q_kosakata);
    $poin_kosakata = ($kosakata['total'] ?? 0) * 2;
    
    $q_misi = mysqli_query($koneksi, "SELECT COUNT(*) as total FROM progres WHERE id_user = '$id_user' AND nilai = 100");
    $misi = mysqli_fetch_assoc($q_misi);
    $poin_misi = ($misi['total'] ?? 0) * 5;

    return $poin_catatan + $poin_kosakata + $poin_misi;
}

function ambil_id_sekolah_murid($koneksi, $id_user) {
    $id_user = mysqli_real_escape_string($koneksi, $id_user);
    $query = mysqli_query($koneksi, "SELECT id_sekolah FROM user WHERE id_user = '$id_user'");
    $row = mysqli_fetch_assoc($query);
    return $row['id_sekolah'] ?? 0;
}


function ambil_misi_aktif_terbaru($koneksi, $id_sekolah) {
    $query = "SELECT * FROM misi 
            WHERE (kategori = 'global') OR (kategori = 'sekolah' AND id_sekolah = '$id_sekolah') 
            ORDER BY id_misi DESC LIMIT 1";
            
    $result = mysqli_query($koneksi, $query);
    return mysqli_fetch_assoc($result);
}

function ambil_progres_misi_terakhir($koneksi, $id_user) {
    $query = "SELECT nilai FROM progres WHERE id_user = '$id_user' ORDER BY id_progres DESC LIMIT 1";
    $result = mysqli_query($koneksi, $query);
    $row = mysqli_fetch_assoc($result);
    return $row['nilai'] ?? 0;
}
function ambil_list_kata_target_murid($koneksi, $id_misi) {
    $id_misi = mysqli_real_escape_string($koneksi, $id_misi);
    $query = mysqli_query($koneksi, "SELECT kata_kunci FROM kosakata_misi WHERE id_misi = '$id_misi'");
    
    $hasil = [];
    if (mysqli_num_rows($query) > 0) {
        while ($row = mysqli_fetch_assoc($query)) {
            $hasil[] = $row['kata_kunci'];
        }
    }
    return $hasil;
}
function simpan_catatan_murid($koneksi, $id_user, $judul, $isi, $foto, $audio, $video) {
    $judul = mysqli_real_escape_string($koneksi, $judul);
    $isi   = mysqli_real_escape_string($koneksi, $isi);
    $tanggal = date('Y-m-d H:i:s');
    
    $query = "INSERT INTO catatan (id_user, judul, konten_path, tanggal_catatan, file_foto, file_audio, file_video) 
                VALUES ('$id_user', '$judul', '$isi', '$tanggal', '$foto', '$audio', '$video')";
    
    return mysqli_query($koneksi, $query);
}
function ambil_semua_catatan($koneksi, $id_user) {
    $id_user = mysqli_real_escape_string($koneksi, $id_user);
    $query = "SELECT * FROM catatan WHERE id_user = '$id_user' ORDER BY tanggal_catatan DESC";
    $result = mysqli_query($koneksi, $query);
    
    $data = [];
    if (mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_assoc($result)) {
            $data[] = $row;
        }
    }
    return $data;
}
function cek_status_kata($koneksi, $id_user, $kata) {
    $safe_kata = mysqli_real_escape_string($koneksi, $kata);
    $query = "SELECT id_catatan FROM catatan 
            WHERE id_user = '$id_user' 
            AND (LOWER(judul) LIKE '%$safe_kata%' OR LOWER(konten_path) LIKE '%$safe_kata%') 
            LIMIT 1";
    $result = mysqli_query($koneksi, $query);
    return (mysqli_num_rows($result) > 0);
}
function ambil_daftar_misi_murid($koneksi, $id_user) {
    $id_sekolah = ambil_id_sekolah_murid($koneksi, $id_user);

    $query = "SELECT * FROM misi 
            WHERE (kategori = 'global') 
                OR (kategori = 'sekolah' AND id_sekolah = '$id_sekolah') 
            ORDER BY id_misi DESC";
                
    $result = mysqli_query($koneksi, $query);
    $daftar_misi = [];

    while ($misi = mysqli_fetch_assoc($result)) {
        $id_misi = $misi['id_misi'];
        $q_kata = mysqli_query($koneksi, "SELECT kata_kunci FROM kosakata_misi WHERE id_misi = '$id_misi'");
        $target_kata = [];
        while($k = mysqli_fetch_assoc($q_kata)){
            $target_kata[] = strtolower(trim($k['kata_kunci']));
        }

        $total_target = count($target_kata);
        $total_dapat = 0;

        if ($total_target > 0) {
            foreach ($target_kata as $kata) {
                if (empty($kata)) continue;
                $safe_kata = mysqli_real_escape_string($koneksi, $kata);
                
                $cek_catatan = mysqli_query($koneksi, "SELECT id_catatan FROM catatan 
                                                    WHERE id_user = '$id_user' 
                                                    AND (LOWER(judul) LIKE '%$safe_kata%' OR LOWER(konten_path) LIKE '%$safe_kata%') 
                                                    LIMIT 1");
                if (mysqli_num_rows($cek_catatan) > 0) {
                    $total_dapat++;
                }
            }
            $persen = round(($total_dapat / $total_target) * 100);
        } else {
            $persen = 0;
        }

        $misi['progress'] = $persen; 
        
        // Hitung sisa hari
        $misi['sisa_hari'] = null;
        if (!empty($misi['tanggal_akhir'])) {
            $tgl_deadline = new DateTime($misi['tanggal_akhir']);
            $tgl_sekarang = new DateTime();
            $interval = $tgl_sekarang->diff($tgl_deadline);
            $misi['sisa_hari'] = ($interval->invert == 1) ? 0 : $interval->days;
        }

        $daftar_misi[] = $misi;
    }

    return $daftar_misi;
}

function ambil_checklist_misi($koneksi, $id_misi, $id_user) {
    $checklist = [];

    $query_kata = "SELECT kata_kunci FROM kosakata_misi WHERE id_misi = '$id_misi'";
    $result_kata = mysqli_query($koneksi, $query_kata);

    while ($row = mysqli_fetch_assoc($result_kata)) {
        $kata_target = trim($row['kata_kunci']); 
        
        if (empty($kata_target)) continue;

        $safe_kata = mysqli_real_escape_string($koneksi, $kata_target);

        $cek_catatan = mysqli_query($koneksi, "SELECT id_catatan 
                                            FROM catatan 
                                            WHERE id_user = '$id_user' 
                                            AND (LOWER(judul) LIKE '%$safe_kata%' OR LOWER(konten_path) LIKE '%$safe_kata%')
                                            LIMIT 1");
        
        $sudah_ada = (mysqli_num_rows($cek_catatan) > 0);

        $checklist[] = [
            'kata'   => $kata_target,
            'status' => $sudah_ada
        ];
    }

    return $checklist;
}
function ambil_nilai_progres_misi($koneksi, $id_user, $id_misi) {
    $query = mysqli_query($koneksi, "SELECT nilai FROM progres WHERE id_user = '$id_user' AND id_misi = '$id_misi'");
    
    if (mysqli_num_rows($query) > 0) {
        $row = mysqli_fetch_assoc($query);
        return $row['nilai'];
    } else {
        return 0;
    }
}
function hitung_progres_misi_spesifik($koneksi, $id_user, $id_sekolah) {
    
    $query_misi = mysqli_query($koneksi, "SELECT id_misi FROM misi 
                                        WHERE kategori = 'global' 
                                        OR (kategori = 'sekolah' AND id_sekolah = '$id_sekolah')");

    while ($misi = mysqli_fetch_assoc($query_misi)) {
        $id_misi = $misi['id_misi'];
        
        // --- FIX IS HERE: Added '_murid' to the function name ---
        $list_kata = ambil_list_kata_target_murid($koneksi, $id_misi); 
        // -------------------------------------------------------
        
        $total_kata = count($list_kata);
        $kata_ditemukan = 0;

        if ($total_kata > 0) {
            foreach ($list_kata as $kata) {
                if (cek_status_kata($koneksi, $id_user, $kata)) {
                    $kata_ditemukan++;
                }
            }
        }

        $persen = ($total_kata > 0) ? round(($kata_ditemukan / $total_kata) * 100) : 0;
        
        $tgl_sekarang = date('Y-m-d H:i:s'); 

        $cek_progres = mysqli_query($koneksi, "SELECT id_progres FROM progres WHERE id_user='$id_user' AND id_misi='$id_misi'");

        if (mysqli_num_rows($cek_progres) > 0) {
            mysqli_query($koneksi, "UPDATE progres SET nilai='$persen', tanggal_update='$tgl_sekarang' 
                                    WHERE id_user='$id_user' AND id_misi='$id_misi'");
        } else {
            mysqli_query($koneksi, "INSERT INTO progres (id_user, id_misi, nilai, tanggal_update) 
                                    VALUES ('$id_user', '$id_misi', '$persen', '$tgl_sekarang')");
        }
    }
}
function hitung_sisa_hari($tanggal_akhir) {
    if (empty($tanggal_akhir) || $tanggal_akhir == '0000-00-00') {
        return null;
    }

    $tgl_deadline = new DateTime($tanggal_akhir);
    $tgl_sekarang = new DateTime(); 

    $tgl_deadline->setTime(0, 0, 0);
    $tgl_sekarang->setTime(0, 0, 0);

    if ($tgl_sekarang > $tgl_deadline) {
        return 0; 
    }

    $jarak = $tgl_sekarang->diff($tgl_deadline);
    return $jarak->days;
}
function ambil_aktivitas_terbaru($koneksi, $id_user) {
    $id_user = mysqli_real_escape_string($koneksi, $id_user);
    $query = "SELECT judul, tanggal_dibuat as tanggal_catatan, 'catatan' as tipe 
            FROM catatan 
            WHERE id_user = '$id_user' 
            UNION 
            SELECT kata_inggris as judul, tanggal_dibuat as tanggal_catatan, 'kosakata' as tipe 
            FROM kosakata 
            WHERE id_user = '$id_user' 
            ORDER BY tanggal_catatan DESC LIMIT 5";
    return mysqli_query($koneksi, $query);
}

// === DATA PROFIL ===

function cari_data_murid($koneksi, $id_user) {
    $id_user = mysqli_real_escape_string($koneksi, $id_user);
    $query = "SELECT u.*, s.nama_sekolah, s.kode_sekolah
              FROM user u 
              LEFT JOIN sekolah s ON u.id_sekolah = s.id_sekolah 
              WHERE u.id_user = '$id_user'";
    return mysqli_fetch_assoc(mysqli_query($koneksi, $query));
}

function update_profil_murid($koneksi, $data) {
    $id_user = mysqli_real_escape_string($koneksi, $data['id_user']);
    $nama    = mysqli_real_escape_string($koneksi, $data['nama']);
    $username= mysqli_real_escape_string($koneksi, $data['username']);
    $email   = mysqli_real_escape_string($koneksi, $data['email']);
    
    $cek = mysqli_query($koneksi, "SELECT id_user FROM user WHERE (username='$username' OR email='$email') AND id_user != '$id_user'");
    if (mysqli_num_rows($cek) > 0) return false;

    $query = "UPDATE user SET nama_lengkap='$nama', username='$username', email='$email' WHERE id_user='$id_user'";
    
    if (!empty($data['password'])) {
        $pass = password_hash($data['password'], PASSWORD_DEFAULT);
        $query = "UPDATE user SET nama_lengkap='$nama', username='$username', email='$email', password='$pass' WHERE id_user='$id_user'";
    }

    return mysqli_query($koneksi, $query);
}

function tambah_kosakata_murid($koneksi, $data) {
    $id_user = $data['id_user'];
    $inggris = mysqli_real_escape_string($koneksi, $data['kata_inggris']);
    $arti    = mysqli_real_escape_string($koneksi, $data['arti']);
    $contoh  = mysqli_real_escape_string($koneksi, $data['contoh']);
    $query = "INSERT INTO kosakata (id_user, kata_inggris, arti_indonesia, contoh_kalimat, tanggal_dicatat) 
            VALUES ('$id_user', '$inggris', '$arti', '$contoh', NOW())";
    return mysqli_query($koneksi, $query);
}

function ambil_kosakata_murid($koneksi, $id_user, $keyword='') {
    $query = "SELECT * FROM kosakata WHERE id_user='$id_user'";
    if ($keyword) {
        $k = mysqli_real_escape_string($koneksi, $keyword);
        $query .= " AND (kata_inggris LIKE '%$k%' OR arti_indonesia LIKE '%$k%')";
    }
    $query .= " ORDER BY id_kosakata DESC";
    return mysqli_query($koneksi, $query);
}

function update_catatan_murid($koneksi, $id_catatan, $id_user, $judul, $isi, $foto, $audio, $video) {

    $id_catatan = mysqli_real_escape_string($koneksi, $id_catatan);
    $id_user    = mysqli_real_escape_string($koneksi, $id_user);
    $judul      = mysqli_real_escape_string($koneksi, $judul);
    $isi        = mysqli_real_escape_string($koneksi, $isi);

    $foto       = ($foto !== null) ? mysqli_real_escape_string($koneksi, $foto) : '';
    $audio      = ($audio !== null) ? mysqli_real_escape_string($koneksi, $audio) : '';
    $video      = ($video !== null) ? mysqli_real_escape_string($koneksi, $video) : '';

    
    $query = "UPDATE catatan SET 
                judul = '$judul', 
                konten_path = '$isi', 
                file_foto = '$foto',
                file_audio = '$audio',
                file_video = '$video'
            WHERE id_catatan = '$id_catatan' AND id_user = '$id_user'";

    return mysqli_query($koneksi, $query);
}
function ambil_satu_kosakata($koneksi, $id_kosakata, $id_user) {
    $id_kosakata = mysqli_real_escape_string($koneksi, $id_kosakata);
    $id_user     = mysqli_real_escape_string($koneksi, $id_user);
    $query = "SELECT * FROM kosakata WHERE id_kosakata='$id_kosakata' AND id_user='$id_user'";
    return mysqli_fetch_assoc(mysqli_query($koneksi, $query));
}

function update_kosakata_murid($koneksi, $id_kosakata, $id_user, $inggris, $arti, $contoh) {
    $id_kosakata = mysqli_real_escape_string($koneksi, $id_kosakata);
    $id_user     = mysqli_real_escape_string($koneksi, $id_user);
    $inggris     = mysqli_real_escape_string($koneksi, $inggris);
    $arti        = mysqli_real_escape_string($koneksi, $arti);
    $contoh      = mysqli_real_escape_string($koneksi, $contoh);

    $query = "UPDATE kosakata SET 
                kata_inggris='$inggris', 
                arti_indonesia='$arti', 
                contoh_kalimat='$contoh' 
            WHERE id_kosakata='$id_kosakata' AND id_user='$id_user'";
    return mysqli_query($koneksi, $query);
}

function hapus_kosakata_murid($koneksi, $id_kosakata, $id_user) {
    $id_kosakata = mysqli_real_escape_string($koneksi, $id_kosakata);
    $id_user     = mysqli_real_escape_string($koneksi, $id_user);
    $query = "DELETE FROM kosakata WHERE id_kosakata='$id_kosakata' AND id_user='$id_user'";
    return mysqli_query($koneksi, $query);
}
?>