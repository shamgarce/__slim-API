<?php
//支持函数
@header("content-Type: text/html; charset=utf-8"); //语言强制

//ajax调用实时刷新
if ($_GET['act'] == "rt")
{
	$arr=array('useSpace'=>"$du",'freeSpace'=>"$df",'hdPercent'=>"$hdPercent",'barhdPercent'=>"$hdPercent%",'TotalMemory'=>"$mt",'UsedMemory'=>"$mu",'FreeMemory'=>"$mf",'CachedMemory'=>"$mc",'Buffers'=>"$mb",'TotalSwap'=>"$st",'swapUsed'=>"$su",'swapFree'=>"$sf",'loadAvg'=>"$load",'uptime'=>"$uptime",'freetime'=>"$freetime",'bjtime'=>"$bjtime",'stime'=>"$stime",'memRealPercent'=>"$memRealPercent",'memRealUsed'=>"$memRealUsed",'memRealFree'=>"$memRealFree",'memPercent'=>"$memPercent%",'memCachedPercent'=>"$memCachedPercent",'barmemCachedPercent'=>"$memCachedPercent%",'swapPercent'=>"$swapPercent",'barmemRealPercent'=>"$memRealPercent%",'barswapPercent'=>"$swapPercent%",'NetOut2'=>"$NetOut[2]",'NetOut3'=>"$NetOut[3]",'NetOut4'=>"$NetOut[4]",'NetOut5'=>"$NetOut[5]",'NetOut6'=>"$NetOut[6]",'NetOut7'=>"$NetOut[7]",'NetOut8'=>"$NetOut[8]",'NetOut9'=>"$NetOut[9]",'NetOut10'=>"$NetOut[10]",'NetInput2'=>"$NetInput[2]",'NetInput3'=>"$NetInput[3]",'NetInput4'=>"$NetInput[4]",'NetInput5'=>"$NetInput[5]",'NetInput6'=>"$NetInput[6]",'NetInput7'=>"$NetInput[7]",'NetInput8'=>"$NetInput[8]",'NetInput9'=>"$NetInput[9]",'NetInput10'=>"$NetInput[10]",'NetOutSpeed2'=>"$NetOutSpeed[2]",'NetOutSpeed3'=>"$NetOutSpeed[3]",'NetOutSpeed4'=>"$NetOutSpeed[4]",'NetOutSpeed5'=>"$NetOutSpeed[5]",'NetInputSpeed2'=>"$NetInputSpeed[2]",'NetInputSpeed3'=>"$NetInputSpeed[3]",'NetInputSpeed4'=>"$NetInputSpeed[4]",'NetInputSpeed5'=>"$NetInputSpeed[5]");



	$jarr=json_encode($arr);
	$_GET['callback'] = htmlspecialchars($_GET['callback']);
	echo $_GET['callback'],'(',$jarr,')';
	exit;
}


if ($_GET['act'] == "phpinfo")
{
	phpinfo();
	exit;
}

if ($_GET['act'] == "Function")
{

	$arr = get_defined_functions();
	Function php()
	{
	}
	echo "<pre>";
	Echo "这里显示系统所支持的所有函数,和自定义函数\n";
	print_r($arr);
	echo "</pre>";
	exit();
	//phpinfo();
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

