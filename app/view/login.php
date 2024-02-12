<section class="material-half-bg">
    <div class="cover"></div>
</section>
<section class="login-content">
    <div class="logo">
        <h1>E-Perpus</h1>
    </div>
    <div class="login-box">
        <form class="login-form" method="POST" action="">
            <h3 class="login-head"><i class="bi bi-person me-2"></i>Welcome</h3>
            <div class="mb-3">
                <label class="form-label">USERNAME</label>
                <input class="form-control" type="text" placeholder="Username" name="username" autofocus>
            </div>
            <div class="mb-3">
                <label class="form-label">PASSWORD</label>
                <input class="form-control" type="password" placeholder="Password" name="password">
            </div>
            <div class="mb-3">
                <div class="utility">
                    <p class="semibold-text mb-2"><a href="#" data-toggle="flip">Belum Punya Akun? ?</a></p>
                </div>
            </div>
            <div class="mb-3 btn-container d-grid">
                <button type="submit" name="login" class="btn btn-primary btn-block"><i class="bi bi-box-arrow-in-right me-2 fs-5"></i>Log In</button>
            </div>
        </form>
        <form class="forget-form" method="POST" action="">
            <h3 class="login-head"><i class="bi bi-person me-2"></i>Welcome</h3>
            <div class="mb-3">
                <label class="form-label">NAMA</label>
                <input class="form-control" type="text" placeholder="Nama" name="nama" autofocus>
            </div>
            <div class="mb-3">
                <label class="form-label">USERNAME</label>
                <input class="form-control" type="text" placeholder="Username" name="username">
            </div>
            <div class="mb-3">
                <label class="form-label">PASSWORD</label>
                <input class="form-control" type="password" placeholder="Password" name="password">
            </div>
            <div class="mb-3 btn-container d-grid">
                <button type="submit" name="register" class="btn btn-primary btn-block"><i class="bi me-2 fs-5"></i>DAFTAR</button>
            </div>
            <div class="mb-3 mt-3">
                <p class="semibold-text mb-0"><a href="#" data-toggle="flip"><i class="bi bi-chevron-left me-1"></i> Kembali</a></p>
            </div>
        </form>
    </div>
</section>
<!-- Essential javascripts for application to work-->
<script src="<?= BASE_URL ?>assets/js/jquery-3.7.0.min.js"></script>
<script src="<?= BASE_URL ?>assets/js/bootstrap.min.js"></script>
<script src="<?= BASE_URL ?>assets/js/main.js"></script>
<script type="text/javascript">
    // Login Page Flipbox control
    $('.login-content [data-toggle="flip"]').click(function() {
        $('.login-box').toggleClass('flipped');
        return false;
    });
</script>