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
        foreach ($soldOut as $sold) : ?>
            <?php
            $getCourse = $data->getCourse($sold);
            ?>
            <div class="CardSold">
                <a href="./Class.php?id=<?= $sold ?>">
                    <div class="cardHeader">
                        <img src="../public/img/<?= $getCourse['image'] ?>" alt="" class="cardImg" />
                    </div>
                    <div class="cardBody">
                        <p class="cardTitle"><?= $getCourse['materi'] ?></p>
                        <p class="cardPrice">Rp. <?= $getCourse['price'] ?></p>
                        <div class="cardRating"><?= $getCourse['rank'] ?></div>
                    </div>
                </a>
            </div>
        <?php endforeach ?>
</section>

<?php
include('../components/footer.php');
?>