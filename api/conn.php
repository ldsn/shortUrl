<?php
    $con = mysql_connect('localhost','root','root');
    if(!$con){
    	echo "faild connect";
    }
    mysql_select_db('ldsn_dwz',$con);
	
	mysql_query("setnames utf-8");
