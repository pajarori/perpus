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
            $msg = $buku->tambahBuku([
                'judul' => $_POST['judul'],
                'pengarang' => $_POST['pengarang'],
                'penerbit' => $_POST['penerbit'],
                'tahun_terbit' => $_POST['tahun_terbit'],
                'jumlah_buku' => $_POST['jumlah_buku'],
                'isbn' => $_POST['isbn'],
                'deskripsi' => $_POST['deskripsi'],
                'lokasi' => $_POST['lokasi']
            ], $_FILES['gambar']);
        }
    } else if ($type == "edit") {
        if (isset($_GET['id'])) {
            if (isset($_POST['update'])) {
                $msg = $buku->editBuku([
                    'judul' => $_POST['judul'],
                    'pengarang' => $_POST['pengarang'],
                    'penerbit' => $_POST['penerbit'],
                    'tahun_terbit' => $_POST['tahun_terbit'],
                    'jumlah_buku' => $_POST['jumlah_buku'],
                    'isbn' => $_POST['isbn'],
                    'deskripsi' => $_POST['deskripsi'],
                    'lokasi' => $_POST['lokasi']
                ], $_GET['id'], $_FILES['gambar']);
            }

            if ($buku->find("id", $_GET['id'])) {
                $detail = $buku->first();
            }
        }
    }
}

if (isset($_POST['delete']) && isset($_POST['id'])) {
    if ($buku->find("id", $_POST['id'])) {
        if ($buku->delete($buku->first()->id)) {
            $pinjaman->deleteBuku($buku->first()->id);
            $msg = "Buku berhasil dihapus.";
        } else {
            $msg = "Buku gagal dihapus.";
        }
    }
}
