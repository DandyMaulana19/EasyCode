<?php
session_start();
include('auth.php');
unset($_SESSION['username']);
session_destroy();
header('Location:Login.php?pesan=Anda Sudah Logout.');
