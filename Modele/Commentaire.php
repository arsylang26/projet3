<?php
require_once 'Modele/Modele.php';

class Commentaire extends Modele
{
// Renvoie la liste des commentaires associés à un billet
    public function getCommentaires($idEpisode)
    {
        $sql = 'select id, date_commentaire as date, auteur,contenu,rang_commentaire, parent_commentaire from commentaires where id_episode=?';
        $commentaires = $this->executerRequete($sql, array($idEpisode));
        return $commentaires;
    }

    // Ajoute un commentaire dans la BdD
    public function ajouterCommentaire($auteur, $contenu, $idEpisode, $rangCommentaire, $parentCommentaire)
    {
        $sql = 'insert into commentaires(date_commentaire, auteur, contenu, id_episode,rang_commentaire,parent_commentaire)'
            . ' values(?, ?, ?, ?, ?, ?)';
        $date = date("Y-m-d H:i:s");  // Récupère la date courante
        $this->executerRequete($sql, array($date, $auteur, $contenu, $idEpisode, $rangCommentaire, $parentCommentaire));
    }

// Suppression du commentaire et de ses enfants
    public function delCommentaire($idCommentaire)
    {
        // récupère le rang du commentaire pour trouver ses enfants
        $sql = 'SELECT rang_commentaire FROM commentaires WHERE id=?';
        $rangCommentaire = $sql;
        $rangMax = 3;// le commentaire initial à pour rang 0 et seuls trois sous-niveaux de commentaires sont autorisés
        for ($i = $rangCommentaire; $i <= $rangMax; $i++) {
            $sql = 'DELETE FROM commentaires WHERE id=?';
            $this->executerRequete($sql, array($idCommentaire));
        }

    }

    // renvoie les commentaires signalés comme abusifs
    public function getCommentairesAbusifs()
    {
        $sql = 'SELECT id, date_commentaire AS date, auteur, contenu, rang_commentaire AS rang, parent_commentaire AS parent FROM commentaires WHERE abusif = true';
        $commentairesAbusifs = $this->executerRequete($sql, array());
        return $commentairesAbusifs;
    }

    // renvoie les enfants d'un commentaire classés par niveau
    public function getEnfantCommentaire($idParentCommentaire)
    {
        $sql = 'SELECT id, date_commentaire AS date, auteur, contenu, rang_commentaire AS rang, parent_commentaire AS parent FROM commentaires WHERE parent=? ORDER BY rang';
        $enfantCommentaire = $this->executerRequete($sql, array($idParentCommentaire));
        return $enfantCommentaire;
    }

  
    }
}