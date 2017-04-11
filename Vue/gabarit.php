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
        <a class="bienvenue" href="index.php"><h1>Billet simple pour l'Alaska</h1></a>
        <p class="bienvenue">Bienvenue sur le livre en ligne de Jean Forteroche.</p>
        <div class="container">
            <div class="row">
                <div class="col-sm-2 col-sm-offset-3">
                    <a href="index.php?action=creerEpisode" class="btn-sm btn-primary">écrire un nouvel épisode</a>
                </div>
                <div class="col-sm-3 col-sm-offset-2">
                    <a href="index.php?action=affichAbusif" class="btn-sm btn-primary">voir les commentaires abusifs</a>
                </div>
            </div>
        </div>

    </header>

    <div id="contenu">
        <?= $contenu ?>
    </div>
    <footer id="pied">
        <a href="index.php?action=administration">administration du site</a>
    </footer>
</div> <!--global-->
<script src="Contenu/jquery.js"></script>
<script src="Contenu/bootstrap/js/bootstrap.js"></script>
<script src="Contenu/TinyMCE/js/tinymce/tinymce.min.js"></script>
<script>tinymce.init({selector: 'textarea.tiny', language: 'fr_FR'});</script>
<script src="Contenu/script.js"></script>

</html>