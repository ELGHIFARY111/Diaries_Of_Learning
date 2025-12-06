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
                    <input type="text" name="username" placeholder="Masukkan username.."
                            value="<?= isset($data['username']) ? htmlspecialchars($data['username']) : '' ?>">
                    <?php if (isset($errors['username'])): ?>
                        <span class="error-msg"><?= $errors['username'] ?></span>
                    <?php endif; ?>
                </div>

                <div class="input-group">
                    <label>Password:</label>
                    <input type="password" name="password" placeholder="Masukkan Password.."
                            value="<?= isset($data['password']) ? htmlspecialchars($data['password']) : '' ?>">
                    <?php if (isset($errors['password'])): ?>
                        <span class="error-msg"><?= $errors['password'] ?></span>
                    <?php endif; ?>
                </div>

                <div class="input-group">
                    <label>Nama lengkap:</label>
                    <input type="text" name="nama_lengkap" placeholder="Masukkan Nama Lengkap.."
                            value="<?= isset($data['nama_lengkap']) ? htmlspecialchars($data['nama_lengkap']) : '' ?>">
                    <?php if (isset($errors['nama_lengkap'])): ?>
                        <span class="error-msg"><?= $errors['nama_lengkap'] ?></span>
                    <?php endif; ?>
                </div>

                <div class="input-group">
                    <label>Email:</label>
                    <input type="text" name="email" placeholder="Masukkan Email.."
                            value="<?= isset($data['email']) ? htmlspecialchars($data['email']) : '' ?>">
                    <?php if (isset($errors['email'])): ?>
                        <span class="error-msg"><?= $errors['email'] ?></span>
                    <?php endif; ?>
                </div>

                <?php if ($peran_sekarang == 'siswa'): ?>
                    <div class="input-group">
                        <label>Nama Sekolah:</label>
                        <input list="list-sekolah" name="sekolah" placeholder="Ketik atau pilih sekolah..."
                                value="<?= isset($data['sekolah']) ? htmlspecialchars($data['sekolah']) : '' ?>">
                        <datalist id="list-sekolah">
                            <?php foreach ($data_sekolah as $s): ?>
                                <option value="<?= $s['nama_sekolah'] ?>">
                            <?php endforeach; ?>
                        </datalist>
                        <?php if (isset($errors['sekolah'])): ?>
                            <span class="error-msg"><?= $errors['sekolah'] ?></span>
                        <?php endif; ?>
                    </div>

                    <p style="text-align:center; margin: 5px 0; font-size: 0.9em;">Atau masuk dengan kode sekolah</p>
                    
                    <div class="input-group">
                        <label>Kode Sekolah:</label>
                        <input type="text" name="kode_sekolah" placeholder="Masukkan Kode Sekolah.."
                                value="<?= isset($data['kode_sekolah']) ? htmlspecialchars($data['kode_sekolah']) : '' ?>">
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