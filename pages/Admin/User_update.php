<?php
include('../../components/navbar.php');

include('../../Models/User.php');
$data = new User();
$idUser = isset($_GET['id']) ? $_GET['id'] : null;
$user = $data->show($idUser);

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
    <link rel="stylesheet" href="../../src/css/Admin/UserUpdate.css">
    <link rel="stylesheet" href="../../components/navbar.css">
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
    <title>EasyCode | Platform Belajar Coding</title>
</head>

<section>
    <div class="page">
        <h2>Edit User</h2>
        <form name="form" method="POST" action="../../Controllers/UserController.php">

            <div class="inputForm">

                <input type="hidden" name="idUser" value="<?= $idUser ?>">

                <input type="hidden" id="nama" name="nama" value="<?= $nama ?>">
                <input type="hidden" id="username" name="username" value="<?= $username ?>">
                <input type="hidden" id="email" name="email" value="<?= $email ?>">
                <input type="hidden" id="phone" name="phone" value="<?= $phone ?>">

                <label for="password">Password:</label>
                <input type="password" id="password" name="password" placeholder="Masukkan Password" value="<?= $password ?>">

                <label for="role">Role:</label>
                <select id="role" name="role">
                    <option value="User" <?= ($role == 'User') ? 'selected' : '' ?>>User</option>
                    <option value="Admin" <?= ($role == 'Admin') ? 'selected' : '' ?>>Admin</option>
                </select>

                <label for="status">Status:</label>
                <select id="status" name="status">
                    <option value="Active" <?= ($status == 'Active') ? 'selected' : '' ?>>Aktif</option>
                    <option value="Non-Active" <?= ($status == 'Non-Active') ? 'selected' : '' ?>>Non Aktif</option>
                </select>

                <button type="submit" name="updateUser" value="update">Update User</button>
            </div>
        </form>
    </div>

</section>