<?php
require_once 'Modele/Episode.php';
require_once 'Modele/Commentaire.php';
require_once 'Modele/Administration.php';
require_once 'Vue/Vue.php';
require_once 'Controleur/ControleurEpisode.php';

class ControleurAdministration
{
    private $episode;
    private $commentaire;
    private $admin;


    public function __construct()
    {
        $this->episode = new Episode();
        $this->commentaire = new Commentaire();
        $this->admin = new Administration();
    }

    public function administration()
    {
        $vue = new Vue("Administration");
        $vue->generer(array());
    }


    public function creerEpisode($titre = null, $contenu = null)
    {
        if ($titre && $contenu) {

            $this->episode->recEpisode($titre, $contenu);
            header("location:index.php?vueAccueil");

        }

        $vue = new Vue("Redaction");
        $vue->generer(array());

    }


    /**
     *
     */
    public function affichAbusif()
    {
        $commentairesAbusifs = $this->commentaire->getCommentairesAbusifs();
        var_dump($commentairesAbusifs);
        $vue = new Vue("Abusif");
        $vue->generer(['commentairesAbusifs'=>$commentairesAbusifs]);
    }

    public function modifEpisode($id, $titre = null, $contenu = null)
    {
        $episode = $this->episode->getEpisode($id);

        if ($id && $titre && $contenu) {
            $episode['titre'] = $titre;
            $episode['contenu'] = $contenu;
            $this->episode->modEpisode($episode);
            header("location:index.php?vueAccueil");

        }
        $vue = new Vue("Modif");
        $vue->generer(array('episode' => $episode));

    }

    public function supprEpisode($id)
    {
        $supprEpisode = $this->episode->delEpisode($id);
        header("location:index.php");
    }

    public function supprCommentaire($ids)
    {
        $commentaireAbusif = $this->commentaire->delCommentaire($ids);
       header("location:index.php?action=affichAbusif");
    }

    public function connectAdmin($admin, $pwd)
    {
        if (isset($admin) && isset($pwd)) {
            $pass = sha1($pwd); //cryptage du mot de passe avant de faire la requête sur la BdD
            $idAdmin = $this->admin->getIdAdmin($admin, $pass);
            if ($idAdmin) {// si identifiant /pwd ok on ouvre la session admin
                $_SESSION['admin'] = $admin;
                header("location:index.php");
            } else {// sinon, retour à l'authentification
                header("location:index.php");
            }
        }
    }
        public function deconnexion()
    {
        session_destroy();
        $vue= new vue("Deconnexion");
        $vue->generer(array());

    }


}