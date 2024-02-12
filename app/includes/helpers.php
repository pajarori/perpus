<?php

function escape($string)
{
    return htmlspecialchars($string, ENT_QUOTES, 'UTF-8');
}

function autoload($class_name)
{
    if (is_file('app/model/core/' . $class_name . '.php')) {
        require_once 'app/model/core/' . $class_name . '.php';
    } else if (is_file('app/includes/' . $class_name . '.php')) {
        require_once 'app/includes/' . $class_name . '.php';
    }
}

function uploadGambar($file, $dir)
{
    $nama_file = $file['name'];
    $nama_tmp = $file['tmp_name'];
    $error = $file['error'];

    if ($error === 4) {
        return 'no-image.jpg';
    }

    $ekstensi_file = explode('.', $nama_file);
    $ekstensi_file = strtolower(end($ekstensi_file));

    if (!in_array($ekstensi_file, ['jpg', 'jpeg', 'png'])) {
        return false;
    }

    $nama_file_baru = uniqid() . '.' . $ekstensi_file;

    move_uploaded_file($nama_tmp, $dir . $nama_file_baru);

    return $nama_file_baru;
}
