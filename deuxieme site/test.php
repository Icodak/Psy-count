<?php
session_start(); 
?>
<?php
  if($_SESSION['type']=='Admin'){

?>

<a href=""> <button> ajouter un utilisateur </button> </a>
<a href=""> <button> supprimer un utilisateur </button> </a>
<a href=""> <button> bannir un utilisateur </button> </a>
<a href=""> <button> modifier le compte d'un utilisateur </button> </a>

<?php
}else{
	$Password=password_hash('motdepasse', PASSWORD_DEFAULT);


	$dbco = new PDO("mysql:host=localhost;dbname=serveur_psy_fi",'root','');
                $dbco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = "INSERT INTO utilisateur(motDePasse,nom,prenom,Email,permission_lvl)
                        VALUES('$Password','lpidf','Nicolas','randomemail@gmail.com','Admin')"; 
    $dbco->exec($sql);

    $sql = "INSERT INTO administrateur(ID_Utilisateur)
                        VALUES((SELECT ID_Utilisateur from utilisateur where Email='randomemail@gmail.com'))"; 
    $dbco->exec($sql);
}
?>


