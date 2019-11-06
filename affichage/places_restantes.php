<?php
//A vérifier
if (isset($_GET["date"])) {
	$date_select=$_GET["date"];
	$date="'".$_GET["date"]."'";
} else {
  $date_select="";
	$date="DATE( NOW())";
}

// a partir de mtn c'est le sql pour compter le nombre de places restant pour chaque services !
// nb pers creneau 1
$nb_persC1 = $bdd->query("SELECT sum(`nb_pers`) AS 'nbresa' from reservation WHERE `jour`=".$date." AND crenau='1'");
$x1=$nb_persC1->fetchAll(PDO::FETCH_ASSOC);
// print $x1[0]["nbresa"];

// nb pers creneau 2
$nb_persC2 = $bdd->query("SELECT sum(`nb_pers`) AS 'nbresa' from reservation WHERE `jour`=".$date." AND crenau='2'");
$x2=$nb_persC2->fetchAll(PDO::FETCH_ASSOC);
// print $x2[0]["nbresa"];

// nb pers creneau 2
$nb_persC3 = $bdd->query("SELECT sum(`nb_pers`) AS 'nbresa' from reservation WHERE `jour`=".$date." AND crenau='3'");
$x3=$nb_persC3->fetchAll(PDO::FETCH_ASSOC);
// print $x3[0]["nbresa"];

// nb pers creneau 2
$nb_persC4 = $bdd->query("SELECT sum(`nb_pers`) AS 'nbresa' from reservation WHERE `jour`=".$date." AND crenau='4'");
$x4=$nb_persC4->fetchAll(PDO::FETCH_ASSOC);
// print $x4[0]["nbresa"];

// Changer le Nombres de place  pour voir le nb de places restantes
$nbrplace = 30; 

?>