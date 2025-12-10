<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vocabulary Bank</title>
    <link rel="stylesheet" href="./views/css/kosakataMuridStyle.css">
</head>
<body>
    <div class="container">
        <div class="content">
            
            <div class="header">
                <h2>Vocabulary Bank</h2>
            </div>

            <div class="form-box">
                <h3><?= isset($edit_data) ? 'Edit Word' : 'Add New Word' ?></h3>
                
                <form action="" method="POST" style="margin-top: 15px;">
                    <input type="hidden" name="id_kosakata" value="<?= $edit_data['id_kosakata'] ?? '' ?>">

                    <div class="form-row">
                        <div class="form-group half">
                            <label>Word (English)</label>
                            <input type="text" name="kata_inggris" class="input-field" 
                                   value="<?= htmlspecialchars($edit_data['kata_inggris'] ?? '') ?>" 
                                   placeholder="Ex: Eager" required>
                        </div>
                        <div class="form-group half">
                            <label>Meaning (Indonesian)</label>
                            <input type="text" name="arti" class="input-field" 
                                   value="<?= htmlspecialchars($edit_data['arti_indonesia'] ?? '') ?>" 
                                   placeholder="Ex: Bersemangat" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Example Sentence</label>
                        <input type="text" name="contoh" class="input-field" 
                               value="<?= htmlspecialchars($edit_data['contoh_kalimat'] ?? '') ?>" 
                               placeholder="Ex: He is eager to learn English.">
                    </div>

                    <div class="form-actions">
                        <?php if(isset($edit_data)): ?>
                            <a href="index.php?page=murid/kosakataMurid" style="text-decoration:none; color:#777; margin-right:15px;">Cancel</a>
                            <button type="submit" class="submit-btn" style="background-color: #f39c12;">Update Word</button>
                        <?php else: ?>
                            <button type="submit" class="submit-btn">Save Word</button>
                        <?php endif; ?>
                    </div>
                </form>
            </div>

            <div class="vocab-list-section">
                <div class="search-box">
                    <form action="" method="GET">
                        <input type="hidden" name="page" value="murid/kosakataMurid">
                        <input type="text" name="search" placeholder="Search word..." value="<?= htmlspecialchars($_GET['search'] ?? '') ?>">
                        <button type="submit">🔍</button>
                    </form>
                </div>

                <div class="vocab-grid">
                    <?php if (!empty($daftar_kosakata)): ?>
                        <?php foreach ($daftar_kosakata as $vocab): ?>
                            
                            <div class="vocab-card">
                                <div class="word-en"><?= htmlspecialchars($vocab['kata_inggris']) ?></div>
                                <div class="word-id"><?= htmlspecialchars($vocab['arti_indonesia']) ?></div>
                                
                                <?php if (!empty($vocab['contoh_kalimat'])): ?>
                                    <div class="word-example">"<?= htmlspecialchars($vocab['contoh_kalimat']) ?>"</div>
                                <?php else: ?>
                                    <div class="word-example" style="color:#ccc;">- No example -</div>
                                <?php endif; ?>

                                <div class="card-actions">
                                    <a href="index.php?page=murid/kosakataMurid&action=edit&id=<?= $vocab['id_kosakata'] ?>" class="btn-mini btn-edit">Edit</a>
                                    
                                    <a href="index.php?page=murid/kosakataMurid&action=hapus&id=<?= $vocab['id_kosakata'] ?>" 
                                       class="btn-mini btn-delete"
                                       onclick="return confirm('Yakin ingin menghapus kata ini?');">Delete</a>
                                </div>
                            </div>

                        <?php endforeach; ?>
                    <?php else: ?>
                        <div style="grid-column: 1/-1; text-align: center; color: grey; padding: 20px;">
                            No vocabulary found. Start adding new words!
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</body>
</html>