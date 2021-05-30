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
});