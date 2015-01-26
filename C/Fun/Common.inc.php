<?php

DEBUG_TRACER && $_W['_Files'][] 		= __FILE__;

// +----------------------------------------------------------------------
// | Author: sham <shampeak@gmail.com>
// 系统级通用函数
// +----------------------------------------------------------------------
	/*
	+----------------------------------------------------------
	* 定义一个全局变量
	+----------------------------------------------------------
	* 参数: chr nr
	+----------------------------------------------------------
	*/
	function DIN($chr,$value=''){
		global $_W;
		$_W['_ding'][$chr] 	= $value;
		return true;
	}
	
	/*
	+----------------------------------------------------------
	* 获取全局变量
	+----------------------------------------------------------
	* 参数: chr 标识
	+----------------------------------------------------------
	*/
	function G($chr){
		global $_W;
		if(isset($_W['_ding'][$chr])){
			return $_W['_ding'][$chr];
		}
	}

	/*
	+----------------------------------------------------------
	* 获得时间戳
	+----------------------------------------------------------
	* 参数:无
	+----------------------------------------------------------
	*/
	function T(){
	    list($usec, $sec) = explode(" ",microtime()); 
		$num = ((float)$usec + (float)$sec);
	    return $num; 
	}

	function U($str){
		if (empty($str)) return array();

		$arr = unserialize($str);
		$arr = !empty($arr)?$arr:array();
		return $arr;
	}

	/*
	+----------------------------------------------------------
	* 字符转化为数组
	+----------------------------------------------------------
	* 参数:$str 需要转化的字符串 $flit 是否排重 $bl 分割字符
	+----------------------------------------------------------
	*/
	function getarr($str,$flit='0',$bl = "\r\n"){
		$arr = array();
		if(empty($str)) return $arr;
		//================================================
		$arr_ = explode($bl,$str);
		if($flit) $arr_ = array_unique($arr_);
		foreach($arr_ as $key=>$value){
			if(!empty($value)) $arr[] = trim($value);
			
		}
		return $arr;
	}

	/*
	+----------------------------------------------------------
	* 数组转化为数组
	+----------------------------------------------------------
	* 参数:$arr 需要转化的数组 $flit 是否排重 $bl 分割字符
	+----------------------------------------------------------
	*/
	function getstr($arr,$flit='0',$bl = "\r\n"){
		if(empty($arr)) return '';
		//================================================
		if($flit) $arr = array_unique($arr);
		foreach($arr as $key=>$value){
			if(!empty($value)) $arr_[] = trim($value);
		}
		if(!empty($arr_)) $str = implode($bl,$arr_);
		return $str;
	}

	/**
	+----------------------------------------------------------
	* 加载私有类
	+----------------------------------------------------------
	* 参数:$modelName:类名
	+----------------------------------------------------------
	*/
	function IN($modelName){
		$modelFile = RHLIB . $modelName . '.class.php'; 
		!file_exists($modelFile) && exit('模型' . $modelName . '不存在'); 
		include_once($modelFile);
	}

	/**
	+----------------------------------------------------------
	* M函数用于实例化一个没有模型文件的Model
	+----------------------------------------------------------
	* @return Model
	+----------------------------------------------------------
	* 参数:$modelName:系统类
	+----------------------------------------------------------
	 */
	function M($modelName) {
		$modelFile = CL . $modelName . '.class.php'; 
		!file_exists($modelFile) && exit('模型' . $modelName . '不存在'); 
		include_once($modelFile);
		//-------------------------------------------------------------
		$class = $modelName;
		!class_exists($class) && exit('M模型' . $modelName . '未定义');
		$model = new $class();
		return $model;
	}

	/**
	+----------------------------------------------------------
	* D函数用于实例化数据类
	+----------------------------------------------------------
	* @return Model
	+----------------------------------------------------------
	* 参数:str:DBC数组定义的下标名 -> 对应不同的数据库连接
	+----------------------------------------------------------
	*/
	function D($chr='system') {
		global $_W;
		$cfg = $_W['pdo'][$chr];
		$model = new mysql($cfg['HOST'], $cfg['USER'], $cfg['PWD'], $cfg['NAME'], $cfg['CHAR']);
		return $model;
	}

	/**
	+----------------------------------------------------------
	* // 信息trace 记录到全局变量中
	+----------------------------------------------------------
	* 参数:dis 索引 / nr:记录的内容
	+----------------------------------------------------------
	*/
	function TR($dis,$nr=''){
		global $_W;

		$_W['_trace'][$dis] = $nr;
	}
	
	/**
	+----------------------------------------------------------
	* // 保存文件
	+----------------------------------------------------------
	* 参数:filename 路径文件名 / text:内容
	+----------------------------------------------------------
	*/
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
	
	/**
	+----------------------------------------------------------
	* // 读取文件
	+----------------------------------------------------------
	* 参数:filename 路径文件名
	+----------------------------------------------------------
	*/
	function Fr($filename){
		if( is_file( $filename ) ){
			 $cn = file_get_contents( $filename );
			return $cn;
		}
	}
	
	//=============================================================
	//读取缓存
	function Cr($file, $dir = '') {
		$cachefile = CACHE_PATH . 'data/' . ($dir ? $dir . '/' : '') . $file . '.ca';
		if (!is_file($cachefile)) {
			return array();
		}
		return include $cachefile;
	}
	
	//写入缓存
	function Cw($file, $array, $dir = '') {
		//------------------------------------------
		//不存在->创建
		$_path = RHCACHE .'data/'.($dir ? $dir . '/' : '');
		!is_dir($_path) && mkdir($_path, 0777);
		//------------------------------------------
		$cachefile = $_path . $file . '.ca';
		$array = "<?php\nreturn " . var_export($array, true) . ";\n?>";
		$strlen = @file_put_contents($cachefile, $array);
		@chmod($cachefile, 0777);
		return $strlen;
	}
	
	//删除缓存
	function Cd($file, $dir = '') {
		$cachefile = RHCACHE .'data/'. ($dir ? $dir . '/' : '') . $file;
		return @unlink($cachefile);
	}	
		

	/**
	+----------------------------------------------------------
	* // 魔术转义
	+----------------------------------------------------------
	* 参数:string 需要转义的内容   反函数 stripslashes
	+----------------------------------------------------------
	*/


	/**
	+----------------------------------------------------------
	* // html实体转义
	+----------------------------------------------------------
	* 参数:string 需要转义的内容   反函数 htmldecode
	+----------------------------------------------------------
	*/


	/**
	+----------------------------------------------------------
	* // 内容截取
	+----------------------------------------------------------
	* 参数
	+----------------------------------------------------------
	*/
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



	/**
	+----------------------------------------------------------
	* //判断字符串是否存在
	+----------------------------------------------------------
	*/
	function strexists($haystack, $needle) {
		return !(strpos($haystack, $needle) === FALSE);
	}
	

		

	
	//获取字符串
	function getsubstr($string, $length, $in_slashes = 0, $out_slashes = 0, $censor = 0, $bbcode = 0, $html = 0) {
		global $cfg;
		$string = trim($string);
		if ($in_slashes) {
			//传入的字符有slashes
			$string = sstripslashes($string);
		}
		if ($html < 0) {
			//去掉html标签
			$string = preg_replace("/(\<[^\<]*\>|\r|\n|\s|\[.+?\])/is", ' ', $string);
			$string = shtmlspecialchars($string);
		} elseif ($html == 0) {
			//转换html标签
			$string = shtmlspecialchars($string);
		}
		if ($length && strlen($string) > $length) {
			//截断字符
			$wordscut = '';
			if (strtolower(C_CHAR) == 'utf-8') {
				//utf8编码
				$n = 0;
				$tn = 0;
				$noc = 0;
				while ($n < strlen($string)) {
					$t = ord($string[$n]);
					if ($t == 9 || $t == 10 || (32 <= $t && $t <= 126)) {
						$tn = 1;
						$n++;
						$noc++;
					} elseif (194 <= $t && $t <= 223) {
						$tn = 2;
						$n += 2;
						$noc += 2;
					} elseif (224 <= $t && $t < 239) {
						$tn = 3;
						$n += 3;
						$noc += 2;
					} elseif (240 <= $t && $t <= 247) {
						$tn = 4;
						$n += 4;
						$noc += 2;
					} elseif (248 <= $t && $t <= 251) {
						$tn = 5;
						$n += 5;
						$noc += 2;
					} elseif ($t == 252 || $t == 253) {
						$tn = 6;
						$n += 6;
						$noc += 2;
					} else {
						$n++;
					}
					if ($noc >= $length) {
						break;
					}
				}
				if ($noc > $length) {
					$n -= $tn;
				}
				$wordscut = substr($string, 0, $n);
			} else {
				for ($i = 0; $i < $length - 1; $i++) {
					if (ord($string[$i]) > 127) {
						$wordscut .= $string[$i] . $string[$i + 1];
						$i++;
					} else {
						$wordscut .= $string[$i];
					}
				}
			}
			$string = $wordscut;
		}
		if ($bbcode) {
			!function_exists('bbcode') && include(RH . 'libs/bbcode.func.php');
			$string = bbcode($string, $bbcode);
		}
		if ($out_slashes) {
			$string = saddslashes($string);
		}
		return trim($string);
	}	
	
	function R($url, $time=0, $msg='') {
	    $url = str_replace(array("\n", "\r"), '', $url);
	    if (empty($msg))
	        $msg = "系统将在{$time}秒之后自动跳转到{$url}！";
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
	