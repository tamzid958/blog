<?php
session_start();
ob_start();

$past = time() - 86400 * 30;
foreach ($_COOKIE as $key => $value) {
    setcookie($key, $value, $past, '/');
}
$helper = array_keys($_SESSION);
foreach ($helper as $key) {
    unset($_SESSION[$key]);
}
session_destroy();
header("Location:/login.php");
