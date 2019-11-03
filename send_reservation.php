<?php
$bdd = new PDO('mysql:host=127.0.0.1;dbname=resto', 'root', '');

$erreur="";

$jour = $_GET['date'];
$id_resa = $_GET['id_resa'];

echo "nb pers : ".$_POST['nb_pers'];
echo "tel :".$_POST['tel'];
echo "commentaire :".$_POST['commentaire'];
echo "presence :".$_POST['presenceOuNon'];
echo "id resa :".$id_resa;

if(isset($_POST['reservation'])) {
    $nb_pers = htmlspecialchars($_POST['nb_pers']);  
	$nom = htmlspecialchars($_POST['nom']);
	$prenom = htmlspecialchars($_POST['prenom']);
	$mail = htmlspecialchars($_POST['mail']);
	$tel = htmlspecialchars($_POST['tel']);
	$commentaire = htmlspecialchars($_POST['commentaire']);
	$jour = ($_POST['jour']);
	$crenau =($_POST['crenau']);
	


	if(!empty($_POST['jour']) AND !empty($_POST['crenau']) AND !empty($_POST['nb_pers']) AND !empty($_POST['nom']) AND !empty($_POST['prenom']) AND !empty($_POST['mail'])AND !empty($_POST['tel'])) {
	 
		$prenomlength = strlen($prenom);
	  if($prenomlength <= 55){
		 
		$nomlenght = strlen($nom);
		  if($nomlenght <=55){ 

			if (preg_match("#^((\+\d{1,3}(-| )?\(?\d\)?(-| )?\d{1,5})|(\(?\d{2,6}\)?))(-| )?(\d{3,4})(-| )?(\d{4})(( x| ext)\d{1,5}){0,1}$#", $tel))
			{
				$meta_carac = array("-", ".", " ");
				$telephone = str_replace($meta_carac, "", $tel);
				$telephone = chunk_split($telephone, 2, "\r");
	
			
			
			if(filter_var($mail, FILTER_VALIDATE_EMAIL)) {
               $reqmail = $bdd->prepare("SELECT * FROM reservation WHERE mail = ?");
               $reqmail->execute(array($mail));
               $mailexist = $reqmail->rowCount();
			   
			   if($mailexist == 0) {
                     $insertmbr = $bdd->prepare("INSERT INTO reservation ( jour , crenau, nb_pers, nom , prenom , mail , tel , commentaire,presence ) VALUES(?, ?, ?, ?, ?, ?, ?, ?,0)");
                     $insertmbr->execute(array($jour , $crenau ,$nb_pers, $nom ,$prenom , $mail ,$tel ,$commentaire, ));
                    //  $erreur = "Votre compte a bien été créé ! ";
			  
					} else {
                  $erreur = "Adresse mail déjà utilisée !";
               }
		   
			} else {
               $erreur = "Votre adresse mail n'est pas valide !";
			}
			
		} else {
			$erreur = "Format incorrecte ! type 0600000000 ";
		 }

		} else { 
			$erreur ="Votre nom ne doit pas dépasser 55 caractères ";
		}
	
		} else {
         $erreur = "Votre prénom ne doit pas dépasser 55 caractères !";
      }
  
	} else {
      $erreur = "Tous les champs doivent être complétés !";
   }
}
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
			header('Location: admin1.php?date='.$jour.'');
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