<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="./views/css/login.css">

</head>
<body>
    <div class="left-panel">
        <div class="login-box">
            <h2>Silahkan Login</h2>
            <form action="index.php?page=login_process" method="POST">
                
                <div class="input-group">
                    <label>Username:</label>
                    <input type="text" name="username" placeholder="Masukkan username.." 
                            value="<?= isset($_POST['username']) ? htmlspecialchars($_POST['username']) : '' ?>">
                    
                    <?php if (isset($errors['username'])): ?>
                        <span class="error-msg"><?= $errors['username'] ?></span>
                    <?php endif; ?>
                </div>

                <div class="input-group">
                    <label>Password:</label>
                    <input type="password" name="password" placeholder="Masukkan password..">
                    
                    <?php if (isset($errors['password'])): ?>
                        <span class="error-msg"><?= $errors['password'] ?></span>
                    <?php endif; ?>
                </div>

                <button type="submit">Login</button>
            </form>
            <p>Belum punya akun? silahkan <a href='index.php?page=regist'>registrasi</a></p>
        </div>
    </div>

    <div class="right-panel">
        <img src="./views/assets/login.png">
    </div>
</body>
</html>