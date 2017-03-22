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
    <h1 id="titreReponses">Réponses à : "<?= $episode['titre'] . '"' ?></h1>
</header>
<!-- affichage en décalé des niveaux de commentaires avec possibilité de commenter le commentaire ou de le signaler comme abusif-->
<div class="container">
<<<<<<< HEAD

    <?php function dispLigneeCommentaire($commentaires, $modele)
    {
        foreach ($commentaires as $lignee) {
            echo '<div class="media-body">';
            echo '<p>' . $lignee['date'] . " " . $lignee['auteur'] . ' a dit : </p>';
            echo '<p>' . $lignee['contenu'] . '</p>';
            dispLigneeCommentaire($modele->getEnfantCommentaire($lignee['id']), $modele);

            
            echo '<a class="btn btn-success"  href="#" id="commenter">commenter</a>';
            echo '<a type="button" class="btn btn-warning">abusif</a>';// doit effectuer l'action jquery ?

            echo '<div class="commentaire_form" style="display:none;">';
            echo '<form class="col-lg-6" method="post" action="index.php?action=commenter">
                    <legend>Votre commentaire</legend>
                    <div class="form-group">
                        <input id="auteur" name="auteur" type="text" placeholder="Votre pseudo" maxlength="10" autofocus required/>
                    </div>
                    <div class="form-group">
                        <textarea id="txtCommentaire" name="contenu" rows="4" placeholder="Votre commentaire" maxlength="140" required>
                        </textarea>
                    </div>
                    <input type="hidden" name="idEpisode" value="<?= $episode['id'] ?>"/>';
     // si le commentaire est validé comment ?
            $rangCommentaire = $lignee['rang']+1;
            $parentCommentaire = $lignee['parent'];

             echo '<input type="hidden" name="rangCommentaire" value="<?=$lignee['rang'] ?>"/>                
                   <input type="hidden" name="idCommentInit" value="<?=$lignee['parent'] ?>"/>
                   <button class="btn btn-success" type="submit" id="envoyerComm">Envoyer</button>
                   <button class="btn btn-warning" type="reset" id="annulerComm">Annuler</button>
                </form>';

          
            echo '</div>';
            echo '</div>';
            
=======
    <ul class="media-list col-lg-7">
<?php function  dispLigneeCommentaire($commentaire,$rangCommentaire,$parentCommentaire)
    {
    foreach ($commentaire as $lignee)
        {
            echo'<div class="media-body">';
            echo'<p><?= $commentaire['date']." ".$commentaire['auteur'] a dit : ?></p>';
            echo'<p><?= $commentaire['contenu']?></p>;';
            dispLigneeCommentaire($lignee->getEnfantCommentaire());
            echo'</div>';
        
 
            <?=<a class="btn btn-success" href="index.php?action=commenter">commenter</a> ?>;
            if($rangCommentaire>0)
            {
                <?=<button type="button" class="btn btn-warning">abusif</button> ?>;
            }
>>>>>>> 77f8cc349b68da912e622bd605b8687debbb702a
        }
    }

    dispLigneeCommentaire($commentaires, $modeleCommentaire);

    ?>

</div>





