$(document).ready(function () {
    $(".form").hide();
    $("#openMessage").prop('disabled', false);
    $("#openMessage2").prop('disabled', true);
    $('#sendBox').hide();

    $("#closeContactForm").click(function () {
        if ($("#closeContactForm").attr("disabled", false)) {
            if (confirm("Voulez-vous abandonner le nouveau message ?")) {
                $("#form").hide();
                $("#form")[0].reset();
            } else {
                $("#closeContactForm").attr("disabled", true); //Empeche le reset du form
            }
        }
    });

    $("input").on('focus', function () {
        $("#closeContactForm").attr("disabled", false);
    });

    $("#openContactForm").click(function () {
        $("#form").show();
        $("#openMessage").hide();
        $("#openMessage2").hide();
    });

    $("#openReceptBox").click(function () {
        $('#sendBox').hide();
        $("#receptBox").show();

        $("#openMessage2").hide();
        $("#openMessage").prop('disabled', false);
        $("#openMessage2").prop('disabled', true);
    });

    $("#openSendBox").click(function () {
        $("#sendBox").show();
        $("#receptBox").hide();

        $("#openMessage").hide();
        $("#openMessage").prop('disabled', true);
        $("#openMessage2").prop('disabled', false);
    });

    $("a[class='eraseMsg']").click(function () {
        $confirm = 'Etes-vous sûr de vouloir supprimer ce message ? Il sera également supprimé pour votre correspondant.';
        return confirm($confirm);
    });


    $("a[class='clickMsg']").click(function (event) {
        var confirm = true;
        if ($("#form").is(":visible") && !confirm("Voulez-vous arrêter d'écrire votre message ?")) {
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
            .done(function (result) {
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
            })
            .fail(function (err, thrownError) {
                console.log(err);
                console.log(thrownError);
            })
    });

    $("button[id='closeMessage']").click(function (event) {
        $("#openMessage").hide();
    });

    $("button[id='closeMessage2']").click(function (event) {
        $("#openMessage2").hide();
    });
});