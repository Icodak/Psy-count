<?php

$topic_uuid = $_POST['topic_uuid'];
$topic_title = $_POST['topic_title'];
$topic_author = $_POST['topic_author'];
$topic_message = $_POST['topic_message'];

$file = "topic/" . $topic_uuid . ".php";

$content = "<?php\n " .$_POST['topic_uuid'] ."\n?>";

file_put_contents($file, $content, FILE_APPEND | LOCK_EX);
?>