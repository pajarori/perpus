<main class="app-content">
    <?php if ($msg != "") {
        echo " <div class='alert alert-info'>$msg</div>";
    } ?>
    <div class="tile">
        <h3 class="tile-title">Update User</h3>
        <div class="tile-body">
            <form action="" method="post">
                <div class="mb-3">
                    <label class="form-label">Nama</label>
                    <input class="form-control" type="text" value="<?= $detail->nama ?>" name="nama">
                </div>
                <div class="mb-3">
                    <label class="form-label">Username</label>
                    <input class="form-control" type="text" value="<?= $detail->username ?>" name="username" disabled>
                </div>
                <div class="mb-3">
                    <label class="form-label">Password</label>
                    <input class="form-control" type="text" name="password">
                    <p class="text-muted">* Kosongkan jika tidak ingin menganti password</p>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="exampleSelect1">Level</label>
                    <select class="form-control" id="exampleSelect1" name="level">
                        <option value="1" <?= $detail->level == "administrator" ? "selected" : "" ?>>Administrator</option>
                        <option value="2" <?= $detail->level == "peminjam" ? "selected" : "" ?>>Peminjam</option>
                        <option value="3" <?= $detail->level == "petugas" ? "selected" : "" ?>>Petugas</option>

                    </select>
                </div>
                <div class="tile-footer">
                    <button type="submit" name="update" class="btn btn-primary"><i class="bi bi-check-circle-fill me-2"></i>Update</button>&nbsp;&nbsp;&nbsp;<a class="btn btn-secondary" href="/admin/"><i class="bi bi-x-circle-fill me-2"></i>Cancel</a>
                </div>
            </form>
        </div>
    </div>

</main>