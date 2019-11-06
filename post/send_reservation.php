<?php
// Connection a la base de donnee.
require '../connection_BDD.php';
$bdd = connect("DB_restaurant");

$erreur="";

// 'reservation' correspond au nom des submit presents dans admin1.php et dans reservation.php
if(isset($_POST['reservation'])) {
// Definition des variables via la recuperation des $_POST
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
				if (preg_match("#^((\+\d{1,3}(-| )?\(?\d\)?(-| )?\d{1,5})|(\(?\d{2,6}\)?))(-| )?(\d{3,4})(-| )?(\d{4})(( x| ext)\d{1,5}){0,1}$#", $tel)){
					$meta_carac = array("-", ".", " ");
					$telephone = str_replace($meta_carac, "", $tel);
					$telephone = chunk_split($telephone, 2, "\r");
// Verification que l'input mail recoive un mail valide
					if(filter_var($mail, FILTER_VALIDATE_EMAIL)) {
						$reqmail = $bdd->prepare("SELECT * FROM reservation WHERE mail = ?");
						$reqmail->execute(array($mail));
						$mailexist = $reqmail->rowCount();
// Verification que le mail ne se trouve pas deja dans la BDD
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

if ($erreur) {
    print $erreur;
} else {
    print "ok";
}