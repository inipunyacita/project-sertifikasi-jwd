<?php
session_start();
if ($_SESSION["role"] == 0) {
    unset($_SESSION['role']);
}
header("Location: login.php");
exit;
