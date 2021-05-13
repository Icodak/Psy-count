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



function readableDate(date) {
    var time = new Date();
    var timeToString = "";
    time.setTime(Date.parse(date))
    var deltaTime = Date.now() - time.getTime();
    if (deltaTime < 86400000) { //<jour
        timeToString += "Il y a ";
        if (deltaTime < 3600000) { //<1h

            if (deltaTime < 60000) {// <1min
                timeToString += "quelque secondes";

            } else {
                timeToString += Math.floor(deltaTime / 60000) + " minutes";
            }
        } else {
            timeToString += Math.floor(deltaTime / 3600000) + " heures";
        }
        //Less than a day display in ...ago
    } else {
        //More than a day display in DD:MM
        timeToString += "le " + time.getDate() + " ";
        switch (time.getMonth()) {
            case 0:
                timeToString += "Janvier";
                break;
            case 1:
                timeToString += "Fevrier";
                break;
            case 2:
                timeToString += "Mars";
                break;
            case 3:
                timeToString += "Avril";
                break;
            case 4:
                timeToString += "Mai";
                break;
            case 5:
                timeToString += "Juin";
                break;
            case 6:
                timeToString += "Juillet";
                break;
            case 7:
                timeToString += "Aout";
                break;
            case 8:
                timeToString += "Septembre";
                break;
            case 9:
                timeToString += "Octobre";
                break;
            case 10:
                timeToString += "Novembre";
                break;
            case 11:
                timeToString += "Decembre";
                break;
        }
    }
    return timeToString;
}

function buildTopics(topicArray) {
    var topicBody = document.getElementById("forum-body");
    for (topic of JSON.parse(topicArray)) {
        topicBody.appendChild(topicObject(topic.name, "forum/topic/" + topic.ID_topic + "-" + topic.name + ".php", topic.originUserName, readableDate(topic.creationDate), topic.latestUserName, "images_utilisateurs/" + topic.latestUserProfile + ".png", readableDate(topic.latestUpdate), "#", topic.viewCount, topic.messageCount));
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


function loadMessageUsers(topic_uuid) {
    $.ajax({
        url: "../loadMessage.php",
        type: "GET",
        dataType: 'JSON',
        data: {
            topic_uuid: topic_uuid
        }
    })
        .done(function (result) {
            buildForumPage(result);
        })
        .fail(function (xhr, thrownError) {
            console.log(xhr);
            console.log(thrownError);
        })
}

function buildForumPage(messageArray) {
    var topicBody = document.getElementById("forum-messages");
    for (msg of messageArray) {
        topicBody.appendChild(messageObject("../../images_utilisateurs/" + msg.userProfile + ".png", msg.ID_utilisateur, msg.userFirstName, msg.userLastName, msg.userRank, msg.message, readableDate(msg.creationDate), msg.isModified, 0));
    }
}

function messageObject(user_profile, user_id, user_firstName, user_lastName, user_rank, message, date, isModified, isAuthor) {
    var msgContainer = document.createElement("div");
    var msgData = document.createElement("div");
    var msgUser = document.createElement("div");
    var msgAuthor = document.createElement("img");
    var msgProfile = document.createElement("img");
    var msgUserName = document.createElement("p");
    msgUserName.appendChild(document.createTextNode(user_firstName + " " + user_lastName));
    var msgUserRank = document.createElement("p");
    msgUserRank.appendChild(document.createTextNode(user_rank));
    var msgMessage = document.createElement("p");
    msgMessage.appendChild(document.createTextNode(message));
    var msgText = document.createElement("div");
    var msgMeta = document.createElement("div");
    var msgInfo = document.createElement("div");
    var msgDate = document.createElement("p");
    msgDate.appendChild(document.createTextNode(date));
    var msgIsModified = document.createElement("p");
    msgIsModified.appendChild(document.createTextNode("(Modifié)"));
    var msgTools = document.createElement("div");
    var usr_id = user_id;

    msgProfile.src = user_profile;
    msgProfile.alt = "Profil Utilisateur";

    msgAuthor.src = "../../images/author.png";
    msgAuthor.alt = "author";

    msgContainer.className = "msg-container shadow"
    msgData.className = "msg-data"
    msgUser.className = "msg-user"
    msgAuthor.className = "msg-author"
    msgProfile.className = "msg-profile"
    msgText.className = "msg-text"
    msgMeta.className = "msg-meta"
    msgInfo.className = "msg-info"
    msgIsModified.className = "msg-modified"
    msgTools.className = "msg-tools"

    if (isAuthor) {
        msgUser.appendChild(msgIsAuthor);
    }
    msgUser.appendChild(msgProfile);
    msgUser.appendChild(msgUserName);
    msgUser.appendChild(msgUserRank);
    msgData.appendChild(msgUser);
    msgText.appendChild(msgMessage);
    msgData.appendChild(msgText);
    msgInfo.appendChild(msgDate);
    if (isModified != 0) {
        msgInfo.appendChild(msgIsModified);
    }
    msgMeta.appendChild(msgInfo);
    msgMeta.appendChild(msgTools);
    msgContainer.appendChild(msgData);
    msgContainer.appendChild(msgMeta);

    return msgContainer;
}

function topicValidation(title) {
    return title.match(/([A-Za-zÀ-ÖØ-öø-ÿ0-9])\w*|\s*/gi)
        .map(el => { if (el.match(/\s/)) { return "-"; } else { return el; } })
        .reduce((mono = "", el) => mono + el);
}

function onEditTopic() {

}