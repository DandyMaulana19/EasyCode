<?php
include("../Models/Transactions.php");
include("../Models/TransactionHistory.php");

if (@$_POST['addPayment'] == 'add') {
    $transactions = new Transactions($_POST['idUser'], $_POST['idCourse'], $_POST['totalPrice'], $_POST['transactionDate']);
    $transactions->start();

    $idTransaction = $transactions->store();

    if ($idTransaction !== false) {
        $transactions->commit();

        $history = new TransactionHistory();
        $row = $transactions->getData();

        if (is_array($row) && count($row) > 0) {
            $history->setData($idTransaction, $row['username'], $row['materi'], $_POST['totalPrice'], $_POST['transactionDate']);
            $history->store();
            var_dump($history);
            header('Location:../pages/Katalog.php');
        } else {
            echo "gagal";
        }
    } else {
        echo "gagal menyimpan transaksi";
    }
}
