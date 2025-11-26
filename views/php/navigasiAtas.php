<link rel="stylesheet" href="./views/css/navigasiAtas.css">
<link rel="stylesheet" href="./views/css/datamaster.css">

<nav class="navbar">
    <ul>
        <li class="main-item">
            <a></i> Diaries Of Learning</a>
        </li>

        <li><a href="index.php">Home</a></li>
        <?php
        if($dataMaster){
            echo "<li class='dropdown'>
                    <a>Data Master</a> 
                    <div class='dropdown-content'>
                        <a href='index.php?page=pelanggan'>Data Pelanggan</a>
                        <a href='index.php?page=barang'>Data Barang</a>
                        <a href='index.php?page=supplier'>Data Supplier</a>
                        <a href='index.php?page=user'>Data User</a>
                    </div>
                </li>";
        }
        ?>
        <li><a href="index.php?page=transaksi">Transaksi</a></li>

        <li><a href="index.php?page=laporan">Laporan</a></li>

        <li class="dropdown right-aligned">
            <a><?=$_SESSION['user_nama']?></a>
            <div class="dropdown-content">
                <a href="index.php?page=logout">Logout</a>
            </div>
        </li>
    </ul>
</nav>
