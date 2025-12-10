<?php if (!$data_user): ?>
    <h3 style="text-align:center; margin-top:20px;">User tidak ditemukan!</h3>
    <a href="index.php?page=institusi/user"
       style="padding:8px 12px; background:#0984e3; color:white; text-decoration:none; border-radius:5px;">
        Kembali
    </a>
    <?php return; ?>
<?php endif; ?>

<link rel="stylesheet" href="./views/css/datamaster.css">

<div class="container" style="max-width:800px; margin:auto; margin-top:30px;">
    <h2>Detail User</h2>
    <p>Informasi lengkap akun pengguna.</p>

    <div class="detail-box" style="
        background:white; 
        padding:20px; 
        border-radius:10px; 
        box-shadow:0 3px 10px rgba(0,0,0,0.1); 
        margin-top:20px;
    ">
        
        <table cellpadding="8" style="width:100%;">
            <tr>
                <td><b>ID User</b></td>
                <td>: <?= $data_user['id_user'] ?></td>
            </tr>

            <tr>
                <td><b>Nama Lengkap</b></td>
                <td>: <?= $data_user['nama_lengkap'] ?></td>
            </tr>

            <tr>
                <td><b>Username</b></td>
                <td>: <?= $data_user['username'] ?></td>
            </tr>

            <tr>
                <td><b>Email</b></td>
                <td>: <?= $data_user['email'] ?></td>
            </tr>

            <tr>
                <td><b>Role</b></td>
                <td>: 
                    <?php
                        if ($data_user['role'] == 1) echo "Admin";
                        elseif ($data_user['role'] == 2) echo "Guru";
                        else echo "Siswa";
                    ?>
                </td>
            </tr>

            <tr>
                <td><b>Sekolah</b></td>
                <td>: <?= $data_user['nama_sekolah'] ?? '-' ?></td>
            </tr>

        </table>

        <br>

        <a href="index.php?page=institusi/user"
           style="padding:8px 15px; background:#6c5ce7; color:white; border-radius:6px; text-decoration:none;">
           Kembali
        </a>

    </div>
</div>
