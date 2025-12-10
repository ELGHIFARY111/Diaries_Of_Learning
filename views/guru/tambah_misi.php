<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create New Mission</title>
    <link rel="stylesheet" href="./views/css/guru.css">
</head>
<body>
    <div class="container">
        <div class="content">
            <div class="header"><h2>Create New Vocabulary Mission</h2></div>
            
            <div class="box form-container">
                <form action="index.php?page=guru/proses_tambah_misi" method="POST">
                    
                    <div class="form-group">
                        <label>Mission Title</label>
                        <input type="text" name="judul" placeholder="Example: Vocabulary Animals" required>
                    </div>

                    <div class="form-group">
                        <label>Short Description</label>
                        <textarea name="deskripsi" rows="3" placeholder="Explain the goal of this mission..."></textarea>
                    </div>

                    <div class="grid-2">
                        <div class="form-group">
                            <label>Start Date</label>
                            <input type="date" name="tanggal_mulai" required>
                        </div>
                        <div class="form-group">
                            <label>End Date</label>
                            <input type="date" name="tanggal_akhir" required>
                        </div>
                    </div>

                    <div class="form-group" style="background: #f0f8ff; padding: 15px; border-radius: 8px; border: 1px solid #bde0fe;">
                        <label style="color: #0056b3;">📝 Target Vocabulary List (Required)</label>
                        <p style="font-size: 12px; margin-bottom: 5px; color: #666;">
                            Enter the English words that students must record/memorize. Separate them with commas (<b>,</b>).
                        </p>
                        <textarea name="kata_target" rows="4" placeholder="Example: Apple, Banana, Orange, Grape" required></textarea>
                    </div>

                    <div class="action-buttons" style="margin-top:20px; display:flex; justify-content:space-between;">
                        <a href="index.php?page=guru/misi_kosakata" class="btn-action" style="background:#ddd; color:#333; text-decoration:none;">Cancel</a>
                        <button type="submit" class="btn-action btn-success">Save Mission</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>