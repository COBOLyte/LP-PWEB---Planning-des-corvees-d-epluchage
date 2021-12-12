<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <title>Planning - Corvées patates</title>
        <meta name="viewport" content="width=device-width">
        <link href="./View/Asset/style/general.css" rel="stylesheet" type="text/css">
        <link href="./View/Asset/style/header-footer.css" rel="stylesheet" type="text/css">
        <link href="./View/Asset/style/mainSection.css" rel="stylesheet" type="text/css">
        <link href="./View/Asset/style/style.css" rel="stylesheet" type="text/css">
        <!-- Font -->
        <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro|Nunito|Glegoo" rel="stylesheet">
        <!-- Fontawesome -->
        <script src="./View/Asset/js/fontawesome-all.min.js"></script>
        <!-- Icon -->
        <link href="./View/Asset/img/icon.png" rel="icon">
    </head>
    <body>
        <header>
            <div id="info-bar">
                <p>My wonderful platform</p>
            </div>

            <div id="banner-bloc">
                <h1>Mini projet MongoDB - Planning</h1>
            </div>

            <div id="account_bar">
                <div class="connection center">
                    <?php if (!isset($_SESSION['user'])) : ?>
                        <a href="./index.php?ctrl=security&method=login" class="no-deco" title="Connexion ou Créer un compte">
                            <i class="fas fa-user"></i>
                            <div class="text">Se connecter</div>
                        </a>
                    <?php else : ?>
                        <div class="text bold">Bonjour, <?php echo($_SESSION["user"]->firstName); ?>.</div>
                        <a href="./index.php?ctrl=security&method=logout" class="no-deco" title="Déconnexion">
                            <div class="text">Se déconnecter</div>
                        </a>
                    <?php endif; ?>
                </div>
            </div>

            <ul id="menu_bar">
                <a href="./" class="no-deco"><li>Accueil</li></a>
                <?php if (isset($_SESSION['user'])) : ?>
                    <a href="./index.php?ctrl=planning&method=index" class="no-deco"><li>Planning</li></a>
                    <?php if ($_SESSION['user']->admin == 1) : ?>
                        <a href="./index.php?ctrl=user&method=usersList" class="no-deco"><li>Liste des utilisateurs</li></a>
                    <?php endif; ?>
                <?php endif; ?>
            </ul>
        </header>
        