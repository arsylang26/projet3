<?php $this->titre = "Mon Blog"; ?>
<?php foreach ($episodes as $episode):
    ?>
    <article>
        <header>
            <a href="<?= "index.php?action=episode&id=" . $episode['id'] ?>">
                <h1 class="titreEpisode"><?= $episode['titre'] ?></h1>
            </a>
            <time><?= $episode['date'] ?></time>
        </header>
        <p class="episode_contenu"><?php
            $contenu = $episode['contenu'];
            if (strlen($contenu) > 250) {
              $contenu = $contenu . "  ..." ;

           }
            echo $contenu;
            ?></p>
    </article>
    <!-- afficher les boutons d'administration uniquement dans ce mode  -jquery-->
    <div class="admin" style="display:none;">

        <a type="button" class="btn btn-primary btn-sm btn-block" href="index.php?action=creerEpisode">écrire un
            épisode</a>
        <a type="button" class="btn btn-primary btn-sm btn-block" href="index.php?action=supprEpisode">supprimer un
            épisode</a>
        <a type="button" class="btn btn-primary btn-sm btn-block" href="index.php?action=modifEpisode">modifier un
            épisode</a>

    </div>
    <hr/>
<?php endforeach; ?>