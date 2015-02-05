<?php
/*
基类保留基础函数 用于被继承
*/
class B {
	//======================================================
	//支持函数
	//-----------------------------------------------
	//根据url获取扩展名
	public function getextname($url){
		$ext =  pathinfo($url, PATHINFO_EXTENSION);
		$ext =  !empty($ext)?$ext:'nn';
		return $ext;
	}
	
	public function getsite($url){
		$site_ = $this->cut('http://','/',$url.'/');
		$site = "http://$site_";
		return $site;
	}
	
	//==================================================
	function is_utf8($word){ 
		if (preg_match("/^([".chr(228)."-".chr(233)."]{1}[".chr(128)."-".chr(191)."]{1}[".chr(128)."-".chr(191)."]{1}){1}/",$word) == true || preg_match("/([".chr(228)."-".chr(233)."]{1}[".chr(128)."-".chr(191)."]{1}[".chr(128)."-".chr(191)."]{1}){1}$/",$word) == true || preg_match("/([".chr(228)."-".chr(233)."]{1}[".chr(128)."-".chr(191)."]{1}[".chr(128)."-".chr(191)."]{1}){2,}/",$word) == true){ 
			return true; 
		}else{ 
			return false; 
		} 
	} // function is_utf8 

	//======================================================
	//判断url是否合法
	function CheckWebAddr($C_weburl){
		return true;
		if (!ereg("^http://[_a-zA-Z0-9-]+(.[_a-zA-Z0-9-]+)*$", $C_weburl)){
			return false;
		}
		return true;
	}

	function cut($startstr=" ",$endstr=" ",$str){
		$outstr="";
		if(!empty($str) && strpos($str,$startstr)!==false && strpos($str,$endstr)!==false){
			$startpos	= strpos($str,$startstr);
			$str		= substr($str,($startpos+strlen($startstr)),strlen($str));
			$endpos		= strpos($str,$endstr);
			$outstr		= substr($str,0,$endpos);
		}
		return trim($outstr);
	}	

	function cutall($bstr,$estr,$str){
		
		$res = array();
		$result = explode($bstr,$str); 
		$count = count($result);
		if($count < 2) return $res;
		for($i=1;$i<$count;$i++){
			$endpos	= strpos($result[$i],$estr);
			$res[]	= substr($result[$i],0,$endpos);		
		}
		return $res;
	}

	function File_save($fileName, $text) {    
		if( ! $fileName ) return false; 
		if( $fp = fopen( $fileName, "w" ) ) {
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
	
	/**
	+----------------------------------------------------------
	* // 读取文件
	+----------------------------------------------------------
	* 参数:filename 路径文件名
	+----------------------------------------------------------
	*/
	function File_read($filename){
		if( is_file( $filename ) ){
			 $cn = @file_get_contents( $filename );
			return $cn;
		}
	}

	function parse_uri($uri,$currentPath='',$pathSeparator='/'){
		if($uri == 'http://') $uri = '#'; 
		$arrUrl = parse_url($uri);
		if (empty($arrUrl['scheme'])||is_null($arrUrl['scheme'])){
			$arrUrlCurrent = parse_url($currentPath);
			isset($arrUrl['query']) 	&& $arrUrlCurrent['query'] = $arrUrl['query'];
			isset($arrUrl['fragment']) 	&& $arrUrlCurrent['fragment'] = $arrUrl['fragment'];
			if (empty($arrUrlCurrent['path'])||is_null($arrUrlCurrent['path'])||$uri{0}=='/'||$uri{0}=='\\')
				isset($arrUrl['path']) 	&& $arrUrlCurrent['path'] = '/'.$arrUrl['path'];
			else
				$arrUrlCurrent['path'] = preg_replace('/[\/\\\][^\/\\\]*$/','/'.$arrUrl['path'],$arrUrlCurrent['path']);
		}else{
			$arrUrlCurrent = $arrUrl;
		}
		isset($arrUrlCurrent['path']) && $uri = preg_replace(array('/\\\/','/\/+/','/\/\.\//'),array('/','/','/'),$arrUrlCurrent['path']);
		$arrUri = explode('/',$uri);
		foreach ($arrUri as $key=>&$value){
			if ($value=='..'){
				for ($i=$key-1;$i>-1;$i--){
					if (!empty($arrUri[$i])){
						$arrUri[$i]='';
						break;
					}
				}
				$value='';
			}
		}
		$arrUri = array_flip(array_flip($arrUri));
		if (substr($uri,-1,1)=='/') 
			array_push($arrUri,'');
		$arrUrlCurrent['path'] = implode($pathSeparator,$arrUri);
		return $arrUrlCurrent;
		
	}

	/*合并由parse_url分析的数组(没有考虑用户名密码)*/
	function parse_url_join($arr){
		$out = array();
		if (!empty($arr['scheme'])){
			array_push($out,$arr['scheme'].'://');
		}
		if (!empty($arr['host'])){
			array_push($out,$arr['host']);
		}
		if (!empty($arr['port'])){
			array_push($out,':'.$arr['port']);
		}
		if (!empty($arr['path'])){
			array_push($out,$arr['path']);
		}
		if (!empty($arr['query'])){
			array_push($out,'?'.$arr['query']);
		}
		if (!empty($arr['fragment'])){
			array_push($out,'#'.$arr['fragment']);
		}
		return implode('',$out);
	}
	
}
//echo parse_url_join(parse_uri('http://www.sman.cn/blog/../fuck/../')),'<br />';
//输出:http://www.haihun.cn/ddd/

//echo parse_url_join(parse_uri('/blog/../fuck/../../ddd/bbb/../','http://www.sman.cn/')),'<br />';
//echo parse_url_join(parse_uri('blog/','http://www.sman.cn/')),'<br />';
//输出:http://www.1344.cn/blog

//echo parse_url_join(parse_uri('../dd/./index.asp','http://www.sman.cn/blog/')),'<br />';
//输出:http://www.sman.cn/dd/index.asp

//echo parse_url_join(parse_uri('1.asp','http://www.sman.cn/blog/../fuck/')),'<br />';
//输出:http://www.sman.cn/fuck/1.asp

?>