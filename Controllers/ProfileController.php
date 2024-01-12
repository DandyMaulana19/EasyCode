<?php
include('../Models/User.php');

if (@$_POST['updateProfile']) {
    $data['idUser'] = $_POST['idUser'];
    $data['nama'] = $_POST['nama'];
    $data['username'] = $_POST['username'];
    $data['password'] = $_POST['password'];
    $data['email'] = $_POST['email'];
    $data['phone'] = $_POST['phone'];
    $data['role'] = $_POST['role'];
    $data['status'] = $_POST['status'];
    $user = new User();
    // var_dump($data);
    $user->edit($data);
    header('Location:../pages/Profile.php');
}
