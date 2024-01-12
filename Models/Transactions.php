<?php

require_once 'dbconnection.php';

class Transactions
{
    private $database;
    private $idTransaction;
    private $idUser;
    private $idCourse;
    private $totalPrice;
    private $transactionDate;

    function __construct($idUser = null, $idCourse = null, $totalPrice = null, $transactionDate = null)
    {
        $this->idUser = $idUser;
        $this->idCourse = $idCourse;
        $this->totalPrice = $totalPrice;
        $this->transactionDate = $transactionDate;
        $this->database = new dbconnection();
    }

    public function store()
    {
        $sql = 'insert into transactions(idUser, idCourse,totalPrice, transactionDate) 
        values(?,?,?,?)';
        $statement = $this->database->database->prepare($sql);
        if ($statement->execute([$this->idUser, $this->idCourse, $this->totalPrice, $this->transactionDate])) {
            return $this->database->database->lastInsertId();
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

    public function getSoldOut($id)
    {
        $sql = 'SELECT idCourse FROM transactions WHERE idUser = :id';
        $statement = $this->database->database->prepare($sql);
        $statement->bindParam(':id', $id, PDO::PARAM_INT);
        $statement->execute();
        $data = $statement->fetchAll(PDO::FETCH_COLUMN);
        return $data;
    }

    public function start()
    {
        return $this->database->database->beginTransaction();
    }

    public function commit()
    {
        return $this->database->database->commit();
    }
}
