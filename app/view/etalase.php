<main class="app-content">
    <div class="app-title">
        <div>
            <h1><i class="bi bi-speedometer"></i> Dashboard</h1>
        </div>
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item"><i class="bi bi-house-door fs-6"></i></li>
            <li class="breadcrumb-item"><a href="#">Buku</a></li>
        </ul>
    </div>
    <div class="row">
        <?php
        if ($buku->all()) {
            foreach ($buku->data() as $b) {
        ?>
                <div class="col-md-6 col-lg-3">
                    <div class="card">
                        <img src="<?= BASE_URL ?>assets/img/cover/<?= $b->gambar ?>" height="200" width="100px" class="card-img-top object-fit-contain" alt="...">
                        <div class="card-body">
                            <h5 class="card-title"><?= substr($b->judul, 0, 20) ?></h5>

                            <p class="card-text"><?= substr($b->deskripsi, 0, 50) . "..." ?></p>
                            <a href="?id=<?= $b->id ?>" class="btn btn-primary" style="width: 100%;">Lihat</a>
                        </div>
                    </div>
                </div>
        <?php
            }
        }
        ?>
    </div>
</main>