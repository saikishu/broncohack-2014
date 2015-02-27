<?php

$video_name = "video-".date("Y-m-d-i-s",time()).".mov";

$gameId = trim(file_get_contents('http://'.$_SERVER['HTTP_HOST'].'/api.php?call=fetch_latest_game'));

$dir = "/broncohack/server/uploads/videos/".$gameId."/";

if (!file_exists($dir)) {
    mkdir($dir, 0777, true);
}

move_uploaded_file($_FILES["file"]["tmp_name"], $dir.$video_name);
?>
