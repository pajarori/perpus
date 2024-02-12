<main class="app-content">
    <?php if ($msg != "") {
        echo " <div class='alert alert-info'>$msg</div>";
    } ?>
    <div class="tile">
        <h3 class="tile-title">Tambah Buku</h3>
        <div class="tile-body">
            <form action="" method="post" enctype="multipart/form-data">
                <div class="mb-3">
                    <label class="form-label">Judul</label>
                    <input class="form-control" type="text" placeholder="Judul Buku" name="judul">
                </div>
                <div class="mb-3">
                    <label class="form-label">Pengarang</label>
                    <input class="form-control" type="text" placeholder="Pengarang Buku" name="pengarang">
                </div>
                <div class="mb-3">
                    <label class="form-label">Penerbit</label>
                    <input class="form-control" type="text" placeholder="Penerbit Buku" name="penerbit">
                </div>
                <div class="mb-3">
                    <label class="form-label">Tahun Terbit</label>
                    <input class="form-control" type="text" placeholder="2024" name="tahun_terbit">
                </div>
                <div class="mb-3">
                    <label class="form-label">Jumlah Buku</label>
                    <input class="form-control" type="text" placeholder="Jumlah Buku Yang Tersedia" name="jumlah_buku">
                </div>
                <div class="mb-3">
                    <label class="form-label">ISBN</label>
                    <input class="form-control" type="text" placeholder="ISBN Buku" name="isbn">
                </div>
                <div class="mb-3">
                    <label class="form-label">Deskripsi</label>
                    <textarea class="form-control" rows="4" placeholder="Deskripsi Buku" name="deskripsi"></textarea>
                </div>
                <div class="mb-3">
                    <label class="form-label">Lokasi</label>
                    <input class="form-control" type="text" placeholder="Lokasi Buku" name="lokasi">
                </div>
                <div class="mb-3">
                    <label class="form-label">Gambar Sampul</label>
                    <input class="form-control" type="file" name="gambar">
                </div>
                <div class="tile-footer">
                    <button type="submit" name="submit" class="btn btn-primary"><i class="bi bi-check-circle-fill me-2"></i>Tambah</button>&nbsp;&nbsp;&nbsp;<a class="btn btn-secondary" href="/admin.php?page=buku"><i class="bi bi-x-circle-fill me-2"></i>Cancel</a>
                </div>
            </form>
        </div>
    </div>
</main>