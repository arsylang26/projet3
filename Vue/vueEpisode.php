<?php $this->titre = "Alaska - " . $episode['titre']; ?>

<article>
    <header>
        <h1 class="titreEpisode"><?= $episode['titre'] ?></h1>
        <time><?= $episode['date'] ?></time>
    </header>
    <p><?= $episode['contenu'] ?></p>
</article>
<hr/>
<header>
    <h1 id="titreReponses">Réponses à : "<?= $episode['titre'].'"'?></h1>
</header>
// affichage en décalé des niveaux de commentaires avec possibilité de commenter le commentaire ou de le signaler comme abusif
<div class="container">
    <ul class="media-list col-lg-7">
<?php function  dispLigneeCommentaire($commentaire)
    {
    foreach ($commentaire as $lignee)
        {
            echo'<div class="media-body">';
            echo'<p><?= $commentaire['date']." ".$commentaire['auteur'] a dit : ?></p>';
            echo'<p><?= $commentaire['contenu']?></p>;';
            dispLigneeCommentaire($lignee->getEnfantCommentaire());
            echo'</div>';
        
 
            <?=<a class="btn btn-success" href="Vue/vueSaisieCommentaire.php">commenter</a> ?>;
            <?=<button type="button" class="btn btn-warning">abusif</button> ?>;
        }
    }
?>
    </ul>
</div>




