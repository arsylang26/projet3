<?php $this->titre = "Mon Blog"; ?>
<?php foreach ($episodes as $episode):
    ?>
    <article>
        <header>
            <a href="<?= "index.php?action=episode&id=" . $episode['id'] ?>">
                <h1 class="titreEpisode"><?= htmlspecialchars($episode['titre']) ?></h1>
            </a>
            <time><?= $episode['date'] ?></time>
        </header>
        <div class="episode_contenu">
            <?php
            $contenu = strip_tags($episode['contenu']); //supprime les balises html créés par TinyMCE

            if (strlen($contenu) > 250) {
                $contenu = $contenu . "  ...";
            }
            echo $contenu;
            ?>
        </div>
        <?php if (isset($_SESSION['admin'])) { ?>
            <a type="button" class="confirm btn btn-warning btn-sm"
               href="<?= "index.php?action=supprEpisode&id=" . $episode['id'] ?>">supprimer l'épisode </a>
            <a class="btn btn-primary btn-sm" href="<?= "index.php?action=modifEpisode&id=" . $episode['id'] ?>">
                modifier l'épisode</a>
        <?php }
        ?>


    </article>
    <hr/>
<?php endforeach; ?>