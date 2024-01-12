<?php
include('../components/navbar.php');

include('../Models/User.php');
$data = new User();
$idUser = isset($_GET['id']) ? $_GET['id'] : null;
$user = $data->show($idUser);
var_dump($user);

$idUser = $user['idUser'];
$nama = $user['nama'];
$username = $user['username'];
$password = $user['password'];
$email = $user['email'];
$phone = $user['phone'];
$role = $user['role'];
$status = $user['status'];
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../src/css/ProfileUpdate.css">
    <link rel="stylesheet" href="../components/navbar.css">
    <title>EasyCode | Platform Belajar Coding</title>
</head>

<section>
    <div class="page">
        <h2>Edit Profile</h2>
        <form name="form" method="POST" action="../Controllers/ProfileController.php">

            <div class="inputForm">

                <input type="hidden" name="idUser" value="<?= $idUser ?>">

                <label for="nama">Nama:</label>
                <input type="text" id="nama" name="nama" value="<?= $nama ?>"></input>

                <label for="Username">Username:</label>
                <input type="text" id="username" name="username" placeholder="Masukkan Username" value="<?= $username ?>">

                <label for="password">Password:</label>
                <input type="password" id="password" name="password" placeholder="Masukkan Password" value="<?= $password ?>">

                <label for="email">Email:</label>
                <input type="email" id="email" name="email" placeholder="Masukkan Email" value="<?= $email ?>">

                <label for="phone">No HP:</label>
                <input type="tel" id="phone" name="phone" placeholder="Masukkan NoHP" value="<?= $phone ?>">

                <input type="hidden" name="role" value="<?= $role ?>">

                <input type="hidden" name="status" value="<?= $status ?>">

                <button type="submit" name="updateProfile" value="update">Update Profile</button>
            </div>
        </form>
    </div>

</section>