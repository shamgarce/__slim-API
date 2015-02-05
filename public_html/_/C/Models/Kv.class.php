<?php
/*
存储根路径	KV_PATH
//-----------------------------------------
//字符串模式
$this->kv->delete('abc');		//删除
if($this->kv->isvk('abc')){
	$nr = $this->kv->get('abc');
	print_r($nr);
}else{
	echo '保存';
	$ns = array('asdf',array('123',123,array(1,2,3)),123123);
	$this->kv->set('abc',$ns,3);
}

//-----------------------------------------
应用
get($ak)
set($ak,$value,$tm=0)
delete($ak)
getarea($area='default')
disablearea($area='default')

//-----------------------------------------
管理
getarealist();
getsuoyin_name($area='default');
getsuoyin($area='default',$sub='');
//-------------------------------------------------------
完成,不做新功能的开发,只做需求整理
*/
class Kv{
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
		$this->lib_path			= KV_PATH.'chr/';			//变量模式
		$this->tm				= time();
	}
	
	//获取所有任务列表信息
	//==================================================
	//chr模式
	//==================================================
	public function get($ak){
		$this->getak($ak);
		if($this->isvk($ak)){
			$nr = $this->nr_read($this->nfile);
			return $nr;
		}else{
			return '';
		}
	}

	public function set($ak,$value,$tm=0){
		if(empty($tm))$tm = 24*60*60;
		$md5chr = md5($ak);
		$this->getak($ak,'set');				//保存索引,保存内容
		$sy['name'] = $ak;
		$sy['tm'] 	= time() + $tm;
		$this->nr_save($this->lfile,$sy);		//保存内容
		$this->nr_save($this->nfile,$value);
		return true;
	}
	
	public function delete($ak){
		
		$this->getak($ak);
		@unlink($this->lfile);
		@unlink($this->nfile);
		return true;
	}

	//区域内所有的缓存变量
	public function getarea($area='default'){
		$_sub = $this->getfileName($this->lib_path.$area.'/l/');		//区域的所有目录
		$list = array();
		foreach($_sub as $value){
			$list_ = $this->getfileName($this->lib_path.$area.'/l/'.$value.'/');		//区域目录下所有的文件名
			if(!empty($list_)){
				foreach($list_ as $key=>$value2){
					$file = $this->lib_path.$area.'/l/'.$value.'/'.$value2;
					$ns = $this->nr_read($file);
					$list[] = $ns['name'];
				}
			}
		}
		return $list;
	}
	
	function disableArea($area = 'default'){
		$list = $this->getarea($area);
		//print_r($list);
		//exit;
		if(!empty($list)){
			foreach($list as $value){
				$this->delete($value);
			}
		}
		return true;
	}

	//-------------------------------------
	//读取索引,判断是否有效
	public function isvk($ak =''){
		if($this->ak != $ak) $this->getak($ak);
		$list = $this->nr_read($this->lfile);
		if(!empty($list)){
			if($list['tm'] > $this->tm) return true;
		}
		return false;
	}
	
	//-------------------------------------
	//根据ak 获得area 索引路径 内容路径
	function getak($ak,$type='get'){
		$this->ak = $ak;
		$md5chr = md5($ak);
		//---------------------------------------
		if(empty($ak)){
			$list 	= 'default';
			$dt		= 'default';
		}else if(!strpos($ak,'.')){		//没有'.',默认区域
			$list 	= 'default';
			$dt		= $ak;
		}else{
			$result = explode('.',$ak); 
			$list 	= $result[0];
			unset($result[0]);
			$dt		= implode('.',$result);
		}
		$this->area	= $list; 		
		$this->mkey	= $dt; 		
		
		$pathroot 	= $this->lib_path."$list/";
		$pathrootl 	= $pathroot."l/";
		$pathrootn 	= $pathroot."n/";
		
		if($type == 'set'){
			!is_dir($pathroot) && mkdir($pathroot, 0777);		//区域目录
			!is_dir($pathrootl) && mkdir($pathrootl, 0777);		//索引目录
			!is_dir($pathrootn) && mkdir($pathrootn, 0777);		//索引目录
			$str1 = substr($md5chr,0,1);
			$str2 = substr($md5chr,1,1);
			$pathrootl 	= $pathrootl."$str1/";
			!is_dir($pathrootl) && mkdir($pathrootl, 0777);		//索引目录
			$pathrootn 	= $pathrootn."$str1/";
			!is_dir($pathrootn) && mkdir($pathrootn, 0777);		//索引目录
			$pathrootn 	= $pathrootn."$str2/";
			!is_dir($pathrootn) && mkdir($pathrootn, 0777);		//索引目录

		}else{	//get 不需要创建目录

			$str1 = substr($md5chr,0,1);
			$str2 = substr($md5chr,1,1);
			$pathrootl 	= $pathrootl."$str1/";
			$pathrootn 	= $pathrootn."$str1/";
			$pathrootn 	= $pathrootn."$str2/";
		}
		
		//得到路径 $pathrootl  /  $pathrootn
		//索引文件 
		$this->lfile = $pathrootl."$md5chr.vk";
		$this->nfile = $pathrootn."$md5chr.vk";
		return true;
	}

	//------------------------------------------
	//保存内容
	function nr_save($file,$nr){
		//------------------------------------------
		$array = "<?php \nreturn " . var_export($nr, true) . ";\n?>";
		$strlen = @file_put_contents($file, $array);
		@chmod($file, 0777);
		return $strlen;
	}

	//------------------------------------------
	//读取内容
	function nr_read($file){
		if (!is_file($file)) {
			return array();
		}
		return include $file;
	}
	
	//------------------------------------------
	//下面进行协助管理
	//------------------------------------------
	
	//------------------------------------------
	//获取区域列表
	public function getarealist(){
		$list = $this->getfileName($this->lib_path);
		return $list;
	}
	
	//------------------------------------------
	//某个区域下面的所有子路径
	public function getsuoyin_name($area='default'){
		$list = $this->getfileName($this->lib_path.$area.'/l/');
		return $list;
	}
	
	//------------------------------------------
	//某个区域下面的子路径的key列表
	public function getsuoyin($area='default',$sub=''){
		$list_ = $this->getfileName($this->lib_path.$area.'/l/'.$sub.'/');
		$list = array();
		if(!empty($list_)){
			foreach($list_ as $key=>$value){
				$file = $this->lib_path.$area.'/l/'.$sub.'/'.$list_[$key];
				$ns = $this->nr_read($file);
				$list[] = $ns['name'];
			}
		}
		return $list;
	}
	
	//根据url获取扩展名
	function getextname($url){
		$ext =  pathinfo($url, PATHINFO_EXTENSION);
		$ext =  !empty($ext)?$ext:'nn';
		return $ext;
	}
	
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