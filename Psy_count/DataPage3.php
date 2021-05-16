<!doctype html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <title>Mon profil</title>
    <link rel="icon" type="image/png" href="images/psy-fi.png" />
    <link rel="stylesheet" href="css//style_myData_2.css">
    <script type="text/javascript" src="javascript//javaScriptCode.js"></script>
</head>

<body>
    <header>
        <?php 
              include("menuBar.php") ;
        ?>
    </header>


    <div class="wrapper2">
        <div class="main">
           <form method="post" action="myDataFonction.php">
                <div class="frame-header shadow2">
                    <div>
                        <h1>
                            Modifier mon mot de passe
                        </h1>
                    </div>
                </div>
                <div class="topic-main shadow2">
                    <div class="topic-list">

                        <div class="topic-items">

                            <div class=" change-password topic-right">

                                <h3>Votre mot de passe : </h3>
                            </div>
                            <div class="topic-meta topic-right2">

                                <input type="text" class="crayon1" required name='mdp'>
                            </div>
                        </div>
                        <div class="topic-items">
                            <div class=" change-password topic-right">
                                <h3> Nouveau mot de passe : </h3>
                            </div>
                            <div class="topic-meta topic-right2">
                                <input type="text" class="crayon2" required name='newmdp'>
                            </div>
                        </div>
                        <div class="topic-items">
                            <div class=" change-password topic-right">
                                <h3>Vérification du nouveau mot de passse : </h3>
                            </div>
                            <div class="topic-meta topic-right2">
                                <input type="text" class="crayon3" required name='newmdpverif'>
                            </div>
                        </div>
                    </div>

                    <div class="error-message">
                    <?php if(!empty($_SESSION['messageData'])){echo $_SESSION['messageData'];}?>
                    </div>

                    <div class="data-button">
                        <div>
                            <input type="submit" name="dataPageChange2" value="Enregistrer" class="button">
                        </div>
                        <div>
                            <?php                  
                              if($_SESSION['type']=="patient"){
                            echo"<a href='DataPage2.php' class='button'>";
                              }else if($_SESSION['type']=="Medecin"){
                             echo"<a href='myDataDoctor.php' class='button'>";      
                              }                
                            echo"Annuler";
                            echo"</a>";                    
                            ?>
                        </div>

                    </div>
                </div>
        </div>
        </form>
    </div>
    </div>
    </div>
    </div>
    <?php include("footer.php") ?>
</body>