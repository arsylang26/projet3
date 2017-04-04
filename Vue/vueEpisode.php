<?php $this->titre = "Alaska - " . $episode['titre']; ?>
<article>
    <header>
        <h1 class="episode_titre"><?= htmlspecialchars($episode['titre']) ?></h1>
        <p class="episode_titre">Rédigé <?= $episode['date'] ?></p>
    </header>
    <p class="episode_contenu"><?= htmlspecialchars($episode['contenu']) ?></p>
    <button type="button" class="btn-xs btn-info" data-toggle="collapse" data-target="#commentaire_form_episode">
        commenter
    </button>
    <div class="commentaire_form collapse" id="commentaire_form_episode">
        <form method="post" action="index.php?action=commenterEpisode">
            <div class="form-group">
                <p>votre commentaire:</p>
            </div>
            <div class="form-group">
                <input id="auteur" name="auteur" type="text" placeholder="Votre pseudo" maxlength="10"
                       autofocus required/>
            </div>
            <div class="form-group">
                        <textarea id="txtCommentaire" name="contenu" rows="4" placeholder="Votre commentaire"
                         maxlength="140" required></textarea>
            </div>
            <input type="hidden" name="id" value="<?= $episode['id']?>"/>
            <button class="btn-xs btn-success" type="submit">Envoyer</button>
            <button class="btn-xs btn-warning" type="reset">Annuler</button>
        </form>
    </div>
</article>
<hr/>
<header>
    <?php
    echo '<h1 id="titreReponses">Réponses à : ' . htmlspecialchars($episode['titre']) . '</h1>';
    ?>
</header>
<article>
    <div class="container">
        <!-- affichage en décalé des commentaires suivant leur rang -->
        <?php function dispLigneeCommentaire($commentaires, $modele)
        {
            foreach ($commentaires as $lignee) { ?>
                <div class="commentaire_affich">
                    <p><?= $lignee['date'] ?> , <strong><?= htmlspecialchars($lignee['auteur']) ?></strong> a dit : </p>
                    <p class="commentaire_contenu"><?= htmlspecialchars($lignee['contenu']) ?></p>
                    <?php
                    if ($lignee['rang'] < 3) {
                        echo '<button type = "button" class="btn-xs btn-primary" data-toggle = "collapse"
                        data-target = "#commentaire_form_' . $lignee['id'] . '">commenter</button >';
                    }
                    ?>
                    <!-- bouton de signalement des abusifs qui lève, au clic, un modal de confirmation -->
                    <button type="button" class="btn-xs btn-danger" data-toggle="modal" data-target="#abusif_<?= $lignee['id'] ?>">abusif</button>
                    <div id="abusif_<?= $lignee['id'] ?>" class="modal fade" tabindex="-3" role="dialog"
                         aria-labelledby="abusif"
                         aria-hidden="true">
                        <form method="post" action="index.php?action=signalerAbusif">
                            <input type="hidden" name="abusif" value="'.$lignee['id'].'">
                        </form>
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal"aria-hidden="true"></button>
                                    <h4 class="modal-title" id="abusif">Commentaire Abusif !</h4>
                                </div>
                                <div class="modal-body">
                                    <p>Le commentaire a été signalé comme abusif auprès du modérateur</p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--affichage de la zone de saisie des commentaires de commentaire-->
                    <div class="commentaire_form collapse" id="commentaire_form_<?= $lignee['id'] ?>">
                        <form method="post" action="index.php?action=commenterCommentaire">
                            <div class="form-group">
                              <legend>votre commentaire:</legend>
                            </div>
                            <div class="form-group">
                                <input id="auteur" name="auteur" type="text" placeholder="Votre pseudo" maxlength="10"
                                       autofocus required/>
                            </div>
                            <div class="form-group">
                        <textarea  id="txtCommentaire" name="contenu" rows="4" placeholder="Votre commentaire"
                         maxlength="140" required></textarea>
                            </div>
                            <input type="hidden" name="rang" value="'. $lignee['rang'].'"/>
                            <input type="hidden" name="parent" value="'. $lignee['parent'] .'"/>
                            <button class="btn-xs btn-success" type="submit">Envoyer</button>
                            <button class="btn-xs btn-warning" type="reset">Annuler</button>
                        </form>
                    </div>
                    <!-- fonction récursive pour obtenir les enfants de commentaires-->
                    <div class="commentaire_enfant">
                        <?php dispLigneeCommentaire($modele->getEnfantCommentaire($lignee['id']), $modele); ?>
                    </div>
                </div>
            <?php }
        }

        ?>
        <!-- affichage en décalé des niveaux de commentaires avec possibilité de commenter le commentaire ou de le signaler comme abusif-->
        <?php  dispLigneeCommentaire($commentaires, $modeleCommentaire); ?>
    </div>
</article>