<?php
// Connection a la base de donnee.
require '../connection_BDD.php';
$bdd = connect("DB_restaurant");

$erreur="";


$jour = $_GET['date'];
$id_resa = $_GET['id_resa'];

echo "nb pers : ".$_POST['nb_pers'];
echo "tel :".$_POST['tel'];
echo "commentaire :".$_POST['commentaire'];
echo "presence :".$_POST['presenceOuNon'];
echo "id resa :".$id_resa;

if(isset($_POST['update_reservation'])){
	$nb_pers = htmlspecialchars($_POST['nb_pers']);  
	$tel = htmlspecialchars($_POST['tel']);
	$commentaire = htmlspecialchars($_POST['commentaire']);	
	$presence = htmlspecialchars($_POST['presenceOuNon']);	
	if(isset($nb_pers) AND isset($tel) AND isset($commentaire) AND isset($presence)) {
		if (preg_match("#^((\+\d{1,3}(-| )?\(?\d\)?(-| )?\d{1,5})|(\(?\d{2,6}\)?))(-| )?(\d{3,4})(-| )?(\d{4})(( x| ext)\d{1,5}){0,1}$#", $tel)){
			$meta_carac = array("-", ".", " ");
			$telephone = str_replace($meta_carac, "", $tel);
			$telephone = chunk_split($telephone, 2, "\r");
			$majmbr = $bdd->prepare("UPDATE reservation SET tel = '$tel', commentaire = '$commentaire', presence = '$presence', nb_pers = $nb_pers WHERE id_resa = $id_resa");
			$majmbr->execute();
			header('Location: ../admin1.php?date='.$jour.'');
		//  $erreur = "Votre compte a bien été créé ! ";	
		} else {
			$erreur = "Format incorrecte ! type 0600000000 ";
		}
	} else {
        $erreur = "Tous les champs doivent être complétés !";
    }
}



if ($erreur) {
    print $erreur;
} else {
    print "ok";
}


?>