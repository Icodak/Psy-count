<?php
$dbMsgInt = new PDO("mysql:host=localhost;dbname=serveur_psy_fi", 'root', '');
$dbMsgInt->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

if (isset($_POST['id_msg'])){
    $id_msg = htmlspecialchars($_POST['id_msg']);
    $result = $dbMsgInt->prepare(
        'SELECT msg_content
                FROM msg_interne
                WHERE ID_Message = ?'
    );
    $result->execute(array($id_msg));
    $result = $result->fetchAll();
    echo $result[0][0]; //Message content
    
    return;
}
return;
?>
