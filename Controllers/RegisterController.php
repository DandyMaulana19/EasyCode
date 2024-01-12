<?php

include("../Models/User.php");

if (@$_POST['register'] == 'reg') {
    $user = new User($_POST['nama'], $_POST['username'], $_POST['password'], $_POST['email'], $_POST['phone'], $_POST['role'], $_POST['status'],);
    var_dump($user);
    $user->store();
    header('Location:../pages/Login.php');
}
