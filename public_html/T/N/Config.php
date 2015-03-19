<?php
//支持函数


function memory_usage()
{
	$memory	 = ( ! function_exists('memory_get_usage')) ? '0' : round(memory_get_usage()/1024/1024, 2).'MB';
	return $memory;
}

// 计时
function microtime_float()
{
	$mtime = microtime();
	$mtime = explode(' ', $mtime);
	return $mtime[1] + $mtime[0];
}



//检测PHP设置参数

function show($varName)
{
	switch($result = get_cfg_var($varName))
	{
		case 0:
			return '<font color="red">×</font>';
			break;
		case 1:
			return '<font color="green">√</font>';
			break;
		default:
			return $result;
			break;
	}
}

// 检测函数支持
function isfun($funName = '')
{
	if (!$funName || trim($funName) == '' || preg_match('~[^a-z0-9\_]+~i', $funName, $tmp)) return '错误';
	return (false !== function_exists($funName)) ? '<font color="green">√</font>' : '<font color="red">×</font>';
}

function isfun1($funName = '')
{
	if (!$funName || trim($funName) == '' || preg_match('~[^a-z0-9\_]+~i', $funName, $tmp)) return '错误';
	return (false !== function_exists($funName)) ? '√' : '×';
}




