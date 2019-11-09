<!DOCTYPE html>
<html>

<head>
	<title>La pause Gourmande</title>


	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.15.1/moment.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
		integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css">

	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
	<script src="js/jquery.min.js"></script>




	<!--//theme-style-->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="keywords" content="Cookery Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
	<script
		type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
	<!--Police d'ecriture-->
	<link href='//fonts.googleapis.com/css?family=Raleway:400,200,100,300,500,600,700,800,900' rel='stylesheet'
		type='text/css'>
	<link href='//fonts.googleapis.com/css?family=Open+Sans+Condensed:300,300italic,700' rel='stylesheet'
		type='text/css'>
	<!-- start-smoth-scrolling -->
	<script type="text/javascript" src="js/move-top.js"></script>
	<script type="text/javascript" src="js/easing.js"></script>

	<!-- CSS -->
	<link href="css/styles.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="css/component.css" />
	<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
	<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />


	<!-- animation-effect -->
	<link href="css/animate.min.css" rel="stylesheet">
</head>



<body>
	<div class="header">
		<div class="container">
			<div class="logo animated wow pulse" data-wow-duration="1000ms" data-wow-delay="500ms">
			</div>
			<div class="nav-icon">
				<a href="#" class="navicon"></a>
				<div class="toggle">
					<ul class="toggle-menu">
						<li><a class="active" href="index.html">Home</a></li>
						<li><a href="events.html">Menu</a></li>
						<li><a href="contact.html">Contact</a></li>
					</ul>
				</div>
				<script>
					$('.navicon').on('click', function (e) {
						e.preventDefault();
						$(this).toggleClass('navicon--active');
						$('.toggle').toggleClass('toggle--active');
					});
				</script>
			</div>
			<div class="clearfix"></div>
		</div>
		<!-- start search-->
		<div class="banner">
			<label></label>
			<h4 class="animated wow fadeInTop" data-wow-duration="1000ms" data-wow-delay="500ms">Hello And Welcome To
				Food</h4>
<!-- Reserve Button Start -->
			<div class="btn-mode">
			<button type="button" class="btn btn-dark p-5 m-5 " data-toggle="modal"
				data-target=".bd-example-modal-lg"><h3 class="text-light">Book Now !</h3></button>
			</div>
<!-- Reservation pour modal -->
			<div class="modal fade bd-example-modal-lg  " id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
				aria-hidden="true">
				<div class="modal-dialog modal-lg">
					<div class="modal-content">
						<form class="m-2" autocomplete="on" method="POST">

							<div class="form-row w-75 m-auto ">
							<div class="form-group w-100 row">
								<div class="col-6">
								<label for="exampleFormControlSelect1"  class="w-100 "><h2 class="font-weight-bold">Choisissez votre date :</h2></label>
								<input name="jour" id="jour" type="date" class="from-control">
								</div>
								
								<div class="col-6">
								<label for="exampleFormControlSelect1" class=" col-12 w-100"> <h2 class="font-weight-bold">Quel service ? </h2></label>
								<input type="button" class="btn border-dark" id="midi" name="tab" value="MIDI" onclick="show1();" />
								<input type="button" id="soir" class="btn btn-dark" name="tab" value="SOIR" onclick="show2();" />
								<div id="div1" style="display:none">
								<input type="radio" value="1" name="crenau" id="crenau1">
								<label for="crenau1">
								Service 1 (11-13h)</label>
								<input type="radio" value="2" name="crenau" id="crenau2" ><label for="crenau2">
								Service 2 (13-15h)</label>
								</div>
								<div id="div2" style="display:none">
								<input type="radio" value="3" name="crenau" id="crenau3" ><label for="crenau3">
								Service 1  (19h-21h)</label>
								<input type="radio" value="4" name="crenau" id="crenau4"><label for="crenau4">
								Service 2  (21h-23h)</label>
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
								<label for="exampleFormControlSelect1" class="w-100"><h2 class="font-weight-bold">Nombre de personnes</h2></label><br>
								<div class="mt-3 w-100"><input type="number" name='nb_pers' id="nb_pers" class="form-control  w-25 m-auto " value="1" min="0" max="30" step="1"/></div>
							</div>
								<div class="col">
										<label for="inputFirst">Prénom</label>
									<input type="text"  class="form-control" name='prenom' id="prenom"  placeholder="Prénom">
								</div>
								<div class="col">
										<label for="inputLast">Nom</label>
									<input type="text" autocomplete="name"  class="form-control " id="nom" name='nom' placeholder="Nom">
								</div>
							</div>

							<div class="form-group">
								<label for="inputEmail4"><h2 class="font-weight-bold">Email</h2></label>
								<div class="mt-3"><input type="email" name='mail' class="form-control w-75 m-auto text-center" id="inputEmail4" placeholder="name@example.com"></div>
							</div>
							<div class="form-group">
								<label for="inputTel" class=" col-12 w-100"><h2 class="font-weight-bold">Numéro de Téléphone</h2></label>
								<div class="mt-3"><input type="tel" class="form-control w-50 m-auto text-center" name='tel' id="inputTel" placeholder="06 01 02 03 04"></div>
							</div> 
							
							<div class="form-group">
								<label for="message-text" class="col-form-label"><h2 class="font-weight-bold">Message:</h2></label>
								<div class="mt-3"><textarea class="form-control w-75 m-auto" name='commentaire' id="message-text"></textarea></div>
							</div>
							<button type="button" id="reserver" name="reservation"  class="btn btn-success btn-lg"><h2>Réservez</h2></button>
						</form>
						<div class="alert alert-success mt-3" id="message_saved" role="alert" style="display:none">Réservation effectuée</div>
						
						<div class="alert alert-danger mt-3" id="message_erreur" role="alert" style="display:none"></div>
					</div>
				</div>
			</div>

<!--!!!!!!!!!!!!!!!!!! fin du modal !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!! -->

		</div>
	</div>
	<!--content-->
	<div class="content" id="content-down">
		<div class="content-top-top">
			<div class="container">
				<div class="content-top">
					<div class="col-md-4 content-left animated wow fadeInLeft" data-wow-duration="1000ms"
						data-wow-delay="500ms">
						<h3>Menus</h3>
						<label><i class="glyphicon glyphicon-menu-up"></i></label>
						<span>There are many variations</span>
					</div>
					<div class="col-md-8 content-right animated wow fadeInRight" data-wow-duration="1000ms"
						data-wow-delay="500ms">
						<p>There are many variations of passages of Lorem Ipsum available, but the majority have
							suffered alteration in some form, by injected humour , or randomised words which don't look
							even slightly believable.There are many variations by injected humour. There are many
							variations of passages of Lorem Ipsum available.There are many variations of passages of
							Lorem Ipsum available, but the majority have suffered alteration in some form by injected
							humour , or randomised words</p>
					</div>
					<div class="clearfix"> </div>
				</div>
				<div class="content-mid">

					<div class="col-md-4 food-grid animated wow fadeInUp" data-wow-duration="1000ms"
						data-wow-delay="500ms">
						<div class=" hover-fold">
							<h4>Menu Decouverte</h4>
							<div class="top">
								<div class="front face"></div>
								<div class="back face">
									<p>There are many variations of passages of Lorem Ipsum available, but the majority
										have suffered alteration in some form, by injected humour</p>
								</div>
							</div>
							<div class="bottom"></div>
						</div>
					</div>
					<div class="col-md-4 food-grid animated wow fadeInLeft" data-wow-duration="1000ms"
						data-wow-delay="500ms">
						<div class=" hover-fold">
							<h4>Menu Inspiration</h4>
							<div class="top">
								<div class="front face front1"></div>
								<div class="back face">
									<p>There are many variations of passages of Lorem Ipsum available, but the majority
										have suffered alteration in some form, by injected humour</p>
								</div>
							</div>
							<div class="bottom bottom1"></div>
						</div>
					</div>
					<div class="col-md-4 food-grid animated wow fadeInDown" data-wow-duration="1000ms"
						data-wow-delay="500ms">
						<div class=" hover-fold">
							<h4>Menu du Jours</h4>
							<div class="top">
								<div class="front face front2"></div>
								<div class="back face">
									<p>There are many variations of passages of Lorem Ipsum available, but the majority
										have suffered alteration in some form, by injected humour</p>
								</div>
							</div>
							<div class="bottom bottom2"></div>
						</div>
					</div>
					<div class="clearfix"></div>
				</div>
			</div>
		</div>

	</div>
	<!--footer-->
	<div class="footer">
		<div class="container">
			<div class="footer-head">
				<div class="col-md-8 footer-top animated wow fadeInRight" data-wow-duration="1000ms"
					data-wow-delay="500ms">
					<ul class=" in">
						<li><a href="index.html">Home</a></li>
						<li><a href="events.html">Menu</a></li>
						<li><a href="contact.html">Contact</a></li>
					</ul>
					<span>There are many variations of passages</span>
				</div>
				<div class="col-md-4 footer-bottom  animated wow fadeInLeft" data-wow-duration="1000ms"
					data-wow-delay="500ms">
					<h2>Follow Us</h2>
					<label><i class="glyphicon glyphicon-menu-up"></i></label>
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
						labore et dolore magna aliqua. Ut enim ad minim veniam, quis.</p>
					<ul class="social-ic">
						<li><a href="#"><i></i></a></li>
						<li><a href="#"><i class="ic"></i></a></li>
						<li><a href="#"><i class="ic1"></i></a></li>
						<li><a href="#"><i class="ic2"></i></a></li>
						<li><a href="#"><i class="ic3"></i></a></li>
					</ul>
				</div>
				<div class="clearfix"> </div>
			</div>
<!--//footer-->
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
							alert('Votre résérvation à bien était pris en compte !');
//refresh la page si tout est ok
							document.location.reload(true); 
						} else {
							$('#message_erreur').html(msg);
							$('#message_erreur').css('display','block');
							$('#message_saved').css('display','none');
						}
					});
				});
			</script>

<script type="text/javascript" src="js/easing.js"></script>

</body>

</html>