<?php
session_start();
?>
<div class="response-container shadow">
    <div class="response-field" id="response-field">
        <img class="small-img" src="../../images_utilisateurs/<?php echo $_SESSION['image'] ?>" alt="User Profile">
        <div class="post-field">
            <div class="button-field">
                <button onclick="document.execCommand('bold',false,null);"><b>B</b></button>
                <button onclick="document.execCommand('italic',false,null);"><i>I</i></button>
                <button onclick="document.execCommand('underline',false,null);"><u>U</u></button>
            </div>
            <div class="write-field">
                <div id="topicResponse" contenteditable="true" class="input-field response" name="message" placeholder="Poster une réponse" onclick='this.style.height = "" + Math.max(this.style.height.slice(0,-2),200) + "px"; getElementById("response-submit").style.display = "flex";'></div>
            </div>
        </div>
    </div>
    <p id="must_fill" class="must-fill-response">* ce champ doit être rempli</p>
    <div class="response-submit" id="response-submit"><button onclick="postResponse(getElementById('response-field'),<?php echo $_SESSION['ID'] ?>,document.head.querySelector('meta[topicid]').attributes[0].value)" class="button">Envoyer</button></div>
</div>