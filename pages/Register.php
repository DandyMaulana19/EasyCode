<?php
// include('../components/navbar.php')
?>

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../src/css/Register.css" />
    <title>EasyCode | Platform Belajar Coding</title>
</head>


<section class="section">

    <section class="registerLeft">
        <h1 class="Logo">EasyCode</h1>
        <p>Daftarkan dirimu untuk menjelajahi lebih luas</p>
        <div class="form">
            <form action="../Controllers/RegisterController.php" method="POST">

                <label for="Nama">Nama</label>
                <input placeholder="Masukkan Nama" type="text" id="Nama" name="nama">

                <label for="Username">Username</label>
                <input placeholder="Masukkan Username" type="text" id="Username" name="username">

                <label for="Password">Password</label>
                <input placeholder="Masukkan Password" type="password" id="Password" name="password">

                <label for="Email">Email</label>
                <input placeholder="Masukkan Email" type="email" id="Email" name="email">

                <label for="phone">No HP</label>
                <input placeholder="Masukkan Nomor Handphone" type="tel" id="phone" name="phone">

                <button type="submit" name="register" value="reg">Daftar</button>
            </form>
        </div>
        <h4 class="Login">Sudah Punya akun ? <a href="./Login.php">Masuk.</a></h4>
    </section>

    <section class="registerRight">
        <img src="../assets/Register.jpg" alt="">
    </section>
</section>