<?php
include('../components/navbar.php');
include('../Controllers/auth.php');
include('../Models/Course.php');

$idUser = isset($_SESSION['idUser']) ? $_SESSION['idUser'] : null;

$data = new Course();
$idCourse = isset($_GET['id']) ? $_GET['id'] : null;
$course = $data->show($idCourse);

$idCourse = $course['idCourse'];
$price = $course['price'];
$transactionDate = date('Y-m-d H:i:s');
?>

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="../src/css/Payment.css" />
  <title>EasyCode | Platform Belajar Coding</title>
  <script>
    document.addEventListener('DOMContentLoaded', () => {
      const paymentForm = document.forms['payment'];

      paymentForm.addEventListener('submit', (event) => {
        const payment = parseFloat(document.getElementById("totalPrice").value);
        const price = parseFloat('<?= $price ?>');

        if (isNaN(payment) || payment !== price) {
          alert("Jumlah pembayaran harus pas!");
          event.preventDefault();
        }
      });
    });
  </script>
</head>

<section>

  <div class="Payment">

    <form name="payment" action="../Controllers/PaymentController.php" method="post">

      <h1 class="Logo">EasyCode</h1>
      <p>Silahkan Melakukan Pembayaran</p>
      <div>
        <label for="Price">Nominal Bayar</label>
        <input type="number" id="Price" name="Price" disabled value="<?= $price ?>" />
      </div>
      <div>
        <label for="Payment">Pembayaran</label>
        <input placeholder="" type="number" min="0.00" max="10000000.00" step="0.01" id="totalPrice" name="totalPrice" />
      </div>

      <input type="hidden" name="idUser" value="<?= $idUser ?>">
      <input type="hidden" name="idCourse" value="<?= $idCourse ?>">
      <input type="hidden" name="transactionDate" value="<?= $transactionDate ?>">

      <button type="submit" value="add" name="addPayment">Bayar</button>

    </form>

  </div>

</section>

<?php
include('../components/footer.php');
?>