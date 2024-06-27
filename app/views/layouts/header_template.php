<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agenda online</title>
    <link rel="stylesheet" href="<?= BASE_URL ?>/assets/css/styles.css">
</head>
<body>
    <div class="container header">
        <div class="logo">
            <a href="/">Agenda Online</a>
        </div>
        <nav>
            <div class="menu-hamburger">
                <a id="button-menu">
                    <img src="<?= $BASE_URL ?>/assets/img/menu.svg" alt="Menu">
                </a>
            </div>
        </nav>
    </div>

<?php 
    if(isset($_SESSION["user_id"])) {
        require_once "logged_menu.php";
    } else {
        require_once "unlogged_menu.php";
    }
?>