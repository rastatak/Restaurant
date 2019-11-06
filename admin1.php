


<?php
// A FAIRE : MISE A JOUR DU FICHIER UPDATE
// A FAIRE : Creer une organisation POO
// PROBLEME BUTTON RESERVATION TOGGLE A REGLER (position du bouton)
// Email non obligatoire


// Connection a la base de donnee.
require 'connection_BDD.php';
$bdd = connect("DB_restaurant");

// Calcul des places restantes
require 'affichage/places_restantes.php';
?>

<!doctype html>
<html lang="fr">
<head>
    <title>Administration Réstaurant</title>
    <meta http-equiv="refresh" content = "60" />
<!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"sintegrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href='//fonts.googleapis.com/css?family=Raleway:400,200,100,300,500,600,700,800,900' rel='stylesheet'type='text/css'>
    <link href='//fonts.googleapis.com/css?family=Open+Sans+Condensed:300,300italic,700' rel='stylesheet' type='text/css'>
<!--style perso-->
    <link rel="stylesheet" type="text/css" href="css/admin.css" />
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/css/bootstrap4-toggle.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/js/bootstrap4-toggle.min.js"></script>
</head>

<body onload="showCollaps()" > 
    <h2 class="text-center mb-3 text-light">Bienvenue Admin, <br>
<!--affiche la date du jour-->
        <script type="text/javascript">
          var ladate=new Date()
          var test = "";
          document.write("Nous sommes le : ");
          console.log(ladate.getDate());
          // Ajout du ZERO si le jour de la date actuelle est inferieur a 10, purement esthetique
          if(ladate.getDate() < 10){ test = "0"+ladate.getDate();}else{ test = ladate.getDate();}
          document.write(test+"/"+(ladate.getMonth()+1)+"/"+ladate.getFullYear())
        </script>
        <br>
<!--heure -->
        <script type="text/javascript">
          var ladate=new Date();
          console.log(ladate);
          var h=ladate.getHours();
          if (h<10) {h = "0" + h}
          var m=ladate.getMinutes();
          if (m<10) {m = "0" + m}
          document.write(h+":"+m)
// Show collaps  under 00h to 16h 
          function showCollaps(){
            if (ladate.getHours()>=0&&ladate.getHours()<=15) {
              c1Debut = document.getElementById("collapseOne").className += " show";
            }else{c2Debut = document.getElementById("collapseTwo").className += " show";}
          }
        </script>
    </h2>

<!-- Boutton "RESERVER" -->
    <div class="btn-mode text-center ">
			<button type="button" class="btn btn-success m-5 " data-toggle="modal"
				data-target=".bd-example-modal-lg"><h3 class="text-light">Ajoutez une résérvation <br>+</h3></button>
    </div>
    <br>
<!--//// affiche la date du jour-->


<!-- Début de la reservation -->
    <div id="tableauResa" class="container-fluid bg-transparent">
<!-- Le code du tableau "service du midi" est raccourci, celui ci est dans le fichier service_midi.php -->
<?php include'affichage/service_midi.php'; ?>
<!-- Le code du tableau "service du soir" est raccourci, celui ci est dans le fichier service_soir.php -->
<?php include'affichage/service_soir.php'; ?>
<!-- Fin de la reservation -->

<!---------------------Debut footer navigation------ -------------->
            <div class="mt-3 ">
              <nav aria-label="Page navigation example" class="col-12  footer-bottom  bg-secondary  pb-2 pt-3">
                <ul class="pagination">
                  <li class="page-item">
                    <a href="admin1.php?date=<?php 
//Navigation entre les jours 
                      if ($date==date('Y-m-d')) {print date('Y-m-d', strtotime(date('d-m-Y').' - 1 DAY')); } else {
                        $stop_date = new DateTime($date_select.' 00:00:00');
                        $stop_date->modify('-1 day');
                        print $stop_date->format('Y-m-d');
                      }?>">
                      <button class="btn btn-dark btn-lg" href="#" aria-label="Previous">
                        <span aria-hidden="true">&laquo;</span> Hier         
                      </button>
                    </a>
                  </li >
                  <h4 class=" ml-4 mr-4 text-light m-auto"><?php echo $date;?></h4>
                  <a href="admin1.php?date=<?php //A vérifier
                    if ($date==date('Y-m-d')) {print date('Y-m-d', strtotime('+ 1 DAY',date('Y-m-d',strtotime($date))));
                    } else {
                      $stop_date = new DateTime($date_select.' 00:00:00');
                      $stop_date->modify('+1 day');
                      print $stop_date->format('Y-m-d');
                    }?>">
                    <button class="btn btn-dark btn-lg" href="#" aria-label="Next"> Demain 
                      <span aria-hidden="true">&raquo;</span>
                    </button>
                  </a>
                </li>
              </ul>
            </nav>
          </div>         
        </div>
<!---------------------------------------------------------MODAL AJOUT RESERVATION MANUELLE-------------------------------------------------------->		
			<div class="modal fade bd-example-modal-lg " tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
				<div class="modal-dialog modal-lg">
					<div class="modal-content bg-secondary text-light text-center">
            <div class="alert alert-success" id="message_saved" role="alert" style="display:none">Réservation effectuée</div>
            <div class="alert alert-danger" id="message_erreur" role="alert" style="display:none"></div>

						<form class="m-5" method="POST" action="post/send_reservation.php">

							<div class="form-row text-center">
								<div class="col">
										<label for="inputFirst">Prénom</label>
									<input type="text" class="form-control" name='prenom' id="prenom" placeholder="Prenom">
								</div>
								<div class="col">
										<label for="inputLast">Nom</label>
									<input type="text" class="form-control" id="nom" name='nom' placeholder="Nom">
								</div>
							</div>

							<div class="form-group">
								<label for="inputEmail4">Email</label>
								<input type="email" name='mail' class="form-control" id="inputEmail4"
									placeholder="name@example.com">
							</div>

							<div class="form-group">
								<label for="inputTel" class=" col-12 w-100">Numéro de Téléphone</label>
								<input type="tel" class="form-control" name='tel' id="inputTel" placeholder="06 01 02 03 04">
							</div> 
							<hr>

									<div class="form-group ">
											<label for="nb_pers" class=" col-12 w-100">Selectionnez le nombre de personnes</label><br>
											<input type="number" name='nb_pers' id="nb_pers" class="form-control w-25 m-auto" value="1" min="0" max="30" step="1"/>
                <label for="jour"  class=" col-12 w-100"><p class="text-center"><strong>Choisissez votre date :</p></strong></label>
								<input name="jour" id="jour" type="date" class="from-control">
							</div>
							

						<div>
                <label for="exampleFormControlSelect1" class=" col-12 w-100"><strong>Quel service ?</strong></label>
								<input type="radio" name="tab" value="igotnone" onclick="show1();" />Midi
								<input type="radio" name="tab" value="igottwo" onclick="show2();" />Soir
								<div id="div1" style="display:none">
                  <hr>
                  <p><strong>Midi</strong></p>
                  <input type="radio" value="1" name="crenau" id="crenau1">service 1 (11-13h)
                  <input type="radio" value="2" name="crenau" id="crenau2" >Service 2 (13-15h)
								</div>
								<div id="div2" style="display:none">
                  <hr>
                  <p><strong>Soir</strong></P>
								<input type="radio" value="3" name="crenau" id="crenau3" >
								Service 1  (19h-21h)
								<input type="radio" value="4" name="crenau" id="crenau4">
								service 2  (21h-23h)
                </div>
                <!--block les dates antèrieures à la date actuelle -->
								<script>
                  var today = new Date().toISOString().split('T')[0];
                  document.getElementsByName("jour")[0].setAttribute('min', today);
								</script>
								<!--script pour les radio (choix des services)-->
								<script>
									function show1(){
                    document.getElementById('div1').style ='display:block';
                    document.getElementById('div2').style = 'display:none';
                  }
                  function show2(){
                    document.getElementById('div2').style = 'display:block';
                    document.getElementById('div1').style ='display:none';
                  }
								</script>
            </div>
							<hr>
							<div class="form-group">
								<label for="message-text" class="col-form-label">Message :</label>
								<textarea class="form-control" name='commentaire' id="message-text"></textarea>
							</div>
							<button type="button" id="reserver" name="reservation" class="btn btn-success btn-lg">Ajouter</button>
						</form>
					</div>
				</div>
			</div>
<!-- Ajax pour ajouter des reservation manuelle  -->
<script type="text/javascript">
  $( "#reserver" ).click(function() {
  var radioValue = $("input[name='crenau']:checked").val();
    $.ajax({
    method: "POST",
    url: "post/send_reservation.php",
    data: { nom: $('#nom').val(), reservation:"",nb_pers:$("#nb_pers").val(),prenom:$('#prenom').val(),mail:$('#inputEmail4').val(),tel:$('#inputTel').val(),jour:$('#jour').val(),crenau:radioValue,commentaire:$('#message-text').val() }
    })
    .done(function( msg ) {
      if (msg=='ok') {
        $('#message_saved').css('display','block');
        $('#message_erreur').css('display','none');
        document.location.reload(true);
                    
      } else {
        $('#message_erreur').html(msg);
        $('#message_erreur').css('display','block');
        $('#message_saved').css('display','none');
      }
    });
  });
</script>
<!-- -------------------------------------------------------Modal for Delete ligne from db----------------------------------------------------- -->

<div class="modal fade" id="modalSuppression" tabindex="-1" role="dialog" aria-labelledby="modalSuppressionLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalSuppressionLabel">Voulez-vous supprimer la résérvation de la base de donnée ? </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-success" data-dismiss="modal">Annuler</button>
        <button type="button" class="btn btn-danger"  id="confirmer" >Oui, patron !</button>
      </div>
    </div>
  </div>
</div>
<!-- SCRIPT PERSO : modal de suppression -->
<script type="text/javascript" src="js/modal-suppression.js"></script>
</body>
</html>