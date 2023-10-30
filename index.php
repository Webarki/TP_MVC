<?php
session_start();
include "model/config.php";
include "model/database.php";
include "model/user.php";
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PDO_Part_2</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="assets/lib/jquery.min.js"></script>
    <script src="assets/js/script.js"></script>
</head>

<body>
    <?php include "view/home/header.php"; ?>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <!-- BODY ROUTEUR PHP -->
                <?php
                if (isset($_GET["register"])) {
                    if (isset($_SESSION["id"])) {
                        header("location:index.php");
                    } else {
                        include "view/register/register.php";
                    }
                } else if (isset($_GET["login"])) {
                    if (isset($_SESSION["id"])) {
                        header("location:index.php");
                    } else {
                        include "view/login/login.php";
                    }
                } else if (isset($_GET["logout"])) {
                    if (isset($_SESSION["id"])) {
                        include "controler/logout.php";
                    } else {
                        header("location:index.php");
                    }
                } else if (isset($_GET["error_csrf"])) {
                    include "controler/logout.php";
                } else {
                    if (isset($_SESSION["email"])) {
                        include "controler/connectUser.php";
                        include "view/home/homepage.php";
                    } else {
                        include "view/home/homepage.php";
                    }
                }
                ?>
            </div>
        </div>
    </div>
    <footer>
        <!-- PIED DE PAGE -->
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>