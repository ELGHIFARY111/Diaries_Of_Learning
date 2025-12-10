<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vocabulary Bank - School Diary</title>
    <link rel="stylesheet" href="./views/css/kosakataMuridStyle.css">
</head>

<body>

    <div class="container">

        <div class="content">

            <div class="header">
                <h2>Vocabulary Bank</h2>
            </div>

            <div class="form-box">
                <h3>Add New Word</h3>
                <form action="" method="POST" style="margin-top: 15px;">
                    
                    <div class="form-row">
                        <div class="form-group half">
                            <label>Word (English)</label>
                            <input type="text" name="kata_inggris" class="input-field" placeholder="Ex: Eager" required>
                        </div>
                        <div class="form-group half">
                            <label>Meaning (Indonesian)</label>
                            <input type="text" name="arti" class="input-field" placeholder="Ex: Bersemangat" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Example Sentence</label>
                        <input type="text" name="contoh" class="input-field" placeholder="Ex: He is eager to learn English.">
                    </div>

                    <button type="submit" name="simpan_kata" class="btn-submit">Save into Dictionary</button>
                </form>
            </div>

            <div class="list-box">
                <div class="list-header">
                    <h3>My Dictionary</h3>
                    
                    <form action="" method="GET" class="search-box">
                        <input type="hidden" name="page" value="murid/kosakataMurid"> <input type="text" name="search" placeholder="Search word..." value="<?= htmlspecialchars($_GET['search'] ?? '') ?>">
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