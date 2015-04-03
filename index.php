<?php
	include('./api/conn.php');
	$short_url = $_SERVER['HTTP_HOST'].$_SERVER["REQUEST_URI"];
	echo $short_url;

    $sql	="SELECT * FROM main WHERE short_url = '$short_url'";
    $result = mysql_query($sql,$con);
    $result = mysql_fetch_array($result);
    if($result){
    	Header("HTTP/1.1 301 Moved Permanently");
		Header("Location: http://".$result['long_url']);
    }else{
    	Header("HTTP/1.1 301 Moved Permanently");
		Header("Location: http://www.ldsn.net/");
    }
   