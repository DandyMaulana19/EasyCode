<?php
include('../../components/navbar.php');
include('../../Controllers/auth.php');

?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../src/css/Admin/Dashboard.css">
    <link rel="stylesheet" href="../../components/navbar.css">
    <title>EasyCode | Platform Belajar Coding</title>
</head>

<section>
    <h1>Selamat Datang Pak <span><?= $_SESSION['username'] ?></span> !</h1>
    <div class="imgContainer">

        <img src="../../assets/undraw_steps_re_odoy.svg" alt="" style="width: 400px">
    </div>
</section>