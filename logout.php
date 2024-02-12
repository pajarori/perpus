<?php

require_once 'loader.php';

$user->logout();

header('Location: login.php');
