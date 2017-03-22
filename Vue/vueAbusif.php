<?php $this->titre = "Alaska: suppression des commentaires abusifs";


echo '<form method="post" action="index.php?action=supprAbusifs.php" name="supprCommentaire">
<section class=""col-sm-8 table-responsive">
    <table class="table table-bordered table-striped table-condensed">
        <caption>
            commentaires signalés comme abusifs par les lecteurs
        </caption>
        <tr>
            <th>Date</th><th>Auteur</th><th>Commentaire</th><th>Supprimer</th>
        </tr>';
// parcourir la liste des commentaires abusifs , les lister sous formes de tableau avec une case à cocher pour chaque commentaire
//en fin de tableau bouton supprimer avec confirmation pour supprimer la liste cochée


foreach ($commentairesAbusifs as $abusif):

    echo '<tr> 
          <td>' . $abusif['date'] . '</td>
          <td>' . $abusif['auteur'] . '</td>
          <td>' . $abusif['contenu'] . '</td>
          <td><input type="checkbox" name="id_del[]" value="' . $abusif['id'] . '" /></td>
          </tr>';
endforeach;

echo '<tr><td colspan="4"><input type="button" value="Supprimer les commentaires cochés ?" onClick="ConfirmerSuppr()" /></td></tr>

    </table>
</section>
</form>';

?> 