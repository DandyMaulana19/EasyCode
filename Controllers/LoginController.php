<?php
include('../Models/User.php');

if (@$_POST['Login'] != null) {
    $usr = $_POST['username'];
    $pwd = $_POST['password'];
    $user = new User();
    if ($usr != null && $pwd != null) {
        $data = $user->auth($usr, $pwd);
        if ($data != null) {
            session_start();
            $_SESSION['idUser'] = $data['idUser'];
            $_SESSION['username'] = $data['username'];
            $_SESSION['role'] = $data['role'];
            $_SESSION['status'] = $data['status'];
            if ($_SESSION['role'] === 'Admin') {
                header('Location: ../pages/Admin/Dashboard.php');
            } elseif ($_SESSION['role'] === 'User') {
                header('Location: ../pages/Dashboard.php');
            }
        } else {
            // var_dump("halo");
            header('Location:../pages/Login.php?pesan=Username atau Password Salah!');
        }
    } else {
        // var_dump("halo");
        header('Location:../pages/Login.php?pesan=Username atau Password Kosong!');
    }
}
