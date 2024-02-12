<?php
require_once 'app/includes/init.php';

$msg = "";
$detail = [];

if (!$user->isLoggedIn()) {
    header('Location: login.php');
    exit();
}

if (isset($_GET["id"])) {
    $bukuid = $_GET["id"];
    $detail = $buku->find("id", $bukuid);

    if ($buku->count() > 0) {
        $detail = $buku->first();
    } else {
        $msg = "Buku tidak ditemukan.";
    }

    if (isset($_POST['pinjam_buku'])) {
        if ($pinjam->find($detail->id, 'dipinjam')) {
            if ($pinjam->count() >= $detail->jumlah_buku) {
                $msg = "Buku sedang dipinjam.";
            } else {
                $pinjam->pinjam($detail->id);
                $msg = "Buku berhasil dipinjam.";
            }
        } else {
            $pinjam->pinjam($detail->id);
            $msg = "Buku berhasil dipinjam.";
        }
    } else if (isset($_POST['kembalikan_buku'])) {
        if ($pinjam->ismybook($detail->id)) {
            if ($pinjam->kembali($pinjam->data()->id)) {
                $msg = "Buku berhasil dikembalikan.";
            } else {
                $msg = "Buku gagal dikembalikan.";
            }
        }
    }
} else {
    $msg = "Buku tidak ditemukan.";
}

$totalbuku = 0;
$available = true;
if ($pinjam->find($detail->id, 'dipinjam')) {
    if ($pinjam->count() >= $detail->jumlah_buku || $pinjam->ismybook($detail->id)) {
        $pinjaman = "Buku sedang dipinjam";
        $available = false;
    } else {
        $pinjaman = "Tersedia " . ($detail->jumlah_buku - $pinjam->count());
    }
} else {
    $pinjaman = "Tersedia " . $detail->jumlah_buku;
}
