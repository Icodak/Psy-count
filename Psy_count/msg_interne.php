<!doctype html>
<html lang="fr">

<head>
    <meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Messagerie interne</title>
    <link rel="icon" type="image/png" href="images/psy-fi.png" />
    <link rel="stylesheet" href="css//style.css">
    <link rel="stylesheet" href="css//style_Refonte.css">
    <meta name="description" content="page de messagerie interne de psy-fi">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
</head>

<header>
    <div>
        <?php include("menuBar.php") ?>
        <h2 class="headerText"> Messages</h2>
    </div>
</header>

<script type="text/javascript">
    $(document).ready(function() {
        //id='openMessage" . $i . "' onclick='pop_up(this);'  href='msg_interneBox.php?read_msg=" . $youvegotmail[$j][5 * $i] . "
        $(".form").hide(); //Check pk je peux pas juste hide flex_column
        $("img[alt='logo de psy-fi']").hide(); //Avec l'image ça rend pas ouf
        $('#sendBox').hide();
        $("#openMessage").prop('disabled', false);
        $("#openMessage2").prop('disabled', true);

        $("#closeContactForm").click(function() {
            $("#form").hide();
            //$("img").hide();
            //$('#sendBox').hide();
            //$("#receptBox").show();
        });
        $("#openContactForm").click(function() {
            $("#form").show();
            $("#openMessage").hide();
            $("#openMessage2").hide();
            //$("img").show();
            //$("#receptBox").hide();
        });

        $("#openReceptBox").click(function() {
            $('#sendBox').hide();
            $("#receptBox").show();
            $("#openMessage2").hide();
            $("#openMessage").prop('disabled', false);
            $("#openMessage2").prop('disabled', true);
        });

        $("#openSendBox").click(function() {
            $("#sendBox").show();
            $("#receptBox").hide();
            $("#openMessage").hide();
            $("#openMessage").prop('disabled', true);
            $("#openMessage2").prop('disabled', false);
        });

        $("a").click(function(event) {
            var confirm = true;
            if ($("#form").is(":visible")) {
                confirm = confirm("Voulez-vous arrêter d'écrire votre message ?");
                alert(confirm);
            }
            id_msg = event.target.name;
            $.ajax({
                    url: "msg_interneFonction2.php",
                    type: "POST",
                    data: {
                        id_msg: id_msg
                    }
                })
                .done(function(result) {
                    if (confirm) {
                        if (!$('#openMessage').prop('disabled')) {
                            $("#msg_content").html(result);
                            $("#openMessage").show();
                        }
                        if (!$('#openMessage2').prop('disabled')) {
                            $("#msg_content2").html(result);
                            $("#openMessage2").show();
                        }
                    }
                    //jQuery(this).prev("button").attr("closeMessage",id_msg);
                })
                .fail(function(err, thrownError) {
                    console.log(err);
                    console.log(thrownError);
                })
            //async = false

            //$("#openMessage" + event.target.id).show();
        });

        $("button[id='closeMessage']").click(function(event) {
            $("#openMessage").hide();
        });

        $("button[id='closeMessage2']").click(function(event) {
            $("#openMessage2").hide();
        });

        function demo() {
            alert("text");
        }
    });

    /*function pop_up(this) {
        this.id
    }*/

    /*//Mauvaise idée tant pis
    function pop_up(url) {
        window.open(url, 'win2', 'status=no,toolbar=no,scrollbars=yes,titlebar=no,menubar=no,resizable=yes,width=1076,height=768,directories=no,location=no')
    }*/
</script>

<body>
    <?php //Fonction Récup Mail du Médecin traitant 
    try {
        $dbMsgInt = new PDO("mysql:host=localhost;dbname=serveur_psy_fi", 'root', '');
        $dbMsgInt->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $recipient_from_users = $dbMsgInt->query('SELECT ID_Utilisateur, nom, prenom, Email FROM utilisateur ORDER BY nom');

        if (isset($_POST['submit'])) {
            if (isset($_POST['msg_destinataire'], $_POST['msg_Cct']) && !empty($_POST['msg_destinataire']) && !empty($_POST['msg_Cct'])) {
                $msg_destinataire = htmlspecialchars($_POST['msg_destinataire']);
                $sujet = htmlspecialchars($_POST['msgSubject_Cct']);
                $message = htmlspecialchars($_POST['msg_Cct']);
                //echo $msg_destinataire . "\n"; //Destinataire

                $msg_envoyeur = $dbMsgInt->prepare(
                    'SELECT Email 
                    FROM utilisateur
                    WHERE ID_Utilisateur =?'
                );
                $msg_envoyeur->execute(array($_SESSION['ID']));
                $msg_envoyeur = $msg_envoyeur->fetch();
                //echo $msg_envoyeur[0] . "\n"; //Envoyeur

                $add_msg =
                    "INSERT INTO msg_interne (ID_Message, ID_Expediteur, ID_Destinataire, msg_date, msg_subject, msg_content)
                    VALUES ('', '$msg_envoyeur[0]', '$msg_destinataire', NOW(), '$sujet', '$message')" //Mettre des '' else it doesn't work/recognizes strings
                ;
                $dbMsgInt->exec($add_msg);
                //echo "Message bien envoyé.";
            }
        } else {
            $warning = "Veuillez compléter tous les champs.";
        }
    } catch (Exception $e) {
        echo "Erreur :", $e->getMessage(), "\n";
    }

    ?>

    <section>
        <div class="background"></div>
        <?php //Tenter de mettre des conditions sur la Form
        /*if (isset($warning)) {
        echo "<div class='warning'>" . $warning . "</div>";
    }
    */ ?>

        <div class="flex-column">
            <nav class="niceBox">
                <button id="openContactForm" class="form_button"> Nouveau message </button>
                <button id="openReceptBox" class="form_button"> Boite de réception </button>
                <button id="openSendBox" class="form_button"> Boite d'envoi </button>
            </nav>

            <!-- Boîte de réception -->
            <div class="flex-colW">
                <div id="receptBox" class="niceBox">
                    <table>
                        <?php
                        include('msg_interneFonction.php');
                        $youvegotmail = getRecep($dbMsgInt);

                        /*function openMail($youvegotmail, $isSend)
                        {
                            $confirm = 'Etes-vous sûr de vouloir supprimer ce message ? Il sera également supprimé pour votre correspondant.';
                            for ($j = 0; $j < count($youvegotmail); $j += 1) {
                                for ($i = 1; $i <= count($youvegotmail[0]) - 6; $i += 6) {
                                    echo "<tr><td>";
                                    if ($isSend == 0) {
                                        $rec = "Message de : " . $youvegotmail[$j][$i];
                                    } else {
                                        $rec = "Message à : " . $youvegotmail[$j][$i * 2];
                                    }

                                    echo "<div class='niceMsg'><a id='" . $j . $isSend . "' name='" . $youvegotmail[$j][$i - 1] . "'>" . $rec . " Sujet : " . $youvegotmail[$j][4 * $i] . " Le : " . $youvegotmail[$j][3 * $i] . "</a></div>";
                                    echo "<div><a class='eraseMsg' href='msg_interne.php?msg=" . $youvegotmail[$j][$i - 1] . "' onclick=\"demo();\"><img src='images/erase.png' alt='eraseMsg' class='eraseMsg'></a></div>";
                                    //echo "<input class='eraseMsg' type='button' onclick='demo();' src='images/erase.png'>";
                                    /*echo "<div id='openMessage" . $j . $isSend . "' class='form2'><span>" . $youvegotmail[$j][5 * $i] . "</span>
                                <button id='" . $j . $isSend . "' class='form_button' name='X'> X </button>
                                </div>";//
                                    echo "</td></tr>";
                                    //$openMsg = [$j, $i, $isSend, $youvegotmail];
                                }
                            }
                            //return $openMsg;
                            //print_r($openMsg);
                        }*/

                        if (empty($youvegotmail)) {
                            echo "Vous avez 0 nouveau message.";
                        } else {
                            //$openMsg = openMail($youvegotmail, 0);
                            if (isset($_GET['msg'])) {
                                delete($dbMsgInt, htmlspecialchars($_GET['msg']));
                            }

                        ?>
                    </table>
                </div>
            <?php
                            //    openMsg($openMsg[0], $openMsg[1], $openMsg[2], $openMsg[3]);
                            echo "<div id='openMessage' class='form'><span id='msg_content'></span><button id='closeMessage' class='form_button' name='X'> X </button></div>";
                        }
            ?>

            <!-- Boîte d'envoi -->
            <div id="sendBox" class="niceBox">
                <table>
                    <?php
                    $youvesentmail = getSend($dbMsgInt);

                    if (empty($youvesentmail)) {
                        echo "Vous avez envoyé 0 nouveau message.";
                    } else {

                        //openMail($youvesentmail, 1);


                    ?>
                </table>
            </div>
        <?php
                        //   openMsg($openMsg[0], $openMsg[1], $openMsg[2], $openMsg[3]);
                        //}
                        //echo "<div id='openMessage2' class='form'></div>";
                        //echo "<button id='closeMessage2' class='form_button' name='X'> X </button>";
                        echo "<div id='openMessage2' class='form'><span id='msg_content2'></span><button id='closeMessage2' class='form_button' name='X'> X </button></div>";
                    }
        ?>

        <!-- Formulaire de contact / création de message -->
        <div id="form" class="form">
            <form action="msg_interne.php" method="POST" autocomplete="off">

                <div class="form_group"> <label class="form_label" for="text"> Je souhaite contacter : </label>
                    <select class="form_content" name="msg_destinataire">
                        <optgroup>
                            <?php while ($d = $recipient_from_users->fetch()) { ?>
                                <option><?=
                                        //$d['nom'] . " " . $d['prenom'] //?= == php echo
                                        $d['Email']
                                        ?></option>
                            <?php } ?>
                        </optgroup>
                    </select>
                </div>

                <div class="form_group"> <label class="form_label" for="text"> Sujet du message </label>
                    <input class="form_content" type="text" name="msgSubject_Cct" placeholder="ex : Contact avec l'administrateur PSY-fi..."> </label>
                </div>

                <div class="form_group">
                    <label class="form_label" for="text"> Message </label>
                    <textarea class="form_content" name="msg_Cct" placeholder="Veuillez écrire votre message..."></textarea>
                </div>

                <div class="form_group">
                    <button class="form_button" type="submit" name="submit"> Envoyer </button>
                    <button id="closeContactForm" class="form_button" type="reset"> Annuler </button>
                    <!--onclick="return confirm('bruh');"-->
                </div>
            </form>

        </div>
            </div>
            
            <img alt="logo de psy-fi" src="images/psy-fi.png">
        </div>

    </section>
    <?php include("footer.php") ?>
</body>


</html>