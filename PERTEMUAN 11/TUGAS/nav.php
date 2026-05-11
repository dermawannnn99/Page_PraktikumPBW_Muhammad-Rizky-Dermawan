<link rel="preconnect" href="https://fonts.googleapis.com">
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">

<style>
/* ===== Self-contained Nav - works on both Bootstrap & Tailwind pages ===== */
.tn-nav {
    background: #0f172a;
    border-bottom: 1px solid rgba(99,102,241,0.15);
    padding: 0 1.5rem;
    font-family: 'Inter', sans-serif;
    position: relative;
    z-index: 100;
    box-sizing: border-box;
}
.tn-nav * { box-sizing: border-box; margin: 0; padding: 0; }
.tn-inner {
    max-width: 1200px;
    margin: 0 auto;
    display: flex;
    align-items: center;
    justify-content: space-between;
    height: 60px;
}
.tn-brand {
    font-size: 1.2rem;
    font-weight: 700;
    text-decoration: none;
    background: linear-gradient(135deg, #818cf8, #a78bfa);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
}
.tn-hamburger {
    display: none;
    background: none;
    border: none;
    cursor: pointer;
    flex-direction: column;
    gap: 5px;
    padding: 0.5rem;
}
.tn-hamburger span {
    display: block;
    width: 22px;
    height: 2px;
    background: #94a3b8;
    border-radius: 2px;
    transition: 0.3s;
}
.tn-menu {
    display: flex;
    align-items: center;
    gap: 0.5rem;
    flex: 1;
    justify-content: space-between;
    margin-left: 2rem;
}
.tn-links {
    display: flex;
    list-style: none;
    gap: 0.25rem;
    align-items: center;
}
.tn-links li a {
    color: #94a3b8;
    text-decoration: none;
    padding: 0.45rem 0.85rem;
    border-radius: 0.5rem;
    font-size: 0.85rem;
    font-weight: 500;
    transition: 0.2s;
    display: block;
    white-space: nowrap;
}
.tn-links li a:hover {
    color: #e2e8f0;
    background: rgba(99,102,241,0.1);
}
.tn-right { display: flex; align-items: center; }
.tn-logout {
    background: none;
    border: 1px solid rgba(239,68,68,0.35);
    color: #f87171;
    padding: 0.4rem 1rem;
    border-radius: 0.5rem;
    font-size: 0.85rem;
    font-weight: 500;
    cursor: pointer;
    font-family: inherit;
    transition: 0.2s;
    text-decoration: none;
    display: inline-block;
}
.tn-logout:hover {
    background: rgba(239,68,68,0.1);
    border-color: rgba(239,68,68,0.6);
    color: #fca5a5;
}
/* Loading overlay */
.tn-overlay {
    position: fixed;
    inset: 0;
    background: rgba(0,0,0,0.7);
    backdrop-filter: blur(4px);
    display: none;
    justify-content: center;
    align-items: center;
    z-index: 9999;
    font-family: 'Inter', sans-serif;
}
.tn-overlay.active { display: flex; }
.tn-overlay-inner { text-align: center; color: #fff; }
.tn-spin {
    width: 36px; height: 36px;
    border: 3px solid rgba(255,255,255,0.15);
    border-top-color: #818cf8;
    border-radius: 50%;
    animation: tnspin 0.7s linear infinite;
    margin: 0 auto 0.75rem;
}
@keyframes tnspin { to { transform: rotate(360deg); } }

@media (max-width: 768px) {
    .tn-hamburger { display: flex; }
    .tn-menu {
        display: none;
        position: absolute;
        top: 60px; left: 0; right: 0;
        background: #0f172a;
        border-bottom: 1px solid rgba(99,102,241,0.15);
        flex-direction: column;
        padding: 1rem;
        margin-left: 0;
        gap: 0.5rem;
    }
    .tn-menu.open { display: flex; }
    .tn-links { flex-direction: column; width: 100%; }
    .tn-links li a { padding: 0.65rem 1rem; width: 100%; }
    .tn-right { width: 100%; padding-top: 0.5rem; border-top: 1px solid rgba(255,255,255,0.05); }
    .tn-logout { width: 100%; text-align: center; }
}
</style>

<nav class="tn-nav">
    <div class="tn-inner">
        <a href="index.php" class="tn-brand">Toko Buku</a>
        <button class="tn-hamburger" onclick="document.getElementById('tnMenu').classList.toggle('open')" aria-label="Menu">
            <span></span><span></span><span></span>
        </button>
        <div class="tn-menu" id="tnMenu">
            <ul class="tn-links">
                <li><a href="index.php">Home</a></li>
                <li><a href="pelanggan.php">Pelanggan</a></li>
                <li><a href="buku.php">Buku</a></li>
                <li><a href="transaksi.php">Transaksi</a></li>
                <li><a href="lihat_transaksi.php">Daftar Pesanan</a></li>
            </ul>
            <div class="tn-right">
                <a href="#" class="tn-logout" onclick="logoutLoading()">Logout</a>
            </div>
        </div>
    </div>
</nav>

<div id="loadingLogout" class="tn-overlay">
    <div class="tn-overlay-inner">
        <div class="tn-spin"></div>
        <div>Logging out...</div>
    </div>
</div>

<script>
function logoutLoading() {
    document.getElementById('loadingLogout').classList.add('active');
    setTimeout(function() { window.location.href = "logout.php"; }, 1000);
}
</script>