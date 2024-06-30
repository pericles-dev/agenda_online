<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agenda online</title>
    <link rel="stylesheet" href="<?= BASE_URL ?>/assets/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="<?= BASE_URL ?>/assets/css/styles.css">
</head>

<body>
    <div class="container">
        <div class="navbar">
            <div class="brand">
                <img src="<?= BASE_URL ?>/assets/img/journal-text.svg" alt="Logo do site">
                <a href="/">Agenda Online</a>
            </div>
            <nav>
                <ul class="nav">
                    <?php if (!isset($_SESSION["user_id"])): ?>
                        <li><a href="/user/login">Entrar</a></li>
                        <li><a href="/user/register">Registrar</a></li>
                    <?php else: ?>
                        <li><a href="/user/profile">Perfil</a></li>
                    <li><a href="/user/logout">Sair</a></li>
                    <?php endif ?>
                </ul>
            </nav>
        </div>