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
    <h1 id="titreReponses">Réponses à : "<?= $episode['titre'] ?>"</h1>
</header>
<!-- affichage en décalé des niveaux de commentaires avec possibilité de commenter le commentaire ou de le signaler comme abusif-->
<div class="container">
    <?php function dispLigneeCommentaire($commentaires, $modele)
    {
        foreach ($commentaires as $lignee) { ?>
            <div>
                <p><?= $lignee['date'] . " " . $lignee['auteur'] ?> a dit : </p>
                <p><?= $lignee['contenu'] ?></p>

                <a class="btn btn-success" href="#commentaire_form_<?=$lignee['id'] ?>" data-toggle="collapse" aria-expanded="false" aria-controls="commentaire_form_<?=$lignee['id']?>">commenter</a>
                <a type="button" class="btn btn-warning">abusif</a>

                <div class="commentaire_form collapse"  id="commentaire_form_<?=$lignee['id'] ?>">
                    <form class="" method="post" action="index.php?action=commenter">
                        <legend>Votre commentaire</legend>
                        <div class="form-group">
                            <input id="auteur" name="auteur" type="text" placeholder="Votre pseudo" maxlength="10"
                                   autofocus required/>
                        </div>
                        <div class="form-group">
                        <textarea id="txtCommentaire" name="contenu" rows="4" placeholder="Votre commentaire"
                                  maxlength="140" required>
                        </textarea>
                        </div>
                        <input type="hidden" name="idEpisode" value="<?= $episode['id'] ?>"/>

                        <input type="hidden" name="idCommentInit" value="<?= $lignee['parent'] ?>"/>
                        <button class="btn btn-success" type="submit" id="envoyerComm">Envoyer</button>
                        <button class="btn btn-warning" type="reset" id="annulerComm">Annuler</button>
                    </form>


                </div>
                <div class="commentaire_enfant">
                    <?php dispLigneeCommentaire($modele->getEnfantCommentaire($lignee['id']), $modele); ?>
                </div>
            </div>
        <?php }
    }

    ?>

    <?php dispLigneeCommentaire($commentaires, $modeleCommentaire); ?>

</div>





