<link rel="stylesheet" href="./views/css/navigasiAtas.css">

<div class="sidebar">

    <div class="brand">Diaries Of Learning</div>

    <ul>
        <li>
            <a class="dropdown-btn"><?=$_SESSION['user_nama']?></a>
            <div class="dropdown-container">
                <a href="index.php?page=logout">Logout</a>
            </div>
        </li>
        <li><a href="index.php">Home</a></li>

        <?php if($dataMaster): ?>
        <li>
            <a class="dropdown-btn">Data Master</a>
            <div class="dropdown-container">
                <a href="index.php?page=pelanggan">Data Pelanggan</a>
                <a href="index.php?page=barang">Data Barang</a>
                <a href="index.php?page=supplier">Data Supplier</a>
                <a href="index.php?page=user">Data User</a>
            </div>
        </li>
        <?php endif; ?>

        <li><a href="index.php?page=transaksi">Transaksi</a></li>
        <li><a href="index.php?page=laporan">Laporan</a></li>
    </ul>

</div>
