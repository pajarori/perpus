<main class="app-content">
    <div class="app-title">
        <div>
            <h1><i class="bi bi-speedometer"></i> Buku</h1>
            <p><?= $detail->judul ?></p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item"><i class="bi bi-house-door fs-6"></i></li>
            <li class="breadcrumb-item"><span>Buku Detail</span></li>
        </ul>
    </div>

    <?php if ($msg != "") {
        echo " <div class='alert alert-info'>$msg</div>";
    } ?>

    <div class="row">
        <div class="col-sm-6 col-md-4 d-flex justify-content-center mb-5">
            <div class="card" style="height: 520px;">
                <img src="<?= BASE_URL ?>assets/img/cover/<?= $detail->gambar ?>" class="card-img-top rounded" style="object-fit: fill; height: 100%;" alt="...">
            </div>
        </div>
        <div class="col-sm-6 col-md-8">
            <div class="mb-3">
                <h3><?= $detail->judul ?></h3>
                <p style="margin-top: -10px;">by. <?= $detail->pengarang ?></p>
            </div>
            <hr>
            <div class="mb-5">
                <h5>Deskripsi Buku</h5>
                <p><?= $detail->deskripsi ?></p>
            </div>
            <div class="mb-3">
                <h5>Detail</h5>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <div class="bs-component">
                            <ul class="list-group">
                                <li class="list-group-item d-flex justify-content-between align-items-start">Tahun Terbit<span class="badge bg-primary rounded-pill"><?= $detail->tahun_terbit ?></span></li>
                                <li class="list-group-item d-flex justify-content-between align-items-start">Pengarang<span class="badge bg-primary rounded-pill"><?= $detail->pengarang ?></span></li>
                                <li class="list-group-item d-flex justify-content-between align-items-start">Penerbit<span class="badge bg-primary rounded-pill"><?= $detail->penerbit ?></span></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="bs-component">
                            <ul class="list-group">
                                <li class="list-group-item d-flex justify-content-between align-items-start">Status Buku<span class="badge bg-primary rounded-pill"><?= $pinjaman ?></span></li>
                                <li class="list-group-item d-flex justify-content-between align-items-start">Lokasi<span class="badge bg-primary rounded-pill"><?= $detail->lokasi ?></span></li>
                                <li class="list-group-item d-flex justify-content-between align-items-start">ISBN<span class="badge bg-primary rounded-pill"><?= $detail->isbn ?></span></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mb-3">
                <?php if ($available && (!Session::isAdmin() && !Session::isPetugas())) { ?>
                    <form action="" method="post">
                        <button name="pinjam_buku" type="submit" class="btn btn-primary" style="width: 100%;">Pinjam Buku</button>
                    </form>
                <?php } else if ($pinjam->ismybook($detail->id)) { ?>
                    <h5>Informasi Pinjaman</h5>
                    <div class="bs-component mb-2">
                        <ul class="list-group">
                            <li class="list-group-item d-flex justify-content-between align-items-start">Dipinjam Pada<span class="badge bg-primary rounded-pill"><?= date('M d, Y', strtotime($pinjam->data()->tanggal_pinjam)) ?></span></li>
                            <li class="list-group-item d-flex justify-content-between align-items-start">Deadline Pengembalian<span class="badge bg-primary rounded-pill"><?= date('M d, Y', strtotime("+7 day", strtotime($pinjam->data()->tanggal_pinjam))) ?></span></li>
                            <li class="list-group-item d-flex justify-content-between align-items-start">Status<span class="badge bg-primary rounded-pill"><?= $pinjam->data()->status ?></span></li>
                        </ul>
                    </div>
                    <form action="" method="post">
                        <button name="kembalikan_buku" type="submit" class="btn btn-danger" style="width: 100%;">Kembalikan Buku</button>
                    </form>
                <?php } ?>
            </div>
        </div>
    </div>
</main>