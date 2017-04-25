<?php $this->titre = "Alaska: suppression des commentaires abusifs" ?>;


<section class="col-sm-8 table-responsive">
    <form method="post" action="index.php?action=supprCommentaire">
        <table class="table table-bordered table-striped table-condensed">
            <caption>
                commentaires signalés comme abusifs par les lecteurs
            </caption>
            <tr>
                <th>Date</th>
                <th>Auteur</th>
                <th>Commentaire</th>
                <th>Supprimer</th>
            </tr>
            <!-- parcourir la liste des commentaires abusifs , les lister sous forme de tableau avec une case à cocher pour chaque commentaire
            en fin de tableau bouton supprimer avec confirmation pour supprimer la liste cochée -->
            <?php foreach ($commentairesAbusifs as $abusif):
                echo '<tr class="tab_abusif"> 
          <td>' . $abusif['date'] . '</td>
          <td>' . htmlspecialchars($abusif['auteur']) . '</td>
          <td>' . htmlspecialchars($abusif['contenu']) . '</td>
          <td><input type="checkbox" name="id_del[]" value="' . $abusif['id'] . '" /></td>
          </tr>';
            endforeach; ?>
            <tr>
                <td colspan="4">
                    <!--data-confirm est une fontion jquery pour la confirmation d'une action-->
                    <button data-confirm="Êtes-vous sur de supprimer ces commentaires ?"
                            class="btn btn-xs btn-danger" type="submit">Supprimer les commentaires sélectionnés
                    </button>
                    <button class="btn btn-xs btn-default pull-right" type="button" id="tousAbusifs">Tout sélectionner
                    </button>
                </td>
            </tr>
        </table>
    </form>
</section>
