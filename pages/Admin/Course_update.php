<?php
include('../../components/navbar.php');
include('../../Models/Course.php');
$data = new Course();
$idCourse = isset($_GET['id']) ? $_GET['id'] : null;
$course = $data->show($idCourse);

$idCourse = $course['idCourse'];
$category = $course['category'];
$currentImage = $course['image'];
$price = $course['price'];
$materi = $course['materi'];
$rank = $course['rank'];

$image = isset($_POST['image']) ? $_POST['image'] : $currentImage;
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../components/navbar.css">
    <link rel="stylesheet" href="../../src/css/Admin/CourseUpdate.css">
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
    <title>EasyCode | Platform Belajar Coding</title>
</head>

<section>
    <div class="page">
        <h2>Create Course</h2>
        <form name="form" method="POST" action="../../Controllers/CourseController.php" enctype="multipart/form-data">

            <div class="inputForm">

                <input type="hidden" name="idCourse" value="<?= $idCourse ?>">

                <div class="wrapper">
                    <label for="category">Category:</label>
                    <select id="category" name="category">
                        <option value="Web Development" <?= ($category == 'Web Development') ? 'selected' : '' ?>>Web Development</option>
                        <option value="Mobile Development" <?= ($category == 'Mobile Development') ? 'selected' : '' ?>>Mobile Development</option>
                        <option value="Data" <?= ($category == 'Data') ? 'selected' : '' ?>>Data Science</option>
                    </select>
                </div>

                <div class="wrapper">
                    <label for="image">Pilih Gambar:</label>
                    <input type="file" name="image" id="image" accept="image/jpeg, image/png, image/jpg, image/gif">
                    <p><?= $currentImage ?></p>
                    <input type="hidden" name="currentImage" value="<?= $currentImage ?>">
                </div>

                <div class="wrapper">
                    <label for="price">Price:</label>
                    <input type="number" id="price" name="price" placeholder="Enter price" value="<?= $price ?>">
                </div>

                <div class="wrapper">
                    <label for="materi">Materi:</label>
                    <input type="text" id="materi" name="materi" placeholder="Enter course materials" value="<?= $materi ?>">
                </div>

                <?php
                // var_dump($rank);
                ?>

                <div class="wrapper">
                    <label for="rank">Level:</label>
                    <select id="rank" name="rank">
                        <option value="Beginner" <?= ($rank == 'Beginner') ? 'selected' : '' ?>>Beginner</option>
                        <option value="Intermediate" <?= ($rank == 'Intermediate') ? 'selected' : '' ?>>Intermediate</option>
                        <option value="Advanced" <?= ($rank == 'Advanced') ? 'selected' : '' ?>>Advanced</option>
                    </select>
                </div>

                <button type="submit" name="updateCourse" value="update">Update Course</button>
            </div>
        </form>
    </div>

</section>