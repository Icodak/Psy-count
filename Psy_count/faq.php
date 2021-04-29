

<!doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <title>FAQ</title>
  <link rel="icon" type="image/png" href="images/psy-fi.png" />
  <link rel="stylesheet" href="css//style_faq.css">
  <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Lato" />
    <script type="text/javascript" src="javaScript/javaScriptCode.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
</head>
<body>
<div id="faq">
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
                $dbco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                $req2 =  $dbco->prepare(
                  'SELECT question,reponse from faq');
                $req2->execute();
                $resultat3 = $req2->fetchAll();

        ?>
                <div id="questionReponse"> 
         




     <?php

          if(isset($_SESSION["faqModification"])){
          if( $_SESSION["faqModification"]=='true'){
      ?>
             <form method="post" action="faqFonctionTrois.php">
              <h2>QUESTION</h2>
            <div class="question">
              <div class="questionText">
                <textarea name="question"><?php echo $resultat3[$_SESSION["faqID"]][0]?></textarea>

            </div>
          </div>
            </div>
                <h2>R&EacutePONSE</h2>
                <div class="question">
                      <textarea name="reponse"><?php echo $resultat3[$_SESSION["faqID"]][1]?></textarea>
                 </div>

                   <input  name="typeId3" type="hidden" value= <?php echo $_SESSION["faqID"]?>>  

                   <div id="registerButton">
                   <input  name="idval3" type="submit" class="button" value= "Enregistrer" >
                   </div>
                </form>

                

            </form>


      <?php

          }
        }


        if(!isset($_SESSION["faqModification"])||$_SESSION["faqModification"]=='false'){

        
                for ($i = 0; $i <= count( $resultat3)-1 ; $i++) {

      ?>

  <script type="text/javascript">         
                var variableRecuperee = <?php echo json_encode($resultat3)  ?>;
  </script>
                <div class="question">

                  <div class="questionText">

                  <h1> <?php echo $resultat3[$i][0]?> <img class="flecheBottom" onclick="faq(variableRecuperee,this)" src="images/flecheBottom.png"  id="<?php echo $resultat3[$i][0]?>" >   </h1>





      <?php
  if(isset($_SESSION['type'])){
    if($_SESSION['type']=='Admin'){
?>
                  
                <div class="faqButton">
                <form method="post" action="faqFonctionDeux.php">

                <input  name="typeId" type="hidden" value=<?php echo $i ?>  >   
                <input  name="idval" type="submit" class="button" value= "supprimer"  id=<?php echo $i ?>>
                </form>

                <form method="post" action="faqFonctionTrois.php">
                <input  name="typeId2" type="hidden" value=<?php echo $i ?>  >   
                <input  name="idval2" type="submit" class="button" value= "modifier"  id=<?php echo $i ?>>
                </form>
                </div>

  <?php
}
}

?>

                  </div>
              
                </div>



                <div class="reponse" style="display: none;">
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


    }

?>


<div id="values">

  <input  type="text" name="" placeholder="value">

  <input type="button" class="button" value="Besoin d'aide ?">

<?php
  if(isset($_SESSION['type'])){
    if($_SESSION['type']=='Admin'){
?>

  <a href="faqAdmin.php" class="button" > ajouter </a> 
<?php

}
}
?>










</div>


</div>

        
<?php include("footer.php") ?>

</body>
</html>