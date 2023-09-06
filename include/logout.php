<?php
session_start();
unset($_SESSION['IS_LOGIN']);
header('location:../index.html');
session_destroy();
die();
?>