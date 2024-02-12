<main class="app-content">
    <?php if ($msg != "") {
        echo " <div class='alert alert-info'>$msg</div>";
    } ?>
    <div class="tile">
        <h3 class="tile-title">Update Buku</h3>
        <div class="tile-body">
            <form action="" method="post" enctype="multipart/form-data">
                <div class="mb-3">
                    <label class="form-label">Judul</label>
                    <input class="form-control" type="text" value="<?= $detail->judul ?>" name="judul">
                </div>
                <div class="mb-3">
                    <label class="form-label">Pengarang</label>
                    <input class="form-control" type="text" value="<?= $detail->pengarang ?>" name="pengarang">
                </div>
                <div class="mb-3">
                    <label class="form-label">Penerbit</label>
                    <input class="form-control" type="text" value="<?= $detail->penerbit ?>" name="penerbit">
                </div>
                <div class="mb-3">
                    <label class="form-label">Tahun Terbit</label>
                    <input class="form-control" type="text" value="<?= $detail->tahun_terbit ?>" name="tahun_terbit">
                </div>
                <div class="mb-3">
                    <label class="form-label">Jumlah Buku</label>
                    <input class="form-control" type="text" value="<?= $detail->jumlah_buku ?>" name="jumlah_buku">
                </div>
                <div class="mb-3">
                    <label class="form-label">ISBN</label>
                    <input class="form-control" type="text" value="<?= $detail->isbn ?>" name="isbn">
                </div>
                <div class="mb-3">
                    <label class="form-label">Deskripsi</label>
                    <textarea class="form-control" rows="4" name="deskripsi"><?= $detail->deskripsi ?></textarea>
                </div>
                <div class="mb-3">
                    <label class="form-label">Lokasi</label>
                    <input class="form-control" type="text" placeholder="Lokasi Buku" value="<?= $detail->lokasi ?>" name="lokasi">
                </div>
                <div class="mb-3">
                    <label class="form-label">Gambar Sampul</label>
                    <input class="form-control" type="file" name="gambar">
                </div>
                <div class="tile-footer">
                    <button type="submit" name="update" class="btn btn-primary"><i class="bi bi-check-circle-fill me-2"></i>Update</button>&nbsp;&nbsp;&nbsp;<a class="btn btn-secondary" href="/admin.php?page=buku"><i class="bi bi-x-circle-fill me-2"></i>Cancel</a>
                </div>
            </form>
        </div>
    </div>

</main>