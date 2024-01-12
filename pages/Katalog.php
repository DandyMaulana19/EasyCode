<?php
include('../components/navbar.php');
include('../Controllers/auth.php');
include('../Models/Course.php');
// include('../Models/Transactions.php');
include('../Controllers/PaymentController.php');

$data = new Course();
$courses = $data->showAll();

$transactionHistory = new Transactions();
$idUser = $_SESSION['idUser'];
$soldOut = $transactionHistory->getSoldOut($idUser);
?>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../components/navbar.css">
  <link rel="stylesheet" href="../src/css/Katalog.css">
  <title>EasyCode | Platform Belajar Coding</title>
</head>

<section class="Katalog">
  <div class="wrapperKatalog">
    <div class="taglineWrapper">Start Learning Now</div>
    <div class="judulWrapper">
      Kelas Online UIUX, Web Developer, <br />
      dan Mobile Developer
    </div>
  </div>
  <div class="wrapperCard">
    <?php
    foreach ($courses as $course) : ?>
      <?php
      $isPurchased = in_array($course['idCourse'], $soldOut);
      ?>
      <?php if ($isPurchased) : ?>
        <div class="CardSold">
          <p href="./Product.php?id=<?= $course['idCourse'] ?>">
          <div class="cardHeader">
            <img src="../public/img/<?= $course['image'] ?>" alt="" class="cardImg" />
          </div>
          <div class="cardBody">
            <p class="cardTitle"><?= $course['materi'] ?></p>
            <p class="cardPrice">Rp. <?= $course['price'] ?></p>
            <div class="cardRating"><?= $course['rank'] ?></div>
          </div>
          <div class="hover">
            <p>Course telah dibeli</p>
          </div>
          </p>
        </div>
      <?php else : ?>
        <div class="Card">
          <a href="./Product.php?id=<?= $course['idCourse'] ?>">
            <div class="cardHeader">
              <img src="../public/img/<?= $course['image'] ?>" alt="" class="cardImg" />
            </div>
            <div class="cardBody">
              <p class="cardTitle"><?= $course['materi'] ?></p>
              <p class="cardPrice">Rp. <?= $course['price'] ?></p>
              <div class="cardRating"><?= $course['rank'] ?></div>
            </div>
          </a>
        </div>
      <?php endif; ?>
    <?php endforeach ?>
</section>

<?php
include('../components/footer.php');
?>