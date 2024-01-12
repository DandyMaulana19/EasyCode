<?php
require_once 'dbconnection.php';
class Course
{
    private $database;
    private $idCourse;
    private $category;
    private $image;
    private $price;
    private $materi;
    private $rank;

    function __construct($category = null, $image = null, $price = null, $materi = null, $rank = null)
    {
        $this->category = $category;
        $this->image = $image;
        $this->price = $price;
        $this->materi = $materi;
        $this->rank = $rank;
        $this->database = new dbconnection();
    }
    public function store()
    {
        $uploadPath = '../public/img';

        if (is_array($this->image) && isset($this->image['name'], $this->image['tmp_name'])) {
            $imageName = basename($this->image['name']);
            $targetFilePath = $uploadPath . '/' . $imageName;

            move_uploaded_file($this->image['tmp_name'], $targetFilePath);

            $sql = 'INSERT INTO course(category, image, price, materi, rank) 
            VALUES (?, ?, ?, ?, ?)';
            $statement = $this->database->database->prepare($sql);

            if ($statement->execute([$this->category, $imageName, $this->price, $this->materi, $this->rank])) {
                echo 'Data berhasil disimpan';
            } else {
                echo 'Data gagal disimpan';
            }
        }
    }
    public function showAll()
    {
        $sql = 'SELECT * FROM course';
        $statement = $this->database->database->query($sql);
        $data = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }

    public function show($id)
    {
        $sql = 'SELECT * FROM course WHERE idCourse = :id';
        $statement = $this->database->database->prepare($sql);
        $statement->bindParam(':id', $id, PDO::PARAM_INT);
        $statement->execute();
        $data = $statement->fetch(PDO::FETCH_ASSOC);
        return $data;
    }

    public function destroy($id)
    {
        $imageName = $this->getImage($id);

        $sql = 'DELETE FROM course WHERE idCourse = :id';

        $statement = $this->database->database->prepare($sql);
        $statement->bindParam(':id', $id, PDO::PARAM_INT);

        if ($statement->execute()) {
            $this->deleteImage($imageName);
            return ['status' => 'Hapus berhasil'];
        } else {
            return ['status' => 'Hapus gagal'];
        }
    }

    public function edit($data)
    {
        $uploadPath = '../public/img';

        $imageName = basename($data['image']['name']);
        $targetFilePath = $uploadPath . '/' . $imageName;

        if (!empty($imageName)) {
            $targetFilePath = $uploadPath . '/' . basename($imageName);
            move_uploaded_file($data['image']['tmp_name'], $targetFilePath);
        } else {
            $imageName = $data['currentImage'];
        }

        $sql = 'UPDATE course SET category=:category, image=:image, price=:price, materi=:materi, rank=:rank WHERE idCourse=:idCourse';
        $statement = $this->database->database->prepare($sql);
        $statement->bindParam(':idCourse', $data['idCourse'], PDO::PARAM_INT);
        $statement->bindParam(':category', $data['category'], PDO::PARAM_STR);
        $statement->bindParam(':image', $imageName);
        $statement->bindParam(':price', $data['price'], PDO::PARAM_STR);
        $statement->bindParam(':materi', $data['materi'], PDO::PARAM_STR);
        $statement->bindParam(':rank', $data['rank'], PDO::PARAM_STR);

        return $statement->execute();
    }

    public function getImage($id)
    {
        $sql = 'SELECT image FROM course WHERE idCourse = :id';
        $statement = $this->database->database->prepare($sql);
        $statement->bindParam(':id', $id, PDO::PARAM_INT);
        $statement->execute();

        return $statement->fetchColumn();
    }

    public function deleteImage($imageName)
    {
        $imagePath = '../public/img/' . $imageName;
        if (file_exists($imagePath)) {
            unlink($imagePath);
        }
    }

    public function getCourse($idCourse)
    {
        $sql = "SELECT * FROM course WHERE idCourse = :idCourse";
        $statement = $this->database->database->prepare($sql);
        $statement->bindParam(':idCourse', $idCourse);
        $statement->execute();
        $courseInfo = $statement->fetch(PDO::FETCH_ASSOC);

        return $courseInfo;
    }
}
