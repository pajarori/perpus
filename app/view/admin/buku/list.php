<main class="app-content">

    <div class="app-title">
        <div>
            <h1><i class="bi bi-table"></i> Data Buku</h1>
        </div>
        <ul class="app-breadcrumb breadcrumb side">
            <li class="breadcrumb-item"><i class="bi bi-house-door fs-6"></i></li>
            <li class="breadcrumb-item">Tables</li>
            <li class="breadcrumb-item active"><a href="#">Data Buku</a></li>
        </ul>
    </div>

    <?php if ($msg != "") {
        echo " <div class='alert alert-info'>$msg</div>";
    } ?>

    <div class="row">
        <div class="col-md-12 mb-3">
            <a href="<?= BASE_URL ?>admin.php?page=buku&type=tambah" class="btn btn-primary"><i class="bi bi-plus-circle-fill me-2"></i>Tambah Buku</a>
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
                                    <th>Judul</th>
                                    <th>Penerbit</th>
                                    <th>Pengarang</th>
                                    <th>Tahun Terbit</th>
                                    <th>Lokasi</th>
                                    <th>Jumlah</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i = 0;
                                if ($buku->all()) {
                                    foreach ($buku->data() as $buku) {
                                        $i++;
                                ?>
                                        <tr>
                                            <td><?= $i ?></td>
                                            <td><?= $buku->judul ?></td>
                                            <td><?= $buku->penerbit ?></td>
                                            <td><?= $buku->pengarang ?></td>
                                            <td><?= $buku->tahun_terbit ?></td>
                                            <td><?= $buku->lokasi ?></td>
                                            <td><?= $buku->jumlah_buku ?></td>
                                            <td>
                                                <div class="bs-component mb-3">
                                                    <div class="btn-group" role="group" aria-label="Basic example">
                                                        <a href="?page=buku&type=edit&id=<?= $buku->id ?>" class="btn btn-secondary" type="button">
                                                            <i class="bi bi-pencil"></i>
                                                        </a>
                                                        <form action="" method="post">
                                                            <input type="hidden" name="id" value="<?= $buku->id ?>">
                                                            <button name="delete" class="btn btn-danger" type="submit">
                                                                <i class="bi bi-trash3"></i>
                                                            </button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>

                                <?php
                                    }
                                }
                                ?>
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