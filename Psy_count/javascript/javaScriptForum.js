function buildTopic() {

}

function topicObject(title, link, o_user, o_date, m_user, m_img, m_date, m_link) {
    var topicBox = document.createElement("div");
    var topicLeft = document.createElement("div");
    var topicOriginData = document.createElement("div");
    var topicTitleLink = document.createElement("a");
    var topicTitle = document.createElement("h3");
    var topicOriginUserName = document.createElement("p");
    var topicOriginDate = document.createElement("p");
    var topicRight = document.createElement("div");
    var topicLatestData = document.createElement("div");
    var topicLatestUserProfile = document.createElement("img");
    var topicLatestUserName = document.createElement("h4");
    var topicLatestDate = document.createElement("p");
    var topicLatestLink = document.createElement("a");

    topicBox.className = "topicBox";
    topicLeft.className = "topicLeft";
    topicOriginData.className = "topicOriginData";
    topicTitleLink.className = "transparent-link";
    topicRight.className = "topicRight";
    topicLatestUserProfile.className = "topicLatestUserProfile";
    topicLatestLink.className = "transparent-link";
}

function addTopic() {
    var topicTitle = document.getElementById("topicTitle");
    var topicMessage = document.getElementById("topicMessage");
    var topicInput = document.getElementsByClassName("input-container");
    var isValid = true;

    for (el of topicInput) {
        console.log(el.getElementsByClassName("input-field")[0].value);
        if (!el.getElementsByClassName("input-field")[0].value) {
            el.getElementsByClassName("must-fill")[0].style.display = "block";
            isValid = false;
        }
        else {
            el.getElementsByClassName("must-fill")[0].style.display = "none";
        }
    }

    if (isValid) {
        $.ajax({
            url: "createNewTopic.php", type: "POST",
            dataType: 'JSON',
            data: {
                topic_name: topicValidation(topicTitle.value),
                msg: topicMessage.value
            }
        })
            .done(function (result) {
                if (result) {
                    document.location.href = "https://localhost/Psy-count/Psy_count/forum2.php";
                } else {
                    document.location.href = "https://localhost/Psy-count/Psy_count/accueil.php";
                }
            })
            .fail(function (xhr, thrownError) {
                console.log(xhr);
                console.log(thrownError);
            })
    }


}

function topicValidation(title) {
    return title.match(/([A-Za-zÀ-ÖØ-öø-ÿ0-9])\w*|\s*/gi)
        .map(el => { if (el.match(/\s/)) { return "-"; } else { return el; } })
        .reduce((mono = "", el) => mono + el);
}