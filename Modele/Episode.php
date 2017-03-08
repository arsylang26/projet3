<?php
require_once 'Modele/Modele.php';
class Episode extends Modele
{
// Renvoie la liste des épisodes du blog
    public function getEpisodes()
    {
        $sql = 'select id, date_episode as date, titre, contenu from episodes order by id desc';
        $episodes = $this->executerRequete($sql);
        return $episodes;
    }
// CRUD
    
// Renvoie les informations sur un épisode
    public function getEpisode($idEpisode)
    {
        $sql = 'select id, date_episode as date , titre, contenu from episodes  where id=?';
        $episode = $this->executerRequete($sql, array($idEpisode));
        if ($episode->rowCount() == 1)
        {
            
            return $episode->fetch(); // Accès à la première ligne de résultat
        }

        else 
            throw new Exception("Aucun épisode ne correspond à l'identifiant '$idEpisode'");
    }
    
// Enregistre un épisode
    public function recEpisode($titre, $contenu)
   {
        $sql = 'insert into episodes(date_episode,titre, contenu) values(?, ?, ?)';
        $date =  date("Y-m-d H:i:s");  // Récupère la date courante
        $this->executerRequete($sql, array($date, $titre, $contenu));
    }
// Efface un épisode
    public function delEpisode($idEpisode)
    {
        $sql= 'DELETE FROM episodes WHERE id=?';
        $this->executerRequete($sql,array($idEpisode));
    }
// Mettre à jour un épisode
    public function modEpisode($idEpisode,$titre,$contenu)
    {
        // mise à jour de l'épisode
        $sql = 'UPDATE episodes SET titre=?, SET contenu=? WHERE id_episode=?';
        $this->executerRequete($sql, array($titre, $contenu, $idEpisode));

    }
}