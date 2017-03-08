<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8" />
        <link rel="stylesheet" href="Contenu/style.css" />
        <link href="Contenu/bootstrap/css/bootstrap.css" rel="stylesheet">
        <script src="Contenu/TinyMCE/js/tinymce/tinymce.min.js"></script>
 		<script>tinymce.init({ selector:'textarea', language: 'fr_FR'});</script>
           <style>
            body
            {
                background-image:url("Contenu/images/fond.jpg");
                background-size:cover;
                
            }
            label
            {
                color: white;
            }
            text-color: white;
        </style>
        <title><?= $titre ?></title>
    </head>
    <body>
        <div id="global">
            <header>
                <a href="index.php"><h1 id="titreBlog">Billet simple pour l'Alaska</h1></a>
                <p>Bienvenue sur le livre en ligne de Jean Forteroche.</p>
            </header>
            <div id="contenu">
                <?= $contenu ?>
            </div>
            <footer id="pied">
                <a href="index.php?action=administration">administration du site</a>
            </footer>
        </div>
    </body>
</html>