<?php
require_once 'app/includes/init.php';

if ($user->isLoggedIn()) {
    header('Location: index.php');
    exit();
}

$msg = "";
if (isset($_POST['login'])) {
    $username = escape($_POST['username']);
    $password = escape($_POST['password']);

    if ($user->login($username, $password)) {
        header('Location: index.php');
        $msg = 'Login berhasil.';
    } else {
        $msg = 'Username atau password salah.';
    }
} else if (isset($_POST['register'])) {
    $username = escape($_POST['username']);
    $password = escape($_POST['password']);
    $nama = escape($_POST['nama']);

    $msg = $user->register($username, $password, $nama);
}
