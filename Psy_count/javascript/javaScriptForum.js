function loadTopics() {
    $.ajax({
        url: "forum/loadTopic.php", type: "GET"
    })
        .done(function (result) {
            buildTopics(result);
        })
        .fail(function (xhr, thrownError) {
            console.log(xhr);
            console.log(thrownError);
        })
}

function buildTopics(topicArray) {
    var topicBody = document.getElementById("forum-body");
    for (topic of JSON.parse(topicArray)) {
        topicBody.appendChild(topicObject(topic.name, "#", topic.ID_creationUser, topic.creationDate, topic.ID_latestUser, "images_utilisateurs/default-user.png", topic.latestUpdate, "#", topic.viewCount, "55"));
    }
}

function topicObject(title, o_link, o_user, o_date, m_user, m_img, m_date, m_link, view_count, response_count) {
    var topicBox = document.createElement("div");
    var topicLeft = document.createElement("div");
    var topicInfo = document.createElement("div");
    var topicTitleLink = document.createElement("a");
    var topicTitle = document.createElement("h3");
    topicTitle.appendChild(document.createTextNode(title));
    var topicOriginInfo = document.createElement("p");
    topicOriginInfo.appendChild(document.createTextNode("Par " + o_user + ", " + o_date));
    var topicStat = document.createElement("div");
    var topicViews = document.createElement("p");
    topicViews.appendChild(document.createTextNode(view_count + " Vue(s)"));
    var topicResponse = document.createElement("div");
    topicResponse.appendChild(document.createTextNode(response_count + " Réponse(s)"));
    var topicRight = document.createElement("div");
    var topicRecentImg = document.createElement("div");
    var topicImg = document.createElement("img");
    var topicRecentData = document.createElement("div");
    var topicRecentInfo = document.createElement("p");
    topicRecentInfo.appendChild(document.createTextNode(m_user));
    var topicRecentLink = document.createElement("div");
    var topicRecentDate = document.createElement("p");
    topicRecentDate.appendChild(document.createTextNode(m_date));


    topicImg.src = m_img;
    topicImg.alt = "Recent User Profile";
    topicTitleLink.href = o_link;
    topicRecentLink.href = m_link;

    topicBox.className = "topic-box shadow";
    topicLeft.className = "topic-left";
    topicInfo.className = "topic-info";
    topicTitle.className = "bold";
    topicOriginInfo.className = "topic-origin-info";
    topicStat.className = "topic-stat";
    topicViews.className = "topic-views bold";
    topicResponse.className = "topic-response";
    topicRight.className = "topic-right";
    topicRecentImg.className = "topic-recent-img";
    topicImg.className = "topic-img";
    topicRecentData.className = "topic-recent-data";
    topicRecentInfo.className = "bold";
    topicRecentLink.className = "topic-recent-link";
    topicRecentDate.className = "topic-recent-date";

    topicTitleLink.appendChild(topicTitle);
    topicInfo.appendChild(topicTitleLink);
    topicInfo.appendChild(topicOriginInfo);
    topicStat.appendChild(topicViews);
    topicStat.appendChild(topicResponse);
    topicLeft.appendChild(topicInfo);
    topicLeft.appendChild(topicStat);
    topicRecentImg.appendChild(topicImg);
    topicRecentData.appendChild(topicRecentInfo);
    topicRecentLink.appendChild(topicRecentDate);
    topicRecentData.appendChild(topicRecentLink);
    topicRight.appendChild(topicRecentImg);
    topicRight.appendChild(topicRecentData);
    topicBox.appendChild(topicLeft);
    topicBox.appendChild(topicRight);

    return topicBox;
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
                    document.location.href = "https://localhost/Psy-count/Psy_count/forum.php";
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