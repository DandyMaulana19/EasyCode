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
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../components/navbar.css">
    <link rel="stylesheet" href="../src/css/Class.css">
    <title>EasyCode | <?= $materi ?></title>
</head>

<section class="Class">
    <div class="videoWrapper">
        <iframe width="560" height="315" src="https://www.youtube.com/embed/Kui73WK4CyE?si=lcc4mkbl8P57cIcd" frameborder="0"></iframe>
    </div>
    <div class="courseDetails">
        <h1><?= $materi ?></h1>
        <p>Rank: <?= $rank ?></p>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Odit cupiditate nihil quo a deleniti optio maxime rerum? Repellat placeat, quia explicabo quibusdam culpa quam minus adipisci sunt. Esse delectus impedit ipsa accusamus ab, eum quibusdam veniam eligendi, rem perspiciatis ea quos unde sed neque nobis amet dolore est nam reprehenderit nemo quidem laborum soluta? Suscipit reiciendis amet magni similique perspiciatis modi dicta voluptatibus quo perferendis omnis. Et unde enim eum nulla animi. Dolor harum, eveniet nostrum rem perspiciatis tempora, amet consequatur dolorem quos maiores libero officiis quidem iusto sint id pariatur itaque doloribus tenetur fugiat. Deserunt numquam nisi aliquam rerum.</p>
    </div>
</section>

<?php
include('../components/footer.php');
?>