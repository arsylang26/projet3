<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8"/>
    <link rel="stylesheet" href="Contenu/style.css"/>
    <link href="https://fonts.googleapis.com/css?family=Jim+Nightshade" rel="stylesheet">
    <link href="Contenu/bootstrap/css/bootstrap.css" rel="stylesheet">
    <script src="Contenu/TinyMCE/js/tinymce/tinymce.min.js"></script>
    <script>tinymce.init({selector: 'textarea.tiny', language: 'fr_FR'});</script>
    <title><?= $titre ?></title>
</head>
<body>
<div id="global">
    <header class="bienvenue">
        <a href="index.php"><h1>Billet simple pour l'Alaska</h1></a>
        <p>Bienvenue sur le livre en ligne de Jean Forteroche.</p>
    </header>
    <div id="contenu">
        <?= $contenu ?>
    </div>
    <footer id="pied">
        <a href="index.php?action=administration">administration du site</a>
    </footer>
</div>
<script src="Contenu/jquery.js"></script>
<script src="Contenu/bootstrap/js/bootstrap.js"></script>
</body>
</html>