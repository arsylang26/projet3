<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8"/>
    <link rel="stylesheet" href="Contenu/style.css"/>
    <link href="https://fonts.googleapis.com/css?family=Jim+Nightshade" rel="stylesheet">
    <link href="Contenu/bootstrap/css/bootstrap.css" rel="stylesheet">


    <title><?= $titre ?></title>
</head>
<body>
<div id="global">
    <header>
        <?php if (!isset($_SESSION['admin'])) : ?>
            <a class="connect_admin" href="index.php?action=administration">administration du site</a>
        <?php else : ?>
            <div class="connect_admin">
                <form action="index.php?action=deconnexion" method="POST">
                    connecté en tant que <?= $_SESSION['admin'] ?>
                    <button class="deconnect btn btn-warning" name="#" data-confirm="Vous déconnecter ?" type="submit">
                        déconnexion
                    </button>
                </form>
            </div>
        <?php endif; ?>
        <div class="bienvenue">
            <a href="index.php"><h1>Billet simple pour l'Alaska</h1></a>
            <p>Bienvenue sur le livre en ligne de Jean Forteroche.</p>
        </div>
        <?php if (isset($_SESSION['admin'])) : ?>
            <div class="container">
                <div class="row">
                    <div class="col-sm-2 col-sm-offset-3">
                        <a href="index.php?action=creerEpisode" class="btn btn-sm btn-primary"> écrire un nouvel
                            épisode </a>
                    </div>
                    <div class="col-sm-3 col-sm-offset-2">
                        <a href="index.php?action=affichAbusif" class="btn btn-sm btn-primary"> voir les commentaires
                            abusifs </a>
                    </div>
                </div>
            </div>
        <?php endif; ?>
    </header>

    <div id="contenu">
        <?= $contenu ?>
    </div>
</div> <!--global-->
<script src="Contenu/jquery.js"></script>
<script src="Contenu/bootstrap/js/bootstrap.js"></script>
<script src="Contenu/TinyMCE/js/tinymce/tinymce.min.js"></script>
<script>tinymce.init({selector: 'textarea.tiny', language: 'fr_FR'});</script>
<script src="Contenu/script.js"></script>
</body>
</html>