<?php
session_start();
?>

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />

  <title>Document</title>
</head>

<body>
  <h1>Akses Di Tolak</h1>
  <?php if ($_SESSION == true) : ?>
    <?php if ($_SESSION['role'] == 'User') : ?>
      <a href="Dashboard.php">Kembali</a>
    <?php else : ?>
      <a href="Admin/Dashboard.php">Kembali</a>
    <?php endif; ?>
  <?php else : ?>
    <a href="./Login.php">Kembali</a>
  <?php endif; ?>

</body>

</html>