<script>
  function getValue() {
   var isChecked = document.getElementById('my_checkbox').checked;
   var the_value = isChecked ? 1 : 0;
   //do something with that value
}
</script>
<?php
$bdd = new PDO('mysql:host=127.0.0.1;dbname=resto', 'root', '');


//A vérifier
if (isset($_GET["date"])) {
	$date_select=$_GET["date"];
	$date="'".$_GET["date"]."'";
} else {
  $date_select="";
	$date="DATE( NOW())";
}

$results_midi=$bdd->query("SELECT * FROM `reservation` WHERE `jour`=".$date." AND crenau='1'");
$reservations_midi=$results_midi->fetchAll(PDO::FETCH_ASSOC);

$results_midi2=$bdd->query("SELECT * FROM `reservation` WHERE `jour`=".$date." AND crenau='2'");
$reservations_midi2=$results_midi2->fetchAll(PDO::FETCH_ASSOC);

$results_soir=$bdd->query("SELECT * FROM `reservation` WHERE `jour`=".$date." AND crenau='3'");
$reservations_soir=$results_soir->fetchAll(PDO::FETCH_ASSOC);

$results_soir2=$bdd->query("SELECT * FROM `reservation` WHERE `jour`=".$date." AND crenau='4'");
$reservations_soir2=$results_soir2->fetchAll(PDO::FETCH_ASSOC);


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

$nbrplace = 30; // Changer le Nombres de place  pour voir le nb de places restante



// print $results_midi2->rowCount();

?>

<!doctype html>
<html lang="en">

<head>
    <title>Administration Réstaurant</title>
    <meta http-equiv="refresh" content = "60" />
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <link href='//fonts.googleapis.com/css?family=Raleway:400,200,100,300,500,600,700,800,900' rel='stylesheet'
        type='text/css'>
    <link href='//fonts.googleapis.com/css?family=Open+Sans+Condensed:300,300italic,700' rel='stylesheet'
        type='text/css'>


<!--style perso-->
    <link rel="stylesheet" type="text/css" href="css/admin.css" />

      <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>

    <link href="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/css/bootstrap4-toggle.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/js/bootstrap4-toggle.min.js"></script>
</head>

<body onload="showCollaps()" > 
    
    <h2 class="text-center mb-3 text-light">Bienvenue Admin, <br>
      <!--affiche la date du jour-->
        <script type="text/javascript">
          var ladate=new Date()
          document.write("Nous sommes le : ");
          document.write(ladate.getDate()+"/"+(ladate.getMonth()+1)+"/"+ladate.getFullYear())
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
            
            }
            else{
              c2Debut = document.getElementById("collapseTwo").className += " show";
            }
            }
            </script>
          </h2>
          	<!-- Reserve Button Start -->
			<div class="btn-mode text-center ">
			<button type="button" class="btn btn-success m-5 " data-toggle="modal"
				data-target=".bd-example-modal-lg"><h3 class="text-light">Ajoutez une résérvation <br>+</h3></button>
			</div>
    <br>
      <!--//// affiche la date du jour-->

<div id="tableauResa" class="container-fluid bg-transparent">
                

<!-- --------------------------------------------------------------SERVICE DE MIDI------------------------------------------------------------------------>
        <div class="accordion" id="accordionExample">
                <div class="card bg-secondary">
                  <div class="card-header" id="headingOne">
                    <h2 class="mb-0 text-center">
                      <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                      <h2 class="text-light">MIDI</h2>
                      </button>
                    </h2>
                  </div>
              
                  <div id="collapseOne" class="collapse " aria-labelledby="headingOne" data-parent="#accordionExample">
                    <div class="card-body">
<!--------------------------------------------------SERVICE 1 MIDI -------------------------------------------------------->
<div class="card text-center">
        <div class="card-header" id="headingTwo1">
          <h2 class="mb-0">
            <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapse1bis" aria-expanded="false" aria-controls="collapse1bis">
                <h2 class="text-dark">Service 1</h2>
            </button>
          </h2>
          <p class="text-right text-dark">Il reste <?php print $nbrplace - $x1[0]["nbresa"];?> places </p>
          
        </div>
        <div id="collapse1bis" class="collapsed" aria-labelledby="headingTwo1" >
          <div class="card-body">
           <table class="table table-striped">
                <thead class="thead-dark">
                  <tr>
                    <th scope="col">Nom</th>
                    <th scope="col">prenom</th>
                    <th scope="col">Mail</th>
                    <th scope="col">Tel</th>
                    <th scope="col">Note</th>
                    <th scope="col">Nb pers </th>
                    <th scope="col">Présence<br> OUI/NON</th>
                    <th scope="col">Suppression</th>
                  </tr>
                </thead>
                <tbody>
                  <?php 
                    foreach($reservations_midi as $value) {?>
                  <tr>
                    <th scope="row"><?php print $value["nom"]; ?></th>
                    <td><?php print $value["prenom"]; ?></td>
                    <td><?php print $value["mail"]; ?></td>
                    <td><?php print $value["tel"]; ?></td>
                    <td><?php print $value["commentaire"]; ?></td>
                    <td><?php print $value["nb_pers"]; ?></td>
                    <td><input type="checkbox" checked data-toggle="toggle" data-on="N" data-off="O" data-onstyle="danger" data-offstyle="success" id="TG"></td>
                    <td><button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal" data-id="<?php print $value["id_resa"]; ?>">X</button></td>
                  </tr>
                    <?php } ?>
                </tbody>
              </table>
          </div>
        </div>
      </div>   
<!--------------------------------------------------------- SERVICE 2 MIDI ------------------------------------------------------------------------ -->
      <div class="card text-center">
        <div class="card-header" id="headingThree">
          <h2 class="mb-0">
            <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseThree1" aria-expanded="false" aria-controls="collapseThree1">
                <h2 class="text-dark">Service 2</h2>
            </button>
          </h2>
          <p class="text-right text-dark">Il reste <?php print $nbrplace - $x2[0]["nbresa"];?> places </p>
        </div>
        <div id="collapseThree1" class="collapsed" aria-labelledby="headingThree1" >
          <div class="card-body">
             
             <table class="table table-striped">
                    <thead class="thead-dark">
                      <tr>
                        <th scope="col">Nom</th>
                        <th scope="col">prenom</th>
                        <th scope="col">Mail</th>
                        <th scope="col">Tel</th>
                        <th scope="col">Note</th>
                        <th scope="col">Nb pers </th>
                        <th scope="col">Présence<br> OUI/NON</th>
                        <th scope="col">Suppression</th>
                        <th scope="col">Modification</th>
                      </tr>
                    </thead>
                    <tbody>
<?php 
  foreach($reservations_midi2 as $value) {
    echo $value["presence"];
    ?>
<tr>
  <form action="send_reservation.php?date=<?php echo $value["jour"]; ?>&id_resa=<?php echo $value["id_resa"]; ?>" method="POST">
    <th scope="row"><?php print $value["nom"]; ?></th>
    <td><?php print $value["prenom"]; ?></td>
    <td><?php print $value["mail"]; ?></td>
    <td><input type="text" name="tel" value="<?php print $value["tel"]; ?>"></td>
    <td><textarea name="commentaire" cols="15" rows="3"><?php print $value["commentaire"]; ?></textarea></td>
    <td><input type="number" name="nb_pers" value="<?php print $value["nb_pers"]; ?>"></td>
    <td>
      <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio"  name="presenceOuNon" <?php if($value["presence"] = 1){ echo " checked";} ?> value="1">
        <label class="form-check-label">Present</label>
      </div>
      <div class="form-check form-check-inline">
      <input class="form-check-input" type="radio" name="presenceOuNon" <?php if($value["presence"] = 0){ echo " ";} ?> value="0">
        <label class="form-check-label">Pas présent</label>
      </div>
    </td>

     <!-- <td><input type="checked" id="toggle-trigger" name="presenceOuNon" data-toggle="toggle" data-on="N" data-off="O" data-onstyle="danger" data-offstyle="success" data-onvalue=""></td>  -->
    <td><button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal" data-id="<?php print $value["id_resa"]; ?>">X</button></td>
    <td><input type="submit" name="update_reservation" value="Modifier"></td>
  
  </form>
</tr>

  <?php } ?>
</tbody>
<script>
  $(function() {
    if($('#toggle-trigger').value("1") == true){
      $('#toggle-trigger').bootstrapToggle('on') 
    }else{
      $('#toggle-trigger').bootstrapToggle('off') 
    }
});
    
 
</script>
                  </table>
          </div>
        </div>
                    </div>
                  </div>
                </div>
<!------------------------------------------------------------------- FIN SERVICE MIDI------------------------------------------------------------>
<!--------------------------------------------------------------------- SERVICE SOIR ------------------------------------------------------------------------------>
                          <div class="card bg-dark text-center">
                <div class="card bg-dark ">
                  <div class="card-header" id="headingTwo">
                    <h2 class="mb-0 text-center">
                      <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                        <h2 class="text-light">SOIR</h2>
                      </button>
                    </h2>
                  </div>
  <!------------------------------------------SERVICE 1 SOIR------------------------------------------>
                  <div id="collapseTwo" class="collapse " aria-labelledby="headingTwo" data-parent="#accordionExample">
                    <div class="card-body">                   
                     <div class="card bg-dark">
                            <div class="card-header bg-secondary" id="headingTwo2">
                              <h2 class="mb-0">
                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapse1bis" aria-expanded="false" aria-controls="collapse1bis">
                                    <h2 class="text-light">Service 1</h2>
                                </button>
                              </h2>
                              <p class="text-right text-light">Il reste <?php print $nbrplace - $x3[0]["nbresa"];?> places </p>
                            </div>
                            <div id="collapse1bis" class="collapsed" aria-labelledby="headingTwo2" >
                              <div class="card-body bg-dark">
                               <table class="table table-striped table-dark">
                                    <thead>
                                      <tr>
                                        <th scope="col">Nom</th>
                                        <th scope="col">prenom</th>
                                        <th scope="col">Mail</th>
                                        <th scope="col">Tel</th>
                                        <th scope="col">Note</th>
                                        <th scope="col">Nb pers</th>
                                        <th scope="col">Présence<br> OUI/NON</th>
                                        <th scope="col">Suppression</th>
                                      </tr>
                                    </thead>
                                    <tbody>
<?php 

  foreach($reservations_soir as $value) {?>
<tr>
  <th scope="row"><?php print $value["nom"]; ?></th>
  <td><?php print $value["prenom"]; ?></td>
  <td><?php print $value["mail"]; ?></td>
  <td><?php print $value["tel"]; ?></td>
  <td><?php print $value["commentaire"]; ?></td>
  <td><?php print $value["nb_pers"]; ?></td>
  <td><input type="checkbox" checked data-toggle="toggle" data-on="N" data-off="O" data-onstyle="danger" data-offstyle="success"></td>
  <td><button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal" data-id="<?php print $value["id_resa"]; ?>">X</button></td>
</tr>
  <?php } ?>
</tbody>
                                  </table>
                              </div>
                            </div>
                          </div>
<!------------------------------------------SERVICE 2 SOIR------------------------------------------>
                          <div class="card bg-dark text-center">
                            <div class="card-header bg-secondary" id="headingThree2">
                              <h2 class="mb-0">
                                <button class="btn btn-link collapsed " type="button" data-toggle="collapse" data-target="#collapseThree2" aria-expanded="false" aria-controls="collapseThree2">
                                  <h2 class="text-light">Service 2</h2>
                                </button>
                              </h2>
                              <p class="text-right text-light">Il reste <?php print $nbrplace - $x4[0]["nbresa"];?> places </p>
                            </div>
                            <div id="collapseThree2" class="collapsed" aria-labelledby="headingThree2" >
                              <div class="card-body bg-dark">
                                <table class="table table-striped table-dark">
                                        <thead>
                                          <tr>
                                            <th scope="col">Nom</th>
                                            <th scope="col">prenom</th>
                                            <th scope="col">Mail</th>
                                            <th scope="col">Tel</th>
                                            <th scope="col">Note</th>
                                            <th scope="col">Nb Pers</th>
                                            <th scope="col">Présence<br> OUI/NON</th>
                                            <th scope="col">Suppression</th>
                                          </tr>
                                        </thead>
                                        <tbody>

                  <?php 

                    foreach($reservations_soir2 as $value) {?>
                  <tr>
                    <th scope="row"><?php print $value["nom"]; ?></th>
                    <td><?php print $value["prenom"]; ?></td>
                    <td><?php print $value["mail"]; ?></td>
                    <td><?php print $value["tel"]; ?></td>
                    <td><?php print $value["commentaire"]; ?></td>
                    <td><?php print $value["nb_pers"]; ?></td>
                    <td><input type="checkbox" checked data-toggle="toggle" data-on="N" data-off="O" data-onstyle="danger" data-offstyle="success"></td>
                    <td><button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal" data-id="<?php print $value["id_resa"]; ?>">X</button></td>
                  </tr>
                    <?php } ?>
                </tbody>
                                      </table>
                              </div>
                            </div>
                          </div>
                    </div>
                  </div>
                </div> 
              </div>
<!---------------------------------------------------------Fin du tableau de reservation -------------------------------------------------->

<!---------------------------------------------------------Debut footer navigation------ -------------------------------------------------->
            <div class="mt-3 ">
              <nav aria-label="Page navigation example" class="col-12  footer-bottom  bg-secondary  pb-2 pt-3">
                    <ul class="pagination">
                      <li class="page-item">
            <a href="admin1.php?date=<?php 
            
            //Navigation entre les jours 
						if ($date==date('Y-m-d')) { print date('Y-m-d', strtotime(date('d-m-Y').' - 1 DAY')); } else {
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
			<div class="modal fade bd-example-modal-lg " tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
				aria-hidden="true">
				<div class="modal-dialog modal-lg">
					<div class="modal-content bg-secondary text-light text-center">
					<div class="alert alert-success" id="message_saved" role="alert" style="display:none">Réservation effectuée</div>
						
					<div class="alert alert-danger" id="message_erreur" role="alert" style="display:none"></div>

						<form class="m-5 " method="POST">

							<div class="form-row ">
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

									<div class="form-group">
											<label for="exampleFormControlSelect1" class=" col-12 w-100">Select le nombre de personnes</label><br>
											<input type="number" name='nb_pers' id="nb_pers" class="form-control " value="1" min="0" max="30" step="1"/>
										 <label for="exampleFormControlSelect1"  class=" col-12 w-100"><p class="text-center"><strong>Choisissez votre date :</p></strong></label>
								<input name="jour" id="jour" type="date" class="from-control">
							</div>
							

						<div>
							    <label for="exampleFormControlSelect1" class=" col-12 w-100"><strong>Quelle services?</strong></label>
								<input type="radio" name="tab" value="igotnone" onclick="show1();" />
								Midi
								<input type="radio" name="tab" value="igottwo" onclick="show2();" />
								Soir
								<div id="div1" style="display:none">
								  <hr><p><strong>Midi</strong></p>
								<input type="radio" value="1" name="crenau" id="crenau1">
								service 1 (11-13h)
								<input type="radio" value="2" name="crenau" id="crenau2" >
								Service 2 (13-15h)
								</div>
								<div id="div2" style="display:none">
								  <hr><p><strong>  Soir</strong></P>
								<input type="radio" value="3" name="crenau" id="crenau3" >
								Service 1  (19h-21h)
								<input type="radio" value="4" name="crenau" id="crenau4">
								service 2  (21h-23h)
								</div>
								<!--block les date inferieur -->
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
								<label for="message-text" class="col-form-label">Message:</label>
								<textarea class="form-control" name='commentaire' id="message-text"></textarea>
							</div>
							<button type="button" id="reserver" name="reservation"class="btn btn-success btn-lg">Ajouter</button>
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
  url: "send_reservation.php",
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

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">voulez vous supprimer la résérvation de la base de donnée ? </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-success" data-dismiss="modal">NON</button>
        <button type="button" class="btn btn-danger"  id="comfirmer" >Oui, patron !</button>
      </div>
    </div>
  </div>
</div>
<!-- ajax 4 delete modal -->
<script type="text/javascript">
  var id;
  $('#exampleModal').on('show.bs.modal', function (event) {
  
  var button = $(event.relatedTarget) // Button that triggered the modal
  id = button.data('id') // Extract info from data-* attributes
  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
 
  });
  $( "#comfirmer" ).click(function() {

  console.log(id);



  $.ajax({
  url: "delete.php?id_resa="+id
  
  }).done(function( str ) {
    $('#exampleModal').modal('hide');
    alert('Cela a bien été supprimé');
    document.location.reload(true);
  });

  });


</script>

</body>

</html>