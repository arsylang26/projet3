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
        <p><?= $episode['contenu'] ?></p>
    </article>
    <hr />
<?php endforeach; ?>