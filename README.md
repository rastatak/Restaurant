<h1 class="centrer">#BOOKING Restaurant System</h1>

Avant toutes choses : 

La BDD est nommée resto.sql.

La page client est nommée reservation.php. (La seule veritable utilité de cette page reste le BOOK NOW).

La page admin est nommée admin1.php.

Pas d'index pour l'instant je suis encore en phase de test. 








<h3>Taches en cours :</h3>

-Ajout d'un calendrier ( <input type="date"></input>)  pour la navigation des reservation.  // 
|
|-->  J'attend de voir ton code qui rend les jours dynamique pour voir si je peut regler la methode GET de cette input afin d'avoir la possibilité de naviguer dans les reservation via le input # adateHistorique 

<h3>Taches à effectuer :</h3>

-[ RESERVATION ] Blocker les places par créneau par raport à la variable $nbplace  ( 30 ). // A SUPPRIMER

-Autorisation d'inscription  des email en double et sans email

-Ajout de la fonction présences oui ou non (en cours )

<s>-Ajout d'une fonction pour modifier les fiches clients coté admin . </S>



-* Ajout un espace de connexion  et de creation de compte pour les personnes autorisé à utiliser l'espace *Admin </br>
Employer : Vision seule </br>
Patron : Droit de modifier et suprimer les résérvations *


<h3>Autres idées :</h3>

-Joue un song / notification  pour chaque reservation ajouter .

-envoie email automatique afin de donner un avis dans le livre d'or si present .

-Ajout d'une section avis  avec notation sur 5 . 





<!---------AUTRE---------->

_Différencier les reservations "clients" des reservations "patron", peut-etre par des couleurs de BG differentes à voir !!

_Coté client, si il veut supprimer sa reservation lui : Creer un bouton [Annuler sa reservation ?] ; Et afficher un lien genre :     <a href="tel:+33600000000">Link text</a> avec le numero du resto


