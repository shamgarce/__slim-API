<?php
defined('IS') or exit();
DEBUG_TRACER && $_W['_Files'][] 		= __FILE__;

	function arrays($string) {
		$string = (array)$string;
		foreach ($string as $key => $val) {
			$string_[$key] = (array)$val;// arrays_sub($val);
		}
		return $string_;
	}
	
	function carr($arr){
		foreach($arr as $key=>$value){
			$row = $value;
			foreach($row as $key2=>$value2){
				$row_[iconv('GB2312', 'UTF-8', $key2)] = iconv('GB2312', 'UTF-8', $value2);
			}
			$arr_[$key] = $row_;
		}
		return $arr_;
	}
	
	/**
	 * 系统函数gzdecode
	 *
	 * @param unknown_type $data
	 * @return unknown
	 */
	if (!function_exists('gzdecode')) {
		function gzdecode ($data) {
			$flags = ord(substr($data, 3, 1));
			$headerlen = 10;
			$extralen = 0;
			$filenamelen = 0;
			if ($flags & 4) {
				$extralen = unpack('v' ,substr($data, 10, 2));
				$extralen = $extralen[1];
				$headerlen += 2 + $extralen;
			}
			if ($flags & 8) // Filename
				$headerlen = strpos($data, chr(0), $headerlen) + 1;
			if ($flags & 16) // Comment
				$headerlen = strpos($data, chr(0), $headerlen) + 1;
			if ($flags & 2) // CRC at end of file
				$headerlen += 2;
				$unpacked = @gzinflate(substr($data, $headerlen));
			if ($unpacked === FALSE)
				$unpacked = $data;
			return $unpacked;
		}
	}
	
	/**
	+----------------------------------------------------------
	* 实例化获取文件扩展名 空为nn
	+----------------------------------------------------------
	*/
	function getextname($url){
		$ext =  pathinfo($url, PATHINFO_EXTENSION);
		$ext =  !empty($ext)?$ext:'nn';
		return $ext;
	}	

	/**
	 * 监测email
	 *
	 * @param unknown_type $C_weburl
	 * @return unknown
	 */
	function CheckWebAddr($C_weburl){
		if (!ereg("^http://[_a-zA-Z0-9-]+(.[_a-zA-Z0-9-]+)*$", $C_weburl)){
			return false;
		}
		return true;
	}

	
	
	
 /**
 * 加密，解密函数
 * @param string $string 将要加密码的字符中
 * @param string $operation ENCODE(加密) | DECODE(解密)
	*/
	function authCode($string, $operation = 'ENCODE'){
		$key = "*!mV-=";
		$key = md5($key ? $key : $_W['auth_key']);
		$key_length = strlen($key);
		$string = $operation == 'DECODE' ? base64_decode($string) : substr(md5($string.$key), 0, 8).$string;
		$string_length = strlen($string);
		$rndkey = $box = array();
		$result = '';
		for($i = 0; $i <= 255; $i++){
			$rndkey[$i] = ord($key[$i % $key_length]);
			$box[$i] = $i;
		}
		
		for($j = $i = 0; $i < 256; $i++){
			$j = ($j + $box[$i] + $rndkey[$i]) % 256;
			$tmp = $box[$i];
			$box[$i] = $box[$j];
			$box[$j] = $tmp;
		}
		
		for($a = $j = $i = 0; $i < $string_length; $i++){
			$a = ($a + 1) % 256;
			$j = ($j + $box[$a]) % 256;
			$tmp = $box[$a];
			$box[$a] = $box[$j];
			$box[$j] = $tmp;
			$result .= chr(ord($string[$i]) ^ ($box[($box[$a] + $box[$j]) % 256]));
		}
		
		if($operation == 'DECODE'){
			if(substr($result, 0, 8) == substr(md5(substr($result, 8).$key), 0, 8))
			return substr($result, 8);
			else
			return '';
		}
		else 
		return str_replace('=', '', base64_encode($result));
	}
		
	function gethash(){
		$hashnew = md5(time().rand());
		return $hashnew;
	}
	
	function jsonout($res){
		echo json_encode($res);
		exit;
	}	
	