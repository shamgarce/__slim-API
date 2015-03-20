<?php
//支持函数
@header("content-Type: text/html; charset=utf-8"); //语言强制

if ($_GET['act'] == "phpinfo")
{
	phpinfo();
	exit;
}

if ($_GET['act'] == "disable_functions")
{

	$disFuns=get_cfg_var("disable_functions");
	if(empty($disFuns))
	{
		$arr = '<font color=red>×</font>';
	}
	else
	{
		$arr = $disFuns;
	}
	Function php()
	{
	}
	echo "<pre>";
	Echo "这里显示系统被禁用的函数\n";
	print_r($arr);
	echo "</pre>";
	exit();
}

