<?php
if (@$_SESSION['username'] != null) {
    header('Location: ./index.php');
}
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../src/css/Login.css">
    <title>EasyCode | Platform Belajar Coding</title>
</head>

<body>

    <section class="loginLeft">
        <h1 class="Logo">EasyCode</h1>
        <p>Hai, Masukkan akunmu untuk menjelajahi lebih luas</p>
        <div class="form">
            <form name="login" action="../Controllers/LoginController.php" method="POST">
                <label for="Username">Username</label>
                <input placeholder="Masukkan Username" type="text" id="Username" name="username">

                <label for="Password">Password</label>
                <input placeholder="Masukkan Password" type="password" id="Password" name="password">

                <button type="submit" name="Login" value="log">Masuk</button>
            </form>
        </div>
        <h4 class="Register">Belum Punya akun ? <a href="./Register.php">Daftar.</a></h4>
    </section>

    <section class="loginRight">
        <img src="../assets/Login .jpg" alt="">
    </section>

</body>