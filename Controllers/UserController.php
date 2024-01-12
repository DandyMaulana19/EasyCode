<?php

include("../Models/User.php");
include("../Models/UserHistory.php");

if (@$_POST['addUser'] == 'add') {
    $user = new User($_POST['nama'], $_POST['username'], $_POST['password'], $_POST['email'], $_POST['phone'], $_POST['role'], $_POST['status'],);
    var_dump($user);
    $user->store();
    header('Location:../pages/Admin/User.php');
}

if (@$_POST['updateUser']) {
    $data['idUser'] = $_POST['idUser'];
    $data['nama'] = $_POST['nama'];
    $data['username'] = $_POST['username'];
    $data['password'] = $_POST['password'];
    $data['email'] = $_POST['email'];
    $data['phone'] = $_POST['phone'];
    $data['role'] = $_POST['role'];
    $data['status'] = $_POST['status'];
    var_dump($data['idUser']);
    if ($data['status'] != "Active") {
        $user = new User();
        $user->edit($data);
        $history = new UserHistory(
            $data['idUser'],
            $data['nama'],
            $data['username'],
            $data['password'],
            $data['email'],
            $data['phone'],
            $data['role'],
            $data['status']
        );
        $history->store($data['idUser']);
    } else {
        $user = new User();
        $user->edit($data);
    }


    var_dump($data);
    header('Location:../pages/Admin/User.php');
}

if (@$_POST['login'] != null) {
    $usr = $_POST['username'];
    $pwd = $_POST['password'];
    $user = new User();
    if ($usr != null && $pwd != null) {
        $data = $user->auth($usr, $pwd);
        if ($data != null) {
            session_start();
            $_SESSION['username'] = $data['username'];
            header('Location:index.php');
        } else {
            header('Location:login.php?pesan=Username atau Password Salah!');
        }
    } else {
        header('Location:login.php?pesan=Username atau Password Kosong!');
    }
}
