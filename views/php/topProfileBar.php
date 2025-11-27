<link rel="stylesheet" href="./views/css/global.css">

<div class="topbar">
    <div class="profile" onclick="toggleProfileMenu()">
        <?= $_SESSION['username'] ?? 'Akun' ?> ▼
    </div>

    <div id="profileMenu" class="profile-menu">
        <a href="index.php?page=profil_akun">Profil Akun</a>
        <a href="index.php?page=ganti_akun">Ganti Akun</a>
        <a href="index.php?page=logout">Logout</a>
    </div>
</div>

<script>
function toggleProfileMenu() {
    const menu = document.getElementById("profileMenu");
    menu.style.display = menu.style.display === "block" ? "none" : "block";
}

document.addEventListener("click", function(event) {
    const menu = document.getElementById("profileMenu");
    const button = document.querySelector(".profile");

    if (!button.contains(event.target)) {
        menu.style.display = "none";
    }
});
</script>
