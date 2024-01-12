<?php
include('../components/navbar.php');
include('../Controllers/auth.php');
include('../Models/Course.php');

$data = new Course();
$idCourse = isset($_GET['id']) ? $_GET['id'] : null;
$course = $data->show($idCourse);

$idCourse = $course['idCourse'];
$category = $course['category'];
$image = $course['image'];
$price = $course['price'];
$materi = $course['materi'];
$rank = $course['rank'];
?>

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="../src/css/Product.css" />
  <link rel="stylesheet" href="../components/navbar.css">
  <title>EasyCode | Platform Belajar Coding</title>
</head>

<body>


  <section class="header">
    <div class="headerLeft">
      <div class="tagLine">#<?= $category ?></div>
      <div class="Judul"><?= $materi ?></div>
      <div class="Deskripsi">
        Kelas ini merupakan kelas coding menggunakan
        teknologi terbaru di bidang IT. <br />
        Lorem ipsum dolor sit amet consectetur adipisicing elit. Sunt, a
        delectus nemo assumenda rerum eligendi, quia voluptates doloremque
        inventore beatae eum reiciendis facilis dolorem nisi esse vel
        praesentium velit voluptatibus.
      </div>
      <h3 class="Level">Level: <?= $rank ?></h3>
      <a class="btnHeader" href="./Payment.php?id=<?= $idCourse ?>">Beli Kelas</a>
    </div>
    <div class=" headerRight">
      <img src="../public/img/<?= $image ?>" alt="Header" id="headerImg" />
    </div>
  </section>
</body>

<?php
include('../components/footer.php');
