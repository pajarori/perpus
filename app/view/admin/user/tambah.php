<main class="app-content">
    <?php if ($msg != "") {
        echo " <div class='alert alert-info'>$msg</div>";
    } ?>
    <div class="tile">
        <h3 class="tile-title">Tambah User</h3>
        <div class="tile-body">
            <form action="" method="post">
                <div class="mb-3">
                    <label class="form-label">Nama</label>
                    <input class="form-control" type="text" name="nama">
                </div>
                <div class="mb-3">
                    <label class="form-label">Username</label>
                    <input class="form-control" type="text" name="username">
                </div>
                <div class="mb-3">
                    <label class="form-label">Password</label>
                    <input class="form-control" type="text" name="password">
                </div>
                <div class="mb-3">
                    <label class="form-label" for="exampleSelect1">Level</label>
                    <select class="form-control" id="exampleSelect1" name="level">
                        <option value="1">Administrator</option>
                        <option value="2">Peminjam</option>
                        <option value="3">Petugas</option>

                    </select>
                </div>
                <div class="tile-footer">
                    <button type="submit" name="submit" class="btn btn-primary"><i class="bi bi-check-circle-fill me-2"></i>Tambah</button>&nbsp;&nbsp;&nbsp;<a class="btn btn-secondary" href="/admin/"><i class="bi bi-x-circle-fill me-2"></i>Cancel</a>
                </div>
            </form>
        </div>
    </div>


</main>