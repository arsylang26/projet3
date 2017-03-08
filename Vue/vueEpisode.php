<?php $this->titre = "Mon Blog - " . $episode['titre']; ?>

<article>
    <header>
        <h1 class="titreEpisode"><?= $episode['titre'] ?></h1>
        <time><?= $episode['date'] ?></time>
    </header>
    <p><?= $episode['contenu'] ?></p>
</article>
<hr />
<header>
    <h1 id="titreReponses">Réponses à <?=$episode['titre'] ?></h1>
</header>
<?php foreach ($commentaires as $commentaire): ?>
    <p><?= $commentaire['auteur'] ?> dit :</p>
    <p><?= $commentaire['contenu'] ?></p>
<?php endforeach; ?>
<hr />
<form method="post" action="index.php?action=commenter">
    <input id="auteur" name="auteur" type="text" placeholder="Votre pseudo"
           required /><br />
    <textarea id="txtCommentaire" name="contenu" rows="4"
              placeholder="Votre commentaire" required></textarea><br />
    <input type="hidden" name="id" value="<?= $episode['id'] ?>" />
    <input type="submit" value="Commenter" />
</form>