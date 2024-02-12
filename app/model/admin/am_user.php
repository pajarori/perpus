<?php

require_once 'app/includes/init.php';

if (!$user->isLoggedIn() && !$user->isAdmin()) {
    header('Location: ../');
    exit();
}

if (isset($_GET['type'])) {
    $type = $_GET['type'];
    if ($type == "tambah") {
        if (isset($_POST['submit'])) {
            $msg = $user->register($_POST['username'], $_POST['password'], $_POST['nama'], $_POST['level']);
        }
    } else if ($type == "edit") {
        if (isset($_GET['id'])) {
            if (isset($_POST['update'])) {
                $msg = $user->edit([
                    'nama' => $_POST['nama'],
                    'password' => $_POST['password'],
                    'level' => $_POST['level']
                ], $_GET['id']);
            }

            if ($user->find($_GET['id'])) {
                $detail = $user->data();
            } else {
                $msg = "User tidak ditemukan.";
            }
        }
    }
}

if (isset($_POST['delete']) && isset($_POST['id'])) {
    if ($user->find($_POST['id'])) {
        if ($user->delete($user->data()->id)) {
            $msg = "User berhasil dihapus.";
        } else {
            $msg = "User gagal dihapus.";
        }
    }
}
