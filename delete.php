<?php
// co bdd
$bdd = new PDO('mysql:host=127.0.0.1;dbname=resto', 'root', '');
//Tu recuperes l'id du contact
$id = $_GET["id_resa"];

//Requete SQL pour supprimer le contact dans la base
$delete=$bdd->query("DELETE FROM reservation WHERE id_resa=".$id);

header("location:admin1.php");

?>