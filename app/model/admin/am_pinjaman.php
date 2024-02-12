<?php

require_once 'app/includes/init.php';

if (!$user->isLoggedIn() && !$user->isAdmin()) {
    header('Location: ../');
    exit();
}