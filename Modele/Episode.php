<?php
require_once 'Modele/Modele.php';
class Episode extends Modele
{
// Renvoie la liste de l'ensemble des épisodes
    public function getEpisodes()
    {
        $sql = 'select id, DATE_FORMAT(date_episode,\'le %d/%m/%Y à %Hh%i\') as date, titre, SUBSTRING(contenu,1,250) AS contenu from episodes order by id desc';// 250 premiers caracteres de contenu
        $episodes = $this->executerRequete($sql);
        return $episodes;
    }
// CRUD
    
// Renvoie les informations sur un épisode
    public function getEpisode($idEpisode)
    {
        $sql = 'select id, DATE_FORMAT(date_episode,\'le %d/%m/%Y à %Hh%i\') as date, titre, contenu from episodes  where id=?';
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
    public function modEpisode($episode)
    {
        // mise à jour de l'épisode

        $sql = 'UPDATE episodes SET titre=? , contenu=? WHERE id=?';
        $this->executerRequete($sql, array($episode['titre'], $episode['contenu'], $episode['id']));

    }
}