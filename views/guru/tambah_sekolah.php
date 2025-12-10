<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create New School</title>
    <link rel="stylesheet" href="./views/css/guru.css">
    <style>

    </style>
</head>
<body>
    <div class="container">
        <div class="content" style="">
            <div class="header" style="text-align: center;">
                <h2>School Registration</h2>
                <p>Start your school's digital journey here.</p>
            </div>

            <div class="box form-container">
                <form action="index.php?page=guru/proses_tambah_sekolah" method="POST">
                    
                    <div class="form-group">
                        <label>School Name</label>
                        <input type="text" name="nama_sekolah" placeholder="Example: East Star High School" required>
                    </div>

                    <div class="form-group">
                        <label>Full Address</label>
                        <textarea name="alamat" rows="4" placeholder="Main Road No..." required></textarea>
                    </div>

                    <div class="action-buttons" style="display:flex; justify-content:space-between;">
                        <a href="index.php?page=guru/monitoring" class="btn-action" style="background:#e0e0e0; color:#333; text-decoration:none; text-align:center;">Cancel</a>
                        <button type="submit" class="btn-action btn-success">Save School</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</body>
</html>