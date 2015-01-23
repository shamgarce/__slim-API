<?php
/*
存储根路径	KV_PATH
//-----------------------------------------
//文件模式
方法:
$this->curl($url)
$this->re($url)
$this->geturl($url,1);		//完成一个记录

分组
索引 -> 资源
site/1/2/md5
//-------------------------------------------------------
完成,不做新功能的开发,只做需求整理
*/
class Kf{

	var $sitechr;	//ak
	var $ak;		//ak
	var $mkey;		//key
	var $value;		//value
	var $lfile;		//索引文件
	var $nfile;		//内容文件
	var $area;		//区域
	var $lib_path;	//根路径
	var $lib_path_file;	//根路径
	var $mod_file_list;	//根路径
	//==================================================
	function __construct(){
		$this->tm				= time();						//图片存储模式
		$this->lib_path_file	= KV_PATH.'file/';				//文件模式
	}
	
	//==================================================
	//转化为本地路径
	//==================================================
	public function curl($url){
		//--------------------------------------------------
		if(empty($url))return '';
		$this->ini($url);
		//--------------------------------------------------
		return $this->path2;
	}

	public function iscache($url){
		if(empty($url))return '';
		$this->ini($url);
		//--------------------------------------------------
		if(file_exists($this->path2)){
			return true;
		}else{
			return false;
		}
	}

	public function re($url){
		//--------------------------------------------------
		if(empty($url))return '';
		$this->ini($url);
		if(file_exists($this->path2)){
			@unlink($this->path2);
		}
	}
	
	public function geturl($url,$flag = 0){
		//--------------------------------------------------
		if(empty($url))return '';
		$this->ini($url);
		//--------------------------------------------------
		//判断文件是否存在
		//if(strlen($this->ext)>5) return true;
		if(!file_exists($this->path2)){
			//$file = file_get_contents($url);
			$file = file_get_contents("compress.zlib://".$url);
			//echo $this->path2.'|';
			$fp=@fopen($this->path2,"wb");
			@fwrite($fp,$file);
			@fclose($fp);
		}else{
			$fn = $this->path2;
//			echo $url;
//			echo $fn;
			$file = (filesize($fn)!=0)?fread(fopen($fn,"rb"),filesize($fn)):'';
			//$file = @file_get_contents($this->path2);
		}
		if($flag && !$this->is_utf8($file))	$file = iconv('gbk', 'utf-8//IGNORE', $file);
		//保存完毕
		return $file;
	}
	
	public function sitelist(){
		$list_ = $this->getfileName($this->lib_path_file);
		return $list_;
	}
	
	public function ini($url){
		if(empty($url))return '';
		$this->ext 		= $this->getextname($url);
		$this->sitechr	= $this->cut('http://','/',$url.'/');
		$this->sitechr	= !empty($this->sitechr)?$this->sitechr:'mcfile';
		$this->md 		= $this->md($url);
		$this->str1 	= substr($this->md,0,1);
		$this->str2 	= substr($this->md,1,1);
		$this->path1 	= $this->lib_path_file.'task/'.$this->md.'.task';					//临时目录,只有信息记录,等待采集
		$this->path2 	= $this->lib_path_file.$this->sitechr.'/'.$this->str1.'/'.$this->str2.'/'.$this->md.'.'.$this->ext;	//主目录,是否有缓存,判断文件是否存在即可

		$_dir = $this->lib_path_file.$this->sitechr.'/';
		!is_dir($_dir) && mkdir($_dir);
		$_dir = $this->lib_path_file.$this->sitechr.'/';
		!is_dir($_dir) && mkdir($_dir);
		$_dir = $this->lib_path_file.$this->sitechr.'/'.$this->str1.'/';
		!is_dir($_dir) && mkdir($_dir);
		$_dir = $this->lib_path_file.$this->sitechr.'/'.$this->str1.'/'.$this->str2.'/';
		!is_dir($_dir) && mkdir($_dir);

		return true;
	}
	
	//------------------------------------------
	/*	支持函数	*/
	//根据url获取扩展名
	function getextname($url){
		$ext =  pathinfo($url, PATHINFO_EXTENSION);
		$ext =  !empty($ext)?$ext:'nn';
		return $ext;
	}

	//==================================================
	function is_utf8($word){ 
		if (preg_match("/^([".chr(228)."-".chr(233)."]{1}[".chr(128)."-".chr(191)."]{1}[".chr(128)."-".chr(191)."]{1}){1}/",$word) == true || preg_match("/([".chr(228)."-".chr(233)."]{1}[".chr(128)."-".chr(191)."]{1}[".chr(128)."-".chr(191)."]{1}){1}$/",$word) == true || preg_match("/([".chr(228)."-".chr(233)."]{1}[".chr(128)."-".chr(191)."]{1}[".chr(128)."-".chr(191)."]{1}){2,}/",$word) == true){ 
			return true; 
		}else{ 
			return false; 
		} 
	} // function is_utf8 

	
	function md($chr){
		return substr(md5($chr),8,16);
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

	//获取一个目录里面的所有文件
	function getfileName($dir){
		$array=array();
		//1、先打开要操作的目录，并用一个变量指向它
		//打开当前目录下的目录pic下的子目录common。
		$handler = opendir($dir);
		//2、循环的读取目录下的所有文件
		/*其中$filename = readdir($handler)是每次循环的时候将读取的文件名赋值给$filename，为了不陷于死循环，所以还要让$filename !== false。一定要用!==，因为如果某个文件名如果叫’0′，或者某些被系统认为是代表false，用!=就会停止循环*/
		while( ($filename = readdir($handler)) !== false ){
			// 3、目录下都会有两个文件，名字为’.'和‘..’，不要对他们进行操作
			if($filename != '.' && $filename != '..'){
				// 4、进行处理
				array_push($array,$filename);
			}
		}
		//5、关闭目录
		closedir($handler);
		return $array;
	}

	
}//end class
?>