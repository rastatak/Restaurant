<?php
// Connection a la base de donnee.
require '../connection_BDD.php';
$bdd = connect("DB_restaurant");


//Tu recuperes l'id du contact
$id = $_GET["id_resa"];

//Requete SQL pour supprimer le contact dans la base
$delete=$bdd->query("DELETE FROM reservation WHERE id_resa=".$id);

// Redirection par rapport uniquement à la page admin, qui est le seul à pouvoir supprimer 
header("location: ../admin1.php");

?>