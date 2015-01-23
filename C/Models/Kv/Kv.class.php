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
	var $ak;		//ak				// key进行 md5之后的值
	var $area;		//区域				//区域值 .前面
	var $key;		//key				// .houmian
	var $md5;		//$md5				//$md5

	var $lfile;		//索引文件			//索引文件路径
	var $nfile;		//内容文件			//内容文件路径
	var $lib_path;	//根路径				
	
	var $value;		//value				//值
	//==================================================
	function __construct(){
		$this->lib_path			= KV_PATH.'chr/';			//变量模式
		$this->tm				= time();
	}
	
	//获取所有任务列表信息
	//==================================================
	//chr模式
	//==================================================
	//获取信息之前的预处理
	public function akdo($ak){
		$ak = Kvt::iniak($ak);
		if($ak != $this->ak){
			$this->ak 	= $ak;
			$this->area = Kvt::akarea($ak);
			$this->key 	= Kvt::akkey($ak);
			$this->md5 	= Kvt::akmd5($ak);
			$str1 = substr($this->md5,0,1);
			$str2 = substr($this->md5,1,1);
			$pathroot 	= $this->lib_path.$this->area.'/';
			$pathrootl 	= $this->lib_path.$this->area.'/l/';
			$pathrootn 	= $this->lib_path.$this->area.'/n/';
			$pathroot2 	= $this->lib_path.$this->area."/l/$str1/";		//索引文件路径
			$pathroot3 	= $this->lib_path.$this->area."/n/$str1/";		//内容路径
			$pathroot4 	= $this->lib_path.$this->area."/n/$str1/$str2/";		//内容存放地址
			$this->lfile = $pathroot2.$this->md5.'.ak';
			$this->nfile = $pathroot4.$this->md5.'.ak';
			!is_dir($this->lib_path) && mkdir($this->lib_path);		//区域目录
			!is_dir($pathroot) && mkdir($pathroot);		//区域目录
			!is_dir($pathrootl) && mkdir($pathrootl);		//索引目录
			!is_dir($pathrootn) && mkdir($pathrootn);		//索引目录
			!is_dir($pathroot2) && mkdir($pathroot2);		//索引目录
			!is_dir($pathroot3) && mkdir($pathroot3);		//索引目录
			!is_dir($pathroot4) && mkdir($pathroot4);		//索引目录
			//所有数据准备完毕
		}
	}
	
	public function get($ak){
		$ak = Kvt::iniak($ak);
		//-------------------------------------
		if($this->isvk($ak)){
			$nr = Kvt::nr_read($this->nfile);
			return $nr;
		}else{
			@unlink($this->lfile);		//过期信息删除
			@unlink($this->nfile);		//过期信息删除
			return '';
		}
	}

	public function set($ak,$value,$tm=0){
		$ak = Kvt::iniak($ak);
		$this->akdo($ak);
		//-------------------------------------
		
		if(empty($tm))$tm = 24*60*60;
		$sy['name'] = $this->ak;
		$sy['tm'] 	= time() + $tm;
		Kvt::nr_save($this->lfile,$sy);		//保存内容
		Kvt::nr_save($this->nfile,$value);
		return true;
	}
	
	public function delete($ak){
		$ak = Kvt::iniak($ak);
		$this->akdo($ak);
		//-------------------------------------
		@unlink($this->lfile);
		@unlink($this->nfile);
		return true;
	}
	
	//-------------------------------------
	//读取索引,判断是否有效
	public function isvk($ak =''){
		$ak = Kvt::iniak($ak);
		$this->akdo($ak);
		//-------------------------------------
		
		$list = Kvt::nr_read($this->lfile);
		if(!empty($list)){
			if($list['tm'] > $this->tm){
				return true;
			} else{
				unlink($this->lfile);
				unlink($this->nfile);
			}
		}
		return false;
	}
		
//
//	//区域内所有的缓存变量
//	public function getarea($area='default'){
//		$_sub = $this->getfileName($this->lib_path.$area.'/l/');		//区域的所有目录
//		$list = array();
//		foreach($_sub as $value){
//			$list_ = $this->getfileName($this->lib_path.$area.'/l/'.$value.'/');		//区域目录下所有的文件名
//			if(!empty($list_)){
//				foreach($list_ as $key=>$value2){
//					$file = $this->lib_path.$area.'/l/'.$value.'/'.$value2;
//					$ns = $this->nr_read($file);
//					$list[] = $ns['name'];
//				}
//			}
//		}
//		return $list;
//	}
//	
//	function disableArea($area = 'default'){
//		$list = $this->getarea($area);
//		//print_r($list);
//		//exit;
//		if(!empty($list)){
//			foreach($list as $value){
//				$this->delete($value);
//			}
//		}
//		return true;
//	}


	
//
//	
//	//------------------------------------------
//	//下面进行协助管理
//	//------------------------------------------
//	
//	//------------------------------------------
//	//获取区域列表
//	public function getarealist(){
//		$list = $this->getfileName($this->lib_path);
//		return $list;
//	}
//	
//	//------------------------------------------
//	//某个区域下面的所有子路径
//	public function getsuoyin_name($area='default'){
//		$list = $this->getfileName($this->lib_path.$area.'/l/');
//		return $list;
//	}
//	
//	//------------------------------------------
//	//某个区域下面的子路径的key列表
//	public function getsuoyin($area='default',$sub=''){
//		$list_ = $this->getfileName($this->lib_path.$area.'/l/'.$sub.'/');
//		$list = array();
//		if(!empty($list_)){
//			foreach($list_ as $key=>$value){
//				$file = $this->lib_path.$area.'/l/'.$sub.'/'.$list_[$key];
//				$ns = $this->nr_read($file);
//				$list[] = $ns['name'];
//			}
//		}
//		return $list;
//	}
	
}//end class
?>