<main class="app-content">

    <div class="app-title">
        <div>
            <h1><i class="bi bi-table"></i> List User</h1>
        </div>
        <ul class="app-breadcrumb breadcrumb side">
            <li class="breadcrumb-item"><i class="bi bi-house-door fs-6"></i></li>
            <li class="breadcrumb-item">Tables</li>
            <li class="breadcrumb-item active"><a href="#">List User</a></li>
        </ul>
    </div>

    <div class="row">
        <div class="col-md-12 mb-3">
            <a href="?page=user&type=tambah" class="btn btn-primary"><i class="bi bi-plus-circle-fill me-2"></i>Tambah User</a>
        </div>
    </div>

    <?php if ($msg != "") {
        echo " <div class='alert alert-info'>$msg</div>";
    } ?>

    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <div class="tile-body">
                    <div class="table-responsive">
                        <table class="table table-hover table-bordered" id="sampleTable">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nama</th>
                                    <th>Username</th>
                                    <th>Level</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i = 0;
                                if ($user->all()) {
                                    foreach ($user->data() as $u) {
                                        $i++;
                                ?>
                                        <tr>
                                            <td><?= $i ?></td>
                                            <td><?= $u->nama ?></td>
                                            <td><?= $u->username ?></td>
                                            <td><?= $u->level ?></td>
                                            <td>
                                                <div class="bs-component mb-3">
                                                    <div class="btn-group" role="group" aria-label="Basic example">
                                                        <a href="?page=user&type=edit&id=<?= $u->id ?>" class="btn btn-secondary" type="button">
                                                            <i class="bi bi-pencil"></i>
                                                        </a>
                                                        <form action="?page=user" method="post">
                                                            <input type="hidden" name="id" value="<?= $u->id ?>">
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