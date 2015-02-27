<?php
session_start();
/*
Quick and dirty api calling using GET
Not RESTFUL
*/

if(isset($_GET['call'])) {

	//Fetch latest game id
	if($_GET['call'] == "fetch_latest_game") {
		echo "1"; //suppposed to fetch games from db
	}

	//fetch videos of a game id
	else if($_GET['call'] == "fetch_pregame_videos") {
		$dir = "uploads/videos/1/"; //fit to current game id
		$files = array_slice(scandir($dir),2);
		echo json_encode($files);
	}



} else if(isset($_POST['session'])) {
	
	if($_POST['call'] == 'fetch_new_video') {
		$dir = "uploads/videos/1/"; //fit to current game id
		$files = array_slice(scandir($dir),2);

		$key = $_POST['session'];

		if(isset($_SESSION[$key])) {
			//key exists
			$found = 0;
			foreach ($files as &$file) {
			   if (!in_array($file, $_SESSION[$key])) {
				    array_push($_SESSION[$key], $file);
				    echo "http://".$_SERVER['HTTP_HOST']."/uploads/videos/1/".$file;
				    $found = 1;
				    break;
				} 
			}
			if($found == 0) {
				echo "nomore";
			}
		} else {
			//fresh array
			$array = array();
			array_push($array, $files[0]); // put first element
			$_SESSION[$key] = $array;
			echo "http://".$_SERVER['HTTP_HOST']."/uploads/videos/1/".$files[0];
		}
	}
} else {
	echo "Invalid";
}
?>