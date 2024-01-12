<?php

require_once 'dbconnection.php';

class TransactionHistory
{
    private $database;
    private $idTransaction;
    private $idUser;
    private $idCourse;
    private $username;
    private $materi;
    private $totalPrice;
    private $transactionDate;

    function __construct($idTransaction = null, $idUser = null, $idCourse = null, $username = null, $materi = null, $totalPrice = null, $transactionDate = null)
    {
        $this->idTransaction = $idTransaction;
        $this->idUser = $idUser;
        $this->idCourse = $idCourse;
        $this->username = $username;
        $this->materi = $materi;
        $this->totalPrice = $totalPrice;
        $this->transactionDate = $transactionDate;
        $this->database = new dbconnection();
    }

    public function store()
    {
        $sql = 'INSERT INTO historytransaction(idTransaction, username, materi, totalPrice, transactionDate) 
        values(?,?,?,?,?)';
        $statement = $this->database->database->prepare($sql);

        if ($statement->execute([$this->idTransaction, $this->username, $this->materi, $this->totalPrice, $this->transactionDate])) {
            echo 'Data stored successfully!';
        } else {
            echo 'Data unsaved!';
        }
    }


    public function getData()
    {
        $sql = 'SELECT course.materi, user.username 
        FROM transactions
        INNER JOIN course ON transactions.idCourse = course.idCourse
        INNER JOIN user ON transactions.idUser = user.idUser
        WHERE transactions.idUser = :idUser AND transactions.idCourse = :idCourse';
        $statement = $this->database->database->prepare($sql);
        $statement->bindParam(':idUser', $this->idUser);
        $statement->bindParam(':idCourse', $this->idCourse);
        $statement->execute();
        $row = $statement->fetch(PDO::FETCH_ASSOC);

        return $row;
    }

    public function showAll()
    {
        $sql = 'SELECT * FROM historytransaction';
        $statement = $this->database->database->query($sql);
        $data = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }

    public function getHistory($idUser)
    {
        $sql = ' SELECT ht.idHistory, ht.idTransaction, t.idUser, ht.username, ht.materi, ht.totalPrice, ht.transactionDate
        FROM historytransaction ht
        JOIN transactions t ON ht.idTransaction = t.idTransaction
        WHERE t.idUser = :idUser';
        $statement = $this->database->database->prepare($sql);
        $statement->bindParam(':idUser', $idUser, PDO::PARAM_INT);
        $statement->execute();
        $historys = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $historys;
    }

    public function show($id)
    {
        try {
            $sql = 'SELECT * FROM historytransaction WHERE idUser = :id';
            $statement = $this->database->database->prepare($sql);
            $statement->bindParam(':id', $id, PDO::PARAM_INT);
            $statement->execute();
            $data = $statement->fetchAll(PDO::FETCH_ASSOC);
            return $data;
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

    public function start()
    {
        return $this->database->database->beginTransaction();
    }

    public function commit()
    {
        return $this->database->database->commit();
    }

    public function setData($idTransaction, $username, $materi, $totalPrice, $transactionDate)
    {
        $this->idTransaction = $idTransaction;
        $this->username = $username;
        $this->materi = $materi;
        $this->totalPrice = $totalPrice;
        $this->transactionDate = $transactionDate;
    }
}
