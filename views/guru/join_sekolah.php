<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Join School</title>
    <link rel="stylesheet" href="./views/css/guru.css">
    <style>

    </style>
</head>
<body>
    <div class="container">
        <div class="content" style="">
            <div class="header" style="text-align: center;">
                <h2>Join An Existing School</h2>
                <p>Start your school's digital journey here.</p>
            </div>

            <div class="box form-container">
                <form action="index.php?page=guru/proses_join_sekolah" method="POST">
                    <div class="form-group">
                        <label>School Name</label>
                        <input type="text" name="nama_sekolah" placeholder="Contoh: SMA Negeri 1...">
                    </div>

                    <p style="text-align:center; margin: 10px 0;">or join with a unique code</p>

                    <div class="form-group">
                        <label>School Code</label>
                        <input type="text" name="kode_sekolah" placeholder="Contoh: 123456">
                    </div>

                    <div class="action-buttons" style="display:flex; justify-content:space-between; margin-top: 20px;">
                        <a href="index.php?page=guru/dashboard" class="btn-action" style="background:#e0e0e0; color:#333; text-decoration:none; text-align:center; padding: 10px 20px; border-radius: 5px;">Batal</a>
                        <button type="submit" class="btn-action btn-success" style="background:#27ae60; color:white; border:none; padding: 10px 20px; border-radius: 5px; cursor:pointer;">Gabung Sekolah</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</body>
</html>