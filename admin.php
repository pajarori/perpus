<?php
require_once 'loader.php';

require_once APP_VIEW . 'includes/header.php';
require_once APP_VIEW . 'includes/sidebar.php';

if (isset($_GET['page'])) {
    $type = "";
    if (isset($_GET['type'])) {
        $type = $_GET['type'];
    }

    $page = $_GET['page'];
    if ($page == "buku") {
        require_once APP_MODEL . 'admin/am_buku.php';
        if ($type == "edit") {
            require_once APP_VIEW . 'admin/buku/edit.php';
        } else  if ($type == "tambah") {
            require_once APP_VIEW . 'admin/buku/tambah.php';
        } else {
            require_once APP_VIEW . 'admin/buku/list.php';
        }
    } else if ($page == "pinjaman") {
        require_once APP_MODEL . 'admin/am_pinjaman.php';
        if ($type == "edit") {
            require_once APP_VIEW . 'admin/pinjaman/edit.php';
        } else {
            require_once APP_VIEW . 'admin/pinjaman/list.php';
        }
    } else if ($page == "user") {
        require_once APP_MODEL . 'admin/am_user.php';
        if ($type == "edit") {
            require_once APP_VIEW . 'admin/user/edit.php';
        } else if ($type == "tambah") {
            require_once APP_VIEW . 'admin/user/tambah.php';
        } else {
            require_once APP_VIEW . 'admin/user/list.php';
        }
    }
}

require_once APP_VIEW . 'includes/footer.php';
