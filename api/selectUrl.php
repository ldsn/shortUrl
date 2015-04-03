<?php
    include('./conn.php');

    $short_url = $_REQUEST['short_url'];


    $sql	="SELECT * FROM main WHERE short_url = '$short_url'";
    $result = mysql_query($sql,$con);
    $result = mysql_fetch_array($result);
    //var_dump($result);
	if (!$result)
	  {
	 	$msg = array(
			'error' => 1,
			'url'   => null,
			);
	  }else{
	  	$msg = array(
		'error' => 0,
		'url'   => $result['long_url'],
		);
	  }
    echo json_encode($msg);