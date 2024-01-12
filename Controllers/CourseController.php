<?php
include("../Models/Course.php");

if (@$_POST['addCourse'] == 'add') {
    $category = $_POST['category'];
    $image = $_FILES['image'];
    $price = $_POST['price'];
    $materi = $_POST['materi'];
    $rank = $_POST['rank'];
    $course = new Course($category, $image, $price, $materi, $rank);
    var_dump($course);
    $course->store();
    header('Location:../pages/Admin/Course.php?pesan=' . $pesan['status']);
}

if (@$_GET['status'] == 'del') {
    $course = new Course();
    $pesan = $course->destroy($_GET['id']);
    header('Location:../pages/Admin/Course.php?pesan=' . $pesan['status']);
}

if (@$_POST['updateCourse'] == 'update') {
    $data['idCourse'] = $_POST['idCourse'];
    $data['category'] = $_POST['category'];
    $data['image'] = $_FILES['image'];
    $data['currentImage'] = $_POST['currentImage'];
    $data['price'] = $_POST['price'];
    $data['materi'] = $_POST['materi'];
    $data['rank'] = $_POST['rank'];
    $course = new Course();
    var_dump($data);
    $course->edit($data);
    header('Location:../pages/Admin/Course.php');
}
?>

<?php
