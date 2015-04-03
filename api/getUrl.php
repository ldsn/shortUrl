<?php
    include('./conn.php');
    
    $long_url   = $_REQUEST['long_url'];
    @$diy_url   = $_REQUEST['diy_url'];
    //检查长网址是否存在
    $sql0 		= "SELECT * FROM main WHERE long_url = '$long_url'";
    $result0 	= mysql_fetch_array(mysql_query($sql0,$con));
    print_r($result0);
    if($result0){
    	$msg = array(
    		'error' => 3,
    		'msg'   => '该网址已缩短过',
    		);
    	echo json_encode($msg);
    	exit;
    }
	$dshort_url = substr(md5($long_url),0,6);
    $short_url  = $diy_url?$diy_url:$dshort_url;
    $short_url  = 'www.ldsn.net/'.$short_url;

	$sql="INSERT INTO main (long_url, short_url)
	VALUES
	('$long_url','$short_url')";

	if (!mysql_query($sql,$con))
	  {
	 	$msg = array(
			'error' => 1,
			'url'   => null,
			);
	  }else{
	  	$msg = array(
		'error' => 0,
		'url'   => $short_url,
		);
	  }
     echo json_encode($msg);