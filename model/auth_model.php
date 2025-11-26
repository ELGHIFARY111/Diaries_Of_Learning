<?php
function auth_get_user_by_username($koneksi, $username) {
    $safe_username = mysqli_real_escape_string($koneksi, $username);
    $sql = "SELECT * FROM user WHERE username = '$safe_username'"; 
    $result = mysqli_query($koneksi, $sql);
    
    return mysqli_fetch_assoc($result);
}
?>