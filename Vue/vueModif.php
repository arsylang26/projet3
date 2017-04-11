<?php $this->titre="Alaska: rédaction"; ?>
    <form class="col-lg-offset-1 col-lg-10" method="POST" action="index.php?action=modifEpisode&id=<?=$episode['id']?>">
        <!--affichage du formulaire de saisie, prérempli s'il s'agit d'une modification d'un épisode-->

        <div class ="form-group">
            <label for="titre">Titre de l'épisode :</label>


            <input class="form-control" type="text" name="titre" id="titre" value="<?=$episode['titre']; ?>" required />
        </div>

        <div class ="form-group">
            <label for="episode">Votre texte :</label>
            <textarea  class="form-control tiny" name="contenu" rows = "20">

<?=$episode['contenu'];?>
                </textarea>
        </div>

        <button  type="submit" class="btn btn-success center-block" >valider</button>

    </form>
<?php
/**
 * Created by PhpStorm.
 * User: jafa
 * Date: 11/04/2017
 * Time: 22:05
 */