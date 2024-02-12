<?php
require_once 'loader.php';

require_once APP_VIEW . 'includes/header.php';
require_once APP_VIEW . 'includes/sidebar.php';

if (isset($_GET['id'])) {
    require_once APP_MODEL . 'm_buku.php';
    require_once APP_VIEW . 'buku.php';
} else {
    require_once APP_VIEW . 'etalase.php';
}

require_once APP_VIEW . 'includes/footer.php';
