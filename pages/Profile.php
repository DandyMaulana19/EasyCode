<?php
include('../components/navbar.php');
include('../Models/User.php');
include('../Models/Transactions.php');
if (isset($_SESSION['idUser'])) {
    $idUser = $_SESSION['idUser'];

    $data = new User();
    $user = $data->profile($idUser);
} else {
    var_dump('halo');
}
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
    <link rel="stylesheet" href="../components/navbar.css">
    <link rel="stylesheet" href="../src/css/Profile.css">
    <title>EasyCode | Platform Belajar Coding</title>
</head>

<section>
    <div class="left">
        <div class="profile">
            <h1>Halo <span style="color:var(--text-color)"><?= $nama ?></span> !</h1>
            <div class="profileDetail">
                <p>Nama: <?= $nama ?></p>
                <p>Username: <?= $username ?></p>
                <p>Password: <?= $password ?></p>
                <p>Email: <?= $email ?></p>
                <p>No Hp: <?= $phone ?></p>
                <div class="btnEdit">
                    <a href="./Profile_update.php?status=update&id=<?= $idUser ?>">Edit</a>
                </div>
            </div>
        </div>
    </div>

    <div class="right">
        <div class="history">
            <h1 class="title">Riwayat Transaksi</h1>
            <table>
                <thead>
                    <tr class="tableHeader">
                        <th class="First">Materi</th>
                        <th>Harga</th>
                        <th class="Last">Tanggal Transaksi</th>
                    </tr>
                </thead>

                <tbody>

                    <?php
                    include("../Models/TransactionHistory.php");
                    $datas = new TransactionHistory();
                    $idUser = $_SESSION['idUser'];
                    $historys = $datas->getHistory($idUser);
                    foreach ($historys as $history) :
                        if (isset($history['materi']) && isset($history['transactionDate'])) {
                    ?>
                            <tr>
                                <td><?= $history['materi'] ?></td>
                                <td><?= $history['totalPrice'] ?></td>
                                <td><?= $history['transactionDate'] ?></td>
                            </tr>
                    <?php
                        }
                    endforeach;
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</section>

<?php
include('../components/footer.php');
?>