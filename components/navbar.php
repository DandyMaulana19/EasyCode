<?php
session_start();
?>

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="./navbar.css" />
    <title>EasyCode | Platform Belajar Coding</title>
</head>

<body>
    <nav>
        <h1><a href="#">EasyCode</a></h1>
        <div class="navbar-mid">
            <?php if (@$_SESSION['role'] === 'Admin') : ?>
                <ul>
                    <li><a href="../../pages/Admin/Dashboard.php">Dashboard</a></li>
                    <li><a href="../../pages/Admin/User.php">Data User</a></li>
                    <li><a href="../../pages/Admin/Course.php">Data Course</a></li>
                </ul>
        </div>
        <a class="navBtn" href="../../pages/Logout.php">Keluar</a>
    <?php elseif (@$_SESSION['role']  === "User") : ?>
        <ul>
            <li>
                <a href="../pages/Dashboard.php">Dashboard</a>
                <a href="../pages/Katalog.php">Katalog</a></>
                <a href="../pages/About.php">Tentang Kami</a>
                <a href="../pages/Profile.php">Profile</a>
                <a href="../pages/Course.php">Kelas Saya</a>
            </li>
        </ul>
        </div>
        <a class=" navBtn" href="./Logout.php">Keluar</a></>
    <?php elseif (@$_SESSION['username'] == null) : ?>
        <ul>
            <li><a href="../pages/Dashboard.php">Dashboard</a></li>
            <li><a href="../pages/Katalog.php">Katalog</a></li>
            <li><a href="../pages/About.php">Tentang Kami</a></li>
        </ul>
        </div>
        <a class="navBtn" id="btn" href="./pages/Login.php">Masuk/Daftar</a>
    <?php endif; ?>
    </nav>
</body>

<style>
    :root {
        --primary-color: #2447f9;
        --secondary-color: #e5e9f2;
        --third-color: #f6f8fd;
        --nonactive-color: #0b5ed7;
        --text-color: #34364a;
    }

    * {}

    nav {
        text-align: center;
        align-items: center;
        display: flex;
        padding: 20px 80px;
        background-color: var(--third-color);
    }

    h1>a {
        color: var(--primary-color);
        text-decoration: none;
    }

    .navbar-mid {
        margin-right: auto;
    }

    nav>div>ul>li {
        display: inline-block;
        margin: 20px;
    }

    nav>div>ul>li>a {
        color: black;
        font-weight: 500;
        text-decoration: none;
        margin-right: 40px;
    }

    nav>div>ul>li>a:hover {
        color: var(--primary-color);
        text-decoration: none;
    }

    .navBtn {
        padding: 10px 20px 10px 20px;
        border-radius: 20px;
        text-decoration: none;
        color: white;
        font-weight: bolder;
        background-color: var(--nonactive-color);
        margin-left: 20px;
    }

    .navBtn:hover {
        background-color: var(--primary-color);
    }

    nav>div>ul> {
        justify-content: space-between;
    }

    .btnWrapper {}
</style>