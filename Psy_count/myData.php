
<!doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <title>mes données</title>
  <link rel="icon" type="image/png" href="images/psy-fi.png" />
  <link rel="stylesheet" href="css/style_myData_.css">
  <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Lato" />
</head>
<body>

	<header>
		<?php include("menuBar.php") ?>
	</header>


  <div id="myDataPage">
  	
  	<div id="doctorPage">

  				<div id="doctorData">
  					<div id="UserImage" >	
  						<img src="images/backgroundImages vertical.png">

	  				</div>

	  				<div id="doctorLabel">  	
	  					<ul>
	  						<li>
	  							Label
	  							<hr size=3 id="sepator1">
	  							
	  						</li>

	  						<li>
	  							Label
	  							<hr size=3 id="sepator1">
	  							
	  						</li>
								
							<li>
								Label
								<hr size=3 id="sepator1">
	  							
	  						</li>
	


	  					</ul>	

  					</div>
	  					

  				</div>

  				<div id="consultButton">
  						<h4 id="consultbuttonText">Medecin traitant</h4>
  						<a href="" > <button class="button4">  consulter  </button> </a>
  				</div>
  		

  	</div>


  	<div id="graphPage">

  		<div class="subgraphPage">

				<div class="graph">
					<h1>Cardiaque</h1>
					<a href="" type="hidden">
					<img  class="responsive" src="images/frequence.jpg">
					</a>
  		

  				</div>

  				<div class="graph" >
					<h1>Tonalité</h1>
					<a href="" type="hidden">
					<img class="responsive" src="images/voice.jpg">
					</a>
  			    </div>

  		</div>
  		<div class="subgraphPage">

  				<div class="graph">
  					<h1>Température</h1>
  					<a href="" type="hidden">
  					<img class="responsive" src="images/temperature2.jpg">
  					</a>
  				</div>

  				<div class="graph">
  					<h1>Reaction</h1>
  					<a href="" type="hidden">
  					<img class="responsive" src="images//reaction2.jpg">
  					</a>
  				</div>
  		</div>

  	</div>




  </div>



  <?php include("footer.php") ?>

</body>

</html>