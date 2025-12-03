<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Registrasi</title>
    <link rel="stylesheet" href="./views/css/login.css">
</head>
<body>
    <div class="left-panel">
        <div class="login-box">
            <h2>Silahkan Registrasi</h2>

            <div class="tab-container">
                <a href="index.php?page=regist&peran=siswa" 
                    class="tab-item <?= ($peran_sekarang == 'siswa') ? 'active' : '' ?>">
                    Siswa
                </a>
                
                <a href="index.php?page=regist&peran=guru" 
                    class="tab-item <?= ($peran_sekarang == 'guru') ? 'active' : '' ?>">
                    Guru
                </a>
            </div>

            <form action="index.php?page=regist_process" method="POST">
                
                <input type="hidden" name="user_role_selection" value="<?= $peran_sekarang ?>">

                <div class="input-group">
                    <label>Username:</label>
                    <input type="text" name="username" required placeholder="Masukkan username..">
                </div>
                <div class="input-group">
                    <label>Password:</label>
                    <input type="password" name="password" required placeholder="Masukkan Password..">
                </div>
                <div class="input-group">
                    <label>Nama lengkap:</label>
                    <input type="text" name="nama_lengkap" required placeholder="Masukkan Nama Lengkap..">
                </div>
                <div class="input-group">
                    <label>Email:</label>
                    <input type="text" name="email" required placeholder="Masukkan Email..">
                </div>

                <?php if ($peran_sekarang == 'siswa'): ?>
                    <div class="input-group">
                        <label>Nama Sekolah:</label>
                        <input list="list-sekolah" name="sekolah" placeholder="Ketik atau pilih sekolah...">
                        <datalist id="list-sekolah">
                            <?php foreach ($data_sekolah as $s): ?>
                                <option value="<?= $s['nama_sekolah'] ?>">
                            <?php endforeach; ?>
                        </datalist>
                    </div>
                    <p style="text-align:center; margin: 5px 0; font-size: 0.9em;">Atau masuk dengan kode sekolah</p>
                    <div class="input-group">
                        <label>Kode Sekolah:</label>
                        <input type="text" name="kode_sekolah" placeholder="Masukkan Kode Sekolah..">
                    </div>
                <?php endif; ?>

                <button type="submit">Registrasi sebagai <?= ucfirst($peran_sekarang) ?></button>
            </form>
            <p>Sudah punya akun? silahkan <a href='index.php?page=login'>login</a></p>
        </div>
    </div>

    <div class="right-panel">
        <img src="./views/assets/login.png">
    </div>
</body>
</html>