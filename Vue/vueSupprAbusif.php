<?php
$ids = implode(",",$_POST['id_del']);
$sql='SELECT COUNT(*) FROM commentaires WHERE id IN('.$ids.')';
$nbSuppr=$this->excuterRequete($sql,array());
$sql='SELECT COUNT(*) FROM commentaires WHERE abusif=1';
$nbTotAbusif=$this->executerRequete($sql,array());
$sql='DELETE FROM commentaires WHERE id IN('.$ids.')';
$this->executerRequete($sql,array());

//
?>
<h1>
<?='.$nbSuppr.'.' commentaires ont bien été supprimés sur un total de'. '.$nbTotAbusif.'.' commentaires signalés comme abusifs.' ?>
</h1>

    <a href="index.php?action=vueAdministration">retour à l'administration</a>