<?php
include('../components/navbar.php');
include('../Controllers/auth.php');
?>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../src/css/Dashboard.css">
  <link rel="stylesheet" href="../components/navbar.css">
  <title>EasyCode | Platform Belajar Coding</title>
</head>

<body>

  <section class="header">
    <div class="headerLeft">
      <div class="tagLine">#SpiritOfCode</div>
      <div class="Judul">Improve Your Awesome Skill With Us</div>
      <div class="Deskripsi">EasyCode menyediakan kelas UI/UX design, Web Development, dan Freelancer untuk pemula</div>
      <a class="btnHeader" href="./Katalog.php">Lihat Kelas</a>
    </div>
    <div class=" headerRight">
      <img src="../assets/Header.png" alt="Header" id="headerImg">
    </div>
  </section>

  <section class="Katalog">
    <div class="wrapperKatalog">
      <div class="taglineWrapper">
        Start Learning Now
      </div>
      <div class="judulWrapper">
        Kelas Online UIUX, Web Developer, <br> dan Mobile Developer
      </div>
    </div>
    <div class="wrapperCard">
      <a href="./Katalog.php" class="Card">
        <div class="cardHeader">
          <img src="../assets/Laravel.png" alt="Laravel" class="cardImg">
        </div>
        <div class="cardBody">
          <p class="cardTitle">Full-Stack Laravel 10</p>
          <p class="cardPrice">Rp 300,000</p>
          <div class="cardRating">
            ⭐⭐⭐⭐⭐(1,300)
          </div>
        </div>
      </a>
      <a href="./Katalog.php" class="Card">
        <div class="cardHeader">
          <img src="../assets/React.png" alt="React" class="cardImg">
        </div>
        <div class="cardBody">
          <p class="cardTitle">Fundamental ReactJs</p>
          <p class="cardPrice">Rp 50,000</p>
          <div class="cardRating">
            ⭐⭐⭐⭐⭐(2.786)
          </div>
        </div>
      </a>
      <a href="./Katalog.php" class="Card">
        <div class="cardHeader">
          <img src="../assets/Vue.png" alt="Vue" class="cardImg">
        </div>
        <div class="cardBody">
          <p class="cardTitle">Front-End VueJs Expert</p>
          <p class="cardPrice">Rp 150,000</p>
          <div class="cardRating">
            ⭐⭐⭐⭐(300)
          </div>
        </div>
      </a>
      <a href="./Katalog.php" class="Card">
        <div class="cardHeader">
          <img src="../assets/Adonis.png" alt="Adonis" class="cardImg">
        </div>
        <div class="cardBody">
          <p class="cardTitle">Back-End AdonisJs Pemula</p>
          <p class="cardPrice">Rp 300,000</p>
          <div class="cardRating">
            ⭐⭐⭐⭐⭐(852)
          </div>
        </div>
      </a>
    </div>
  </section>

  <section class="Gallery">
    <div class="galleryHeader">
      <p class="galleryTitle">
        Becoming An Expert Software Engineer
      </p>
      <h2 class="galleryTagline">
        Kelas Online EasyCode. <br>Materi Paling Update.
      </h2>
    </div>
    <div class="galleryBody">
      <div class="cardSlim">
        <img src="../assets/logos/kotlin.svg" alt="Kotlin" class="cardLogo">
        <div class="logoText">
          <h5 class="logoTitle">Kotlin</h5>
          <p class="logoDesc">Android Development</p>
        </div>
      </div>
      <div class="cardSlim">
        <img src="../assets/logos/icons8-flutter.svg" alt="Flutter" class="cardLogo">
        <div class="logoText">
          <h5 class="logoTitle">Flutter</h5>
          <p class="logoDesc">Mobile Development</p>
        </div>
      </div>
      <div class="cardSlim">
        <img src="../assets/logos/vue-logomark.svg" alt="Vue" class="cardLogo">
        <div class="logoText">
          <h5 class="logoTitle">Vue</h5>
          <p class="logoDesc">Front-End Development</p>
        </div>
      </div>
      <div class="cardSlim">
        <img src="../assets/logos/react.svg" alt="React" class="cardLogo">
        <div class="logoText">
          <h5 class="logoTitle">React JS</h5>
          <p class="logoDesc">Front-End Development</p>
        </div>
      </div>
      <div class="cardSlim">
        <img src="../assets/logos/laravel.svg" alt="Laravel" class="cardLogo">
        <div class="logoText">
          <h5 class="logoTitle">Laravel</h5>
          <p class="logoDesc">Full-Stack Development</p>
        </div>
      </div>
      <div class="cardSlim">
        <img src="../assets/logos/figma-logomark.svg" alt="Figma" class="cardLogo">
        <div class="logoText">
          <h5 class="logoTitle">Figma</h5>
          <p class="logoDesc">UI/UX</p>
        </div>
      </div>
    </div>
  </section>

</body>
<?php
include('../components/footer.php');
?>