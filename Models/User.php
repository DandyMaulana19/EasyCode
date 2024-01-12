<?php

require_once 'dbconnection.php';

class User
{
    private $database;
    private $idUser;
    private $nama;
    private $username;
    private $password;
    private $email;
    private $phone;
    private $role;
    private $status;

    function __construct($nama = null, $username = null, $password = null, $email = null, $phone = null, $role = null, $status = null)
    {
        $this->nama = $nama;
        $this->username = $username;
        $this->password = $password;
        $this->email = $email;
        $this->phone = $phone;
        $this->role = $role;
        $this->status = $status;
        $this->database = new dbconnection();
    }

    public function store()
    {
        $sql = 'insert into user(nama, username, password, email, phone, role, status) 
        values(?,?,?,?,?,?,?)';
        $role = $this->status === null ?  'User' : $this->role;
        $status = $this->status === null ?  'Active' : $this->status;
        $statement = $this->database->database->prepare($sql);
        if ($statement->execute([$this->nama, $this->username, $this->password, $this->email, $this->phone, $role, $status])) {
            echo 'Data stored successfully!';
        } else {
            echo 'Data unsaved!';
        }
    }
    public function showAll()
    {
        $sql = 'SELECT * FROM user';
        $statement = $this->database->database->query($sql);
        $data = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }

    public function show($id)
    {
        $sql = 'SELECT * FROM user WHERE idUser = :id';
        $statement = $this->database->database->prepare($sql);
        $statement->bindParam(':id', $id, PDO::PARAM_INT);
        $statement->execute();
        $data = $statement->fetch(PDO::FETCH_ASSOC);
        return $data;
    }

    public function edit($data)
    {
        $sql = 'UPDATE user SET nama=:nama, username=:username, password=:password, email=:email, phone=:phone, role=:role  , status=:status WHERE idUser=:idUser';
        $statement = $this->database->database->prepare($sql);
        $statement->bindParam(':idUser', $data['idUser'], PDO::PARAM_INT);
        $statement->bindParam(':nama', $data['nama'], PDO::PARAM_STR);
        $statement->bindParam(':username', $data['username'], PDO::PARAM_STR);
        $statement->bindParam(':password', $data['password'], PDO::PARAM_STR);
        $statement->bindParam(':email', $data['email'], PDO::PARAM_STR);
        $statement->bindParam(':phone', $data['phone'], PDO::PARAM_STR);
        $statement->bindParam(':role', $data['role'], PDO::PARAM_STR);
        $statement->bindParam(':status', $data['status'], PDO::PARAM_STR);

        return $statement->execute();
    }
    public function auth($user, $password)
    {
        $sql = 'SELECT * FROM user WHERE username=:username AND password=:password AND status = "Active" limit 1';
        $statement = $this->database->database->prepare($sql);
        $statement->bindParam(':username', $user, PDO::PARAM_STR);
        $statement->bindParam(':password', $password, PDO::PARAM_STR);
        $statement->execute();
        $data = $statement->fetch();
        return $data;
    }

    public function profile($id)
    {
        $sql = "SELECT * FROM user WHERE idUser = :id";
        $statement = $this->database->database->prepare($sql);
        $statement->bindParam(':id', $id, PDO::PARAM_INT);
        $statement->execute();
        $data = $statement->fetch(PDO::FETCH_ASSOC);

        return $data;
    }
}
