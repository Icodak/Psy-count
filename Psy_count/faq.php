

<!doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <title>mes données</title>
  <link rel="icon" type="image/png" href="images/psy-fi.png" />
  <link rel="stylesheet" href="css//style_faq.css">
  <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Lato" />
    <script type="text/javascript" src="javaScript//javaScriptCode_.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
</head>
<body>
  <div id="head">

	<header>
		<?php include("menuBar.php") ?>
	</header>

  <div id="faqText">
    
  <h1 style="color:white">FOIRE AUX QUESTIONS</h1>


  </div>
  <div id="faqText2">
  <h3 class="static" >questions fréquentes :</h3>
  </div>
  </div>


<?php
    try{

                $dbco = new PDO("mysql:host=localhost;dbname=serveur_psy_fi",'root','');
                //connexion au serveur/la bdd
                $dbco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                $req2 =  $dbco->prepare(
                  'SELECT question,reponse from faq');
                $req2->execute();
                $resultat3 = $req2->fetchAll();
                //requête SQL pour récupérer toutes les questions et les mettre dans la var

        ?>
                <div id="questionReponse"> 
         




     <?php

          if(isset($_SESSION["faqModification"])){
          if( $_SESSION["faqModification"]=='true'){
            //check Form bouton Modifier plus bas -> fonction3
      ?>
             <form method="post" action="faqFonctionTrois.php">
              <h2>QESTION</h2>
            <div class="question">
              <div class="questionText">
                <textarea name="question"><?php echo  $resultat3[$_SESSION["faqID"]][0] ?></textarea>

            </div>
          </div>
            </div>
                <h2>REPONSE</h2>
                <div class="question">
                      <textarea name="reponse"><?php echo $resultat3[$_SESSION["faqID"]][1]   ?> </textarea>
                 </div>

                   <input  name="typeId3" type="hidden" value= <?php echo $_SESSION["faqID"] ?> >  

                   <div id="registerButton">
                   <input  name="idval3" type="submit" class="button6" value= "Enregistrer" >
                   </div>
                </form>

                

            </form>


      <?php

          }
        }


        if(!isset($_SESSION["faqModification"])||$_SESSION["faqModification"]=='false'){

        
                for ($i = 0; $i <= count( $resultat3)-1 ; $i++) {
                  //Affiche toutes les div à créer selon le nombre de questions

      ?>

  <script type="text/javascript">  //Début d'une "boucle"       
                var variableRecuperee = <?php echo json_encode($resultat3)  ?>;
  </script>
                <div class="question">

                  <div class="questionText">

                  <h1  onclick="faq(variableRecuperee,this)"> <?php echo $resultat3[$i][0]  ?></h1>
                  <!--1ère Q d'id $i-->

      <?php
  if(isset($_SESSION['type'])){
    if($_SESSION['type']=='Admin'){
?>
                  
                <form method="post" action="faqFonctionDeux.php">

                <input  name="typeId" type="hidden" value=<?php echo $i ?>  >   
                <input  name="idval" type="submit" class="button6" value= "supprimer"  id=<?php echo $i ?>>
                </form>

                <form method="post" action="faqFonctionTrois.php">
                <input  name="typeId2" type="hidden" value=<?php echo $i ?>  >   
                <input  name="idval2" type="submit" class="button6" value= "modifier"  id=<?php echo $i ?>>
                <!--type submit renvoie les infoes dans l'action faqFonctionDeux.php-->
                <!--le name est l'identifiant, à utiliser avec $Post qui récupère la value-->
                </form>


  <?php
}
}

?>

                  </div>
              
                </div>



                <div class="reponse">
                  <h1 > <?php echo $resultat3[$i][1]  ?></h1>

               
                 </div>

                    
      <?php
    
                }
      ?>
               </div>


      <?php
    
  }

    }

    catch(PDOException $e){
       echo "Erreur : " . $e->getMessage();


    } //catch permet de récupérer les erreurs qui sont contenues dans $e, à chaque requête SQL mettre try et catch pour savoir d'où vient le pb avec les $db

?>


<div id="values">

  <input size="100%" type="" name="" placeholder="value">
  
  <a href="signIn.php" class="button6" > Besoin d'aide ? </a>

<?php
  if(isset($_SESSION['type'])){
    if($_SESSION['type']=='Admin'){
?>

  <a href="faqAdmin.php" class="button6" > ajouter </a> 
<?php

}
}
?>










</div>






</body>
</html>