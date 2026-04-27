<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="index.php">Toko Buku</a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">

            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="pelanggan.php">Pelanggan</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="buku.php">Buku</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="transaksi.php">Transaksi</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="lihat_transaksi.php">Daftar Pesanan</a>
                </li>
            </ul>

            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                </li>
                <li class="nav-item">
                    <a href="#" class="btn btn-danger" onclick="logoutLoading()">Logout</a>
                </li>
            </ul>

        </div>
    </div>
</nav>

<!-- LOADING -->
<div id="loadingLogout" class="position-fixed top-0 start-0 w-100 h-100 bg-dark bg-opacity-50 d-none justify-content-center align-items-center" style="z-index:9999;">
    <div class="text-center text-white">
        <div class="spinner-border mb-3"></div>
        <div>Logging out...</div>
    </div>
</div>

<script>
function logoutLoading() {
    document.getElementById('loadingLogout').classList.remove('d-none');

    setTimeout(function() {
        window.location.href = "logout.php";
    }, 1000);
}
</script>