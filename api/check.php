<?php
	include('./conn.php');
	@$long_url = $_REQUEST['long_url'];
	if(!$long_url){
		return false;
	}
	$sql	   = "SELECT * FROM main WHERE long_url = '$long_url'";
    $result    = mysql_fetch_array(mysql_query($sql,$con));
    //print_r($result);
    if ($result){
	 	$msg = array(
			'error' => 1,
			'msg'   => '该网址已缩短过',
			);
	 	echo json_encode($msg);
	  }