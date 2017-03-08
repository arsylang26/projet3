<?php
require_once 'Modele/Modele.php';

class Commentaire extends Modele
{
// Renvoie la liste des commentaires associés à un billet
    public function getCommentaires($idEpisode)
    {
        $sql = 'select id, date_commentaire as date, auteur,contenu from commentaires where id_episode=?';
        $commentaires = $this->executerRequete($sql, array($idEpisode));
        return $commentaires;
    }

    // Ajoute un commentaire dans la base
    public function ajouterCommentaire($auteur, $contenu, $idEpisode)
    {
        $sql = 'insert into commentaires(date_commentaire, auteur, contenu, id_episode)'
            . ' values(?, ?, ?, ?)';
        $date = date("Y-m-d H:i:s");  // Récupère la date courante
        $this->executerRequete($sql, array($date, $auteur, $contenu, $idEpisode));
    }

    public function delCommentaire($idCommentaire)
    {


        $sql = 'DELETE FROM commentaires WHERE id=?';
        $this->executerRequete($sql, array($idCommentaire));
       

    }
}