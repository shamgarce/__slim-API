<?php 
//unset($_GET['a']);
//--------------------------------------------------
$_GET['c'] = trim($_GET['c']);
$_GET['c'] = isset($_GET['c']) ?  $_GET['c'] : 'init.meth';
$_GET['c'] = !empty($_GET['c']) ?  $_GET['c'] :'init.meth' ;
if(in_array($_GET['c'],$curl_deny))die('ctypedeny');
if(substr_count($_GET['c'],'.')!=0){
	$_mss = explode(".",$_GET['c']);
	$_GET['c'] = trim($_mss[0]);
	$_GET['a'] = trim($_mss[1]);
	!empty($_mss[2]) && $_GET['m'] = trim($_mss[2]);
}
if(in_array($_GET['a'],$curl_denya))die('atypedeny');
//--------------------------------------------------
unset($_mss);
?>