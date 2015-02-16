<?php

/**--------------------------------------------------------
* //跳转
+--------------------------------------------------------*/
function R($url, $time=0, $msg='') {
    $url = str_replace(array("\n", "\r"), '', $url);
    empty($msg) && $msg = "系统将在{$time}秒之后自动跳转到{$url}！";
    if (!headers_sent()) {
        // redirect
        if (0 === $time) {
            header('Location: ' . $url);
        } else {
            header("refresh:{$time};url={$url}");
            echo($msg);
        }
        exit();
    } else {
        $str = "<meta http-equiv='Refresh' content='{$time};URL={$url}'>";
        if ($time != 0)
            $str .= $msg;
        exit($str);
    }
}	

/**--------------------------------------------------------
* //判断字符串是否存在
+--------------------------------------------------------*/
function StrExists($haystack, $needle) {
	return !(strpos($haystack, $needle) === FALSE);
}

/**--------------------------------------------------------
* // 内容截取
+----------------------------------------------------------
* 参数
+--------------------------------------------------------*/
function Cut($startstr=" ",$endstr=" ",$str){
	if(empty($startstr) || empty($startstr)) throw new Exception("Function 'cut' need str");
	$outstr="";
	if(!empty($str) && strpos($str,$startstr)!==false && strpos($str,$endstr)!==false){
		$startpos	= strpos($str,$startstr);
		$str		= substr($str,($startpos+strlen($startstr)),strlen($str));
		$endpos		= strpos($str,$endstr);
		$outstr		= substr($str,0,$endpos);
	}
	return $outstr;
}

/**--------------------------------------------------------
* // 读取文件
+----------------------------------------------------------
* 参数:filename 路径文件名
+--------------------------------------------------------*/
function Fr($fileName){
	if( is_file( $fileName ) )		return file_get_contents( $fileName );
}

/**--------------------------------------------------------
* // 保存文件
+----------------------------------------------------------
* 参数:filename 路径文件名 / text:内容
+--------------------------------------------------------*/
function Fs($fileName, $text) {    
	if( ! $fileName ) return false; 
	if( $fp = @fopen( $fileName, "wb" ) ) {
		if( @fwrite( $fp, $text ) ) {
			fclose($fp);
			return true;
		}else {
			fclose($fp);
			return false;
		}
	}
	return false;
}

/*
+----------------------------------------------------------
* getarr - getstr 数组转化为数组
+----------------------------------------------------------
* 参数:$arr 需要转化的数组 $flit 是否排重 $bl 分割字符
+----------------------------------------------------------
*/
function Getstr($arr,$flit='0',$bl = "\r\n"){
	if(empty($arr)) return '';
	$flit && $arr = array_unique($arr);
	foreach($arr as $key=>$value){
		!empty($value) && $arr_[] = trim($value);
	}
	!empty($arr_) && $str = implode($bl,$arr_);
	return $str;
}

/*---------------------------------------------------------
* getarr - getstr 字符转化为数组
+----------------------------------------------------------
* 参数:$str 需要转化的字符串 $flit 是否排重 $bl 分割字符
+--------------------------------------------------------*/
function Getarr($str,$flit='0',$bl = "\n"){
	if(empty($str)) return array();
	$arr_ = explode($bl,$str);
	$flit && $arr_ = array_unique($arr_);
	$arr = array();
	foreach($arr_ as $key=>$value){
		!empty($value) && $arr[] = trim($value);
	}
	return $arr;
}

/*---------------------------------------------------------
* 数组反序列化
+----------------------------------------------------------
* 参数:
+--------------------------------------------------------*/
function U($ArrStr){
	return !empty($ArrStr)?unserialize($ArrStr):array();
}
	
/*---------------------------------------------------------
* 获得时间戳
+----------------------------------------------------------
* 参数:无
+--------------------------------------------------------*/
function T(){
    list($usec, $sec) = explode(" ",microtime()); 
	return ((float)$usec + (float)$sec);
}


