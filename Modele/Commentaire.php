<?php
require_once 'Modele/Modele.php';

class Commentaire extends Modele
{
    // Renvoie la liste des commentaires associés à un billet
    public function getCommentaires($idEpisode)
    {
<<<<<<< HEAD
        $sql = 'SELECT id, DATE_FORMAT(date_commentaire,\'le %d/%m/%Y à %Hh%i\') AS date, auteur,contenu,rang_commentaire, parent_commentaire FROM commentaires WHERE id_episode=?';
=======
        $sql = 'select id, DATE_FORMAT(date_commentaire,'le %d/%m/%Y à %Hh%i') as date, auteur,contenu,rang_commentaire, parent_commentaire from commentaires where id_episode=?';
>>>>>>> 77f8cc349b68da912e622bd605b8687debbb702a
        $commentaires = $this->executerRequete($sql, array($idEpisode));
        return $commentaires;
    }

    // Ajoute un commentaire dans la BdD
    public function ajouterCommentaire($auteur, $contenu, $idEpisode, $rangCommentaire, $parentCommentaire)
        if ($rangCommentaire<3)
        {
    {
<<<<<<< HEAD
        if ($rangCommentaire <= 3) {
            $sql = 'INSERT INTO commentaires(date_commentaire, auteur, contenu, id_episode,rang_commentaire,parent_commentaire)'
                . ' VALUES(?, ?, ?, ?, ?, ?)';
            $date = date("Y-m-d H:i:s");  // Récupère la date courante
            $this->executerRequete($sql, array($date, $auteur, $contenu, $idEpisode, $rangCommentaire, $parentCommentaire));
        }
    }
=======
        $sql = 'insert into commentaires(date_commentaire, auteur, contenu, id_episode,rang_commentaire,parent_commentaire)'
            . ' values(?, ?, ?, ?, ?, ?)';
        $date = date("Y-m-d H:i:s");  // Récupère la date courante
        $this->executerRequete($sql, array($date, $auteur, $contenu, $idEpisode, $rangCommentaire, $parentCommentaire));
    } 
>>>>>>> 77f8cc349b68da912e622bd605b8687debbb702a

    // Suppression du commentaire et de ses enfants
    public function delCommentaire($idCommentaire)
    {
<<<<<<< HEAD
        //$sql = 'DELETE FROM commentaires WHERE id=?';
       // $this->executerRequete($sql, array($idCommentaire));


        $ids = implode(",", $_POST['id_delete']);
        $sql = 'SELECT COUNT(*) FROM commentaires WHERE id IN(' . $ids . ')';
        $nbSuppr = $this->excuterRequete($sql, array());
        $sql = 'SELECT COUNT(*) FROM commentaires WHERE abusif=1';
        $nbTotalAbusif = $this->executerRequete($sql, array());
        $sql = 'DELETE FROM commentaires WHERE id IN(' . $ids . ')';
        $this->executerRequete($sql, array());
    }

// Signale un commentaire comme abusif
    public
    function signCommentaireAbusif($idCommentaire)
    {
        $sql = 'UPDATE commentaires SET abusif=1 WHERE id=?';
=======
        // récupère le rang du commentaire pour trouver ses enfants
        $sql = 'SELECT rang_commentaire AS rang FROM commentaires WHERE id=?';
        $rangCommentaire =  $this->executerRequete($sql, array($idCommentaire));
        $sql = 'SELECT parent_commentaire AS parent FROM commentaires WHERE id=?';
        $parentCommentaire =  $this->executerRequete($sql, array($idCommentaire));
        $rangMax = 3;// le commentaire initial à pour rang 0 et seuls trois sous-niveaux de commentaires sont autorisés
        // supprime les enfants du commentaire  spécifié (si présents) du commentaire parent
        if ($rangCommentaire<$rangMax)
        {
            for ($i = $rangCommentaire; $i <= $rangMax; $i++)
            {
                $sql = 'DELETE FROM commentaires WHERE (rang_commentaire='.$i+1' AND parent_commentaire='.$parentCommentaire')';
                $this->executerRequete($sql, array($idCommentaire));
            }
        }
        // supprime le commentaire lui-même
        $sql = 'DELETE FROM commentaires WHERE id=?';
>>>>>>> 77f8cc349b68da912e622bd605b8687debbb702a
        $this->executerRequete($sql, array($idCommentaire));
    }

// renvoie les commentaires signalés comme abusifs
    public
    function getCommentairesAbusifs()
    {
        $sql = 'SELECT id, date_commentaire AS date, auteur, contenu, rang_commentaire AS rang, parent_commentaire AS parent FROM commentaires WHERE abusif = 1';
        $commentairesAbusifs = $this->executerRequete($sql, array());
        return $commentairesAbusifs;
    }

<<<<<<< HEAD
// renvoie les enfants d'un commentaire initial (niveau 0) classés par niveau pour l'affichage
    public
    function getEnfantCommentaire($idParentCommentaire)
=======
    // renvoie les enfants d'un commentaire initial (niveau 0) classés par niveau pour l'affichage
    public function getEnfantCommentaire($idParentCommentaire)
>>>>>>> 77f8cc349b68da912e622bd605b8687debbb702a
    {
        $sql = 'SELECT id, date_commentaire AS date, auteur, contenu, rang_commentaire AS rang, parent_commentaire AS parent FROM commentaires WHERE parent=? ORDER BY rang';
        $enfantCommentaire = $this->executerRequete($sql, array($idParentCommentaire));
        return $enfantCommentaire;
    }


}