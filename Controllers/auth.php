<?php

$currentpage = substr($_SERVER['SCRIPT_NAME'], strrpos($_SERVER['SCRIPT_NAME'], "/") + 1);

$permitedpage = [
    './index.php',
    './pages/Register.php',
    './pages/Login.php',
];

$currentPage = $_SERVER['REQUEST_URI'];

if (isset($_SESSION['role'])) {
    if ($_SESSION['role'] === 'Admin' && !in_array(true, [
        strpos($currentPage, '/webprog2023/1201222032_dandy/pages/Admin/Dashboard.php') !== false,
        strpos($currentPage, '/webprog2023/1201222032_dandy/pages/Admin/Course.php') !== false,
        strpos($currentPage, '/webprog2023/1201222032_dandy/pages/Admin/Course_update.php') !== false,
        strpos($currentPage, '/webprog2023/1201222032_dandy/pages/Admin/User.php') !== false,
        strpos($currentPage, '/webprog2023/1201222032_dandy/pages/Admin/User_update.php') !== false,
        strpos($currentPage, '/webprog2023/1201222032_dandy/pages/Admin/User_detail.php') !== false,
    ])) {
        header('Location: ../ErrorForbidden.php');
        exit();
    } elseif ($_SESSION['role'] === 'User' && !in_array(true, [
        strpos($currentPage, '/webprog2023/1201222032_dandy/pages/Dashboard.php') !== false,
        strpos($currentPage, '/webprog2023/1201222032_dandy/pages/Katalog.php') !== false,
        strpos($currentPage, '/webprog2023/1201222032_dandy/pages/About.php') !== false,
        strpos($currentPage, '/webprog2023/1201222032_dandy/pages/Payment.php') !== false,
        strpos($currentPage, '/webprog2023/1201222032_dandy/pages/Product.php') !== false,
        strpos($currentPage, '/webprog2023/1201222032_dandy/pages/Profile.php') !== false,
        strpos($currentPage, '/webprog2023/1201222032_dandy/pages/Course.php') !== false,
        strpos($currentPage, '/webprog2023/1201222032_dandy/pages/Class.php') !== false
    ])) {
        header('Location: ../ErrorForbidden.php');
        exit();
    }
} else {
    header('Location: ../ErrorForbidden.php');
    exit();
}
