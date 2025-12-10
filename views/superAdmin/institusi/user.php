<link rel="stylesheet" href="./views/css/datamaster.css"> 

<div class="container">
    <h2>Akun User</h2>
    
    <div class="header-container" style="margin-bottom: 20px;">
        <form method="GET" action="index.php">
            <input type="hidden" name="page" value="institusi/user">
            
            <label for="filter_role">Filter Role:</label>
            <select name="filter_role" id="filter_role" style="padding: 5px;">
                <option value="">-- Semua User --</option>
                <option value="1" <?= (isset($_GET['filter_role']) && $_GET['filter_role'] == '1') ? 'selected' : '' ?>>Admin</option>
                <option value="2" <?= (isset($_GET['filter_role']) && $_GET['filter_role'] == '2') ? 'selected' : '' ?>>Guru</option>
                <option value="3" <?= (isset($_GET['filter_role']) && $_GET['filter_role'] == '3') ? 'selected' : '' ?>>Siswa/User</option>
            </select>
            
            <button type="submit" class="edit" style="padding: 5px 10px; cursor:pointer;">Cari</button>
            
            <?php if(isset($_GET['filter_role']) && $_GET['filter_role'] != ''): ?>
                <a href="index.php?page=institusi/user" class="hapus" style="text-decoration:none; padding: 6px 10px;">Reset</a>
            <?php endif; ?>
        </form>
    </div>

    <div class="container-user">
        <table border="1" cellpadding="8" cellspacing="0"> 
            <thead>
                <tr>
                    <th>No</th>
                    <th>ID User</th>
                    <th>Nama Sekolah</th>
                    <th>Username</th>
                    <th>Role</th>
                    <th>Email</th>
                    <th>Tindakan</th>
                </tr>
            </thead>
            <tbody>
                <?php if (empty($data_user)): ?>
                    <tr><td colspan="7" style="text-align:center;">Data tidak ditemukan</td></tr>
                <?php else: ?>
                    <?php $no = 1; foreach ($data_user as $row): ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $row['id_user'] ?></td>
                            <td><?= $row['nama_sekolah'] ?: '-' ?></td>
                            <td><?= $row['username'] ?></td>
                            <td>
                                <?= $row['role']==1 ? "Admin" : ($row['role']==2 ? "Guru" : "Siswa") ?>
                            </td>
                            <td><?= $row['email'] ?></td>
                            <td class="form_action">

                                <!-- DETAIL -->
                                <a class="edit" 
                                   href="index.php?page=institusi/user/detail&id=<?= $row['id_user'] ?>"
                                   style="text-decoration:none;">
                                   Detail
                                </a>

                                |

                                <!-- HAPUS -->
                                <a class="hapus" 
                                   href="index.php?page=institusi/user/hapus&id=<?= $row['id_user'] ?>"
                                   onclick="return confirm('Hapus user ini?')"
                                   style="text-decoration:none;">
                                   Hapus
                                </a>

                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>
