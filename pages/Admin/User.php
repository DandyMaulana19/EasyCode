<?php
include('../../components/navbar.php');
include("../../Controllers/auth.php");

?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../src/css/Admin/User.css">
    <link rel="stylesheet" href="../../components/navbar.css">
    <link rel="stylesheet" href="../../components/footer.css">
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
    <title>EasyCode | Platform Belajar Coding</title>
</head>


<section>

    <h2>Add User</h2>
    <form name="form" method="POST" action="../../Controllers/UserController.php">

        <div class="inputForm">

            <div class="wrapper">
                <label for="name">Nama:</label>
                <input type="text" id="name" name="nama" placeholder="Masukkan Nama" required>
            </div>

            <div class="wrapper">
                <label for="Username">Username:</label>
                <input type="text" id="username" name="username" placeholder="Masukkan Username" required>
            </div>

            <div class="wrapper">
                <label for="Password">Password:</label>
                <input type="password" id="password" name="password" placeholder="Masukkan Password" required>
            </div>

            <div class="wrapper">
                <label for="Email">Email:</label>
                <input type="email" id="email" name="email" placeholder="Masukkan Email" required>
            </div>

            <div class="wrapper">
                <label for="phone">No HP:</label>
                <input type="tel" id="phone" name="phone" placeholder="Masukkan No HP" required>
            </div>

            <label for="role">Role:</label>
            <select id="role" name="role">
                <option value="User">User</option>
                <option value="Admin">Admin</option>
            </select>

            <label for="status">Status:</label>
            <select id="status" name="status">
                <option value="Active">Aktif</option>
                <option value="Non-Active">Non Aktif</option>
            </select>

            <button type="submit" name="addUser" value="add">Create Course</button>
        </div>
    </form>

    <table>
        <thead>
            <tr class="tableHeader">
                <th class="First">ID</th>
                <th>Nama</th>
                <th>Username</th>
                <th>Password</th>
                <th>Email</th>
                <th>No HP</th>
                <th>Role</th>
                <th>Status</th>
                <th class="Last">Action</th>
            </tr>
        </thead>

        <tbody>

            <?php
            include("../../Models/User.php");
            $data = new User();
            $users = $data->showAll();
            foreach ($users as $user) :
            ?>
                <tr>
                    <td><?= $user['idUser'] ?></td>
                    <td><?= $user['nama'] ?></td>
                    <td><?= $user['username'] ?></td>
                    <td><?= $user['password'] ?></td>
                    <td><?= $user['email'] ?></td>
                    <td><?= $user['phone'] ?></td>
                    <td><?= $user['role'] ?></td>
                    <td><?= $user['status'] ?></td>
                    <td class="action">
                        <a href="./User_detail.php?idUser=<?= $user['idUser'] ?>">Detail</a>
                        <a href="./User_update.php?status=update&id=<?= $user['idUser'] ?>">Edit</a>
                    </td>
                </tr>
            <?php
            endforeach;
            ?>
        </tbody>
    </table>
</section>

<?php
include('../../components/footer.php')
?>