<?php $this->titre = "Alaska: suppression des commentaires abusifs" ?>;


<section class="col-sm-8 table-responsive">
    <form method="post" action="index.php?action=supprAbusif">
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

            <?php

            foreach ($commentairesAbusifs as $abusif):

                echo '<tr> 
          <td>' . $abusif['date'] . '</td>
          <td>' . $abusif['auteur'] . '</td>
          <td>' . $abusif['contenu'] . '</td>
          <td><input type="checkbox" name="id_del[]" value="' . $abusif['id'] . '" /></td>
          </tr>';
            endforeach;
            ?>;

            <tr>
                <td colspan="4">
                    <button data-confirm="Êtes-vous sur de supprimer ces commentaires ?" type="submit"
                            class="btn-xs btn-danger" data-toggle="modal"
                            data-target="#supprCommmentaire">Supprimer les commentaires abusifs ?
                    </button>
                </td>
            </tr>

        </table>
    </form>

</section>

<div id="supprAbusif>" class="modal fade" tabindex="-1" role="dialog"
     aria-labelledby="abusif"
     aria-hidden="true">


    <div class="modal-dialog">

        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"
                        aria-hidden="true"></button>
                <h4 class="modal-title" id="abusif">Suppression réussie</h4>
            </div>
            <div class="modal-body">
                <p>$nbSuppr+ commentaires ont bien été supprimés sur + $nbTotAbusif+ commentaires signalés comme
                    abusifs </p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">OK</button>
            </div>

        </div>
    </div>
               
