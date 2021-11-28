<?php
session_start();
if ($_SESSION["role"] == 1) {
    unset($_SESSION['role']);
}
header("Location: login.php");
exit;
