<?php
require_once 'Modele/Modele.php';
class Administration extends Modele {
    public function getIdAdmin($admin,$pwd){
        $sql='SELECT id FROM administration  WHERE  identifiant=? AND pwd=?';
        $idAdmin=$this->executerRequete($sql,array($admin,$pwd));
        return $idAdmin;
    }
}