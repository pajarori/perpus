<main class="app-content">
    <div class="app-title">
        <div>
            <h1><i class="bi bi-table"></i> Data Peminjam</h1>
        </div>
        <ul class="app-breadcrumb breadcrumb side">
            <li class="breadcrumb-item"><i class="bi bi-house-door fs-6"></i></li>
            <li class="breadcrumb-item">Tables</li>
            <li class="breadcrumb-item active"><a href="#">Data Peminjam</a></li>
        </ul>
    </div>

    <div class="row">
        <div class="col-md-12 mb-3">
            <a href="/cetak.php" class="btn btn-primary"><i class="bi bi-plus-circle-fill me-2"></i>Cetak Pinjaman</a>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <div class="tile-body">
                    <div class="table-responsive">
                        <table class="table table-hover table-bordered" id="sampleTable">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Buku</th>
                                    <th>Peminjam</th>
                                    <th>Tanggal Pinjam</th>
                                    <th>Tanggal Dikembalikan</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i = 0;
                                if ($pinjam->all()) {
                                    foreach (array_reverse($pinjam->data()) as $pinjaman) {
                                        $i++;
                                ?>
                                        <tr>
                                            <td><?= $i ?></td>
                                            <td><?= $pinjaman->judul ?></td>
                                            <td><?= $pinjaman->username ?></td>
                                            <td><?= $pinjaman->tanggal_pinjam ?></td>
                                            <td><?= $pinjaman->tanggal_kembali ?></td>
                                            <td><?= $pinjaman->status ?></td>
                                        </tr>
                                <?php
                                    }
                                } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <link rel="stylesheet" href="https://cdn.datatables.net/v/bs5/dt-1.13.4/datatables.min.css">
    <!-- Data table plugin-->
    <script type="text/javascript" src="<?= BASE_URL ?>assets/js/plugins/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="<?= BASE_URL ?>assets/js/plugins/dataTables.bootstrap.min.js"></script>
    <script type="text/javascript">
        $('#sampleTable').DataTable();
    </script>
</main>