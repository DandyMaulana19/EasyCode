<?php
include("../../components/navbar.php");
include("../../Controllers/auth.php");
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../src/css/Admin/UserDetail.css">
    <link rel="stylesheet" href="../../components/navbar.css">
    <link rel="stylesheet" href="../../components/footer.css">
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
    <title>EasyCode | Platform Belajar Coding</title>
</head>


<section>

    <div class="wrapper">
        <h2>Add User</h2>

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
                include("../../Models/TransactionHistory.php");
                $datas = new TransactionHistory();
                $idUser = isset($_GET['idUser']) ? $_GET['idUser'] : null;
                $historys = $datas->getHistory($idUser);
                // var_dump($historys);
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

</section>

<?php
include('../../components/footer.php')
?>