<?php
defined('IS') or exit();
$dir 			= APP.$_W['c'].'/';
$funcFile 	= APP.$_W['c']."/Config.inc.php"; 	//方法 
	!is_dir($dir) && mkdir($dir);
	//=======================================================
	if(!file_exists($funcFile)){
	//	文件是否存在,不存在,.创建
		$txt  = "<?php
defined('IS') or exit();
//前置执行 -> __IniRun

//include \"{$_W['c']}.CommonAction.php\";
//include \"{$_W['c']}.class.php\";
?>";
		Fs($funcFile,$txt);
	}
