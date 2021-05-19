<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js" async defer></script>
<script type="text/javascript" src="../javaScript/javaScriptForum.js" async defer></script>
<link rel="stylesheet" href="../css/style.css">

<div class="editable-content">
    <div class="button-content">
        <button onclick="getTextSelection('b');" class="button"><b class="icon">B</b></button>
        <button onclick="getTextSelection('i');"class="button"><i class="icon">I</i></button>
        <button onclick="getTextSelection('u');"class="button"><u class="icon">U</u></button>
        <button onclick="getTextSelection('b','left-text');"class="button"> <img class="icon" src="../images/left.png" alt="User Profile" width="16" height="16"></button>
        <button onclick="getTextSelection('b','center-text');"class="button"> <img class="icon" src="../images/center.png" alt="User Profile" width="16" height="16"></button>
        <button onclick="getTextSelection('b','right-text');"class="button"> <img class="icon" src="../images/right.png" alt="User Profile" width="16" height="16"></button>
        <button onclick="getTextSelection('b','justify-text');"class="button"> <img class="icon" src="../images/justify.png" alt="User Profile" width="16" height="16"></button>
        <button onclick="getTextSelection('b','rainbow');"class="button"> <img class="icon" src="../images/rainbow.png" alt="User Profile" width="16" height="16"></button>
    </div>
    <div class="text-content">
        <div id="editable-content" contenteditable="true" class="input-field response" style="width:100%" onclick='this.style.height = "" + Math.max(this.style.height.slice(0,-2),200) + "px";'></div>
    </div>
</div>