<?php
/*
//相关参数
//define("KV_PATH","../kv/");			//kv路径
//define("XM_PATH","../xm/");			//项目路径
//==================================================
	htmlcache 
	csscache
	imgcache
	cachecheck
	make
	throw
//==================================================
M

getready
clear



//==================================================
*/

class xm{
	var $url = '';
	
	//==================================================
	function __construct(){
	}

	public function setr($kv,$kf,$ci){
		$this->kv = $kv;
		$this->kf = $kf;
		$this->ci = $ci;
	}

	public function xiangmu($url){
		$this->url = $url;
		$this->xmpath = XM_PATH.substr(md5($url),8,16).'/';
		$this->xmpath_lib = XM_PATH.substr(md5($url),8,16).'/lib/';
		$this->xmpath_img = XM_PATH.substr(md5($url),8,16).'/images/';
		!is_dir($this->xmpath) 		&& mkdir($this->xmpath);
		!is_dir($this->xmpath_lib) 	&& mkdir($this->xmpath_lib);
		!is_dir($this->xmpath_img) 	&& mkdir($this->xmpath_img);
		
		//获取页面内容
		$nr = $this->urlread($url);
		//获取html中的css文件列表
		//echo $nr;
		$this->ci->url = $url;
		//=========================================
		$csslist = $this->ci->getcsslist_ys($nr);	//从内容中获取css文件
		$imglist = $this->ci->getimglist_ys($nr);	//从内容中获取图片文件
		$htmlzy['css'] = $csslist;
		$htmlzy['img'] = $imglist;
		$cssfile_list = $this->read('cssfile.ini');
		//=========================================
		$list =  array_merge($csslist,$imglist);
		$list =  array_merge($list,$cssfile_list);
		//===========================================
		foreach($list as $key=>$ut){
			$nr = $this->urlread($ut);
			if($this->getextname($ut) == 'css'){
				$mt = $this->ci->getziyuanfromcss_ys($nr);
				$htmlzy[$ut] = $mt;
				$list =  array_merge($list,$mt);
				$cfile[$key] = $ut;		//判断是否需要重写
			}
		}

		/*判断css文件记录是否要重写*/
		$endc = array_diff($cfile,$cssfile_list);
		if(!empty($endc)){
			$cssfile_list =  array_merge($cssfile_list,$cfile);
			$cssfile_list =  array_unique($cssfile_list);
		}
		$this->write('cssfile.ini',$cssfile_list);
		//-----------------------------------------------
		//资源表
		$this->write('zy.ini',$htmlzy);
		//----------------------------------------------
		$this->make();
		$this->html();

		return '文件OK';

	}
	
	public function html(){
		//----------------------------------------------
		//准备数据
		//----------------------------------------------
		$zy = $this->read('zy.ini');
		$url = $this->url;
		$nr = strtolower($this->urlread($url));
		$fn =  $this->xmpath.substr(md5($url),8,16).'.index.html';
		
		//=========================================
		$head 	= cut('<head>','</head>',$nr);
		$title 	= cut('<title>','</title>',$nr);
		//下面三组数据要进行补全
		$body 	= cut('<body','</body>',$nr);
		$body 	= substr($body,strpos($body,'>')+1,strlen($body));

		$keyword 	= cut('keywords','>',$nr);
		$keyword 	= substr($keyword,strpos($keyword,'content')+7,strlen($keyword));
		$keyword	= str_replace(array("\\",'=','"',"'","/"),'',$keyword);
		
		$discription	= cut('description','>',$nr);
		$discription	= substr($discription,strpos($discription,'content')+7,strlen($discription));
		$discription	= str_replace(array("\\",'=','"',"'","/"),'',$discription);
		
		foreach($zy['css'] as $value){
			
			$fn = 'images/'.substr(md5($value),8,16).'.'.$this->getextname($value);
			$style .= '<link href="'.$fn.'" rel="stylesheet" type="text/css">'."\r\n";
		}
		$style_ = $this->cutall('<style','</style>',$head);
		foreach($style_ as $value){
			$st = '<style'.$value.'</style>';
			$style .=$st;
		}
		
		//=======================================
		$mb['title']		= $title;
		$mb['keyword']		= $keyword;
		$mb['discription']	= $discription;
		$mb['style']		= $style;
		//=======================================
//		$mb['head']	= $head;
//		$mb['body']	= $body;
		
		
		foreach($zy['img'] as $key=>$value){
			$fn = 'images/'.substr(md5($value),8,16).'.'.$this->getextname($value);
			$body = str_replace($key,$fn,$body);
		}
		foreach($zy['css'] as $key=>$value){
			$fn = 'images/'.substr(md5($value),8,16).'.'.$this->getextname($value);
			$body = str_replace($key,$fn,$body);
		}

		$head = '
<title>#Title#</title>
<meta name="Keywords" content="#Keywords#">
<meta name="Description" content="#discription#">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
#style#
';	
		$head  = str_replace('#Title#',$title,$head);
		$head  = str_replace('#Keywords#',$keyword,$head);
		$head  = str_replace('#discription#',$discription,$head);
		$head  = str_replace('#style#',$style,$head);
		
		$nr = '
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>'.$head.'</head>
<body>'.$body.'</body>
</html>';		

		@file_put_contents($this->xmpath.'index.html', $nr);
		
	}
	
	public function make(){
		$zy = $this->read('zy.ini');
		//首先拷贝图片文件
		foreach($zy as $key=>$value){
			foreach($value as $key2=>$value2){
				$fn = substr(md5($value2),8,16).'.'.$this->getextname($value2);
				if($this->getextname($value2) == 'jpeg' || $this->getextname($value2) == 'jpg' || $this->getextname($value2) == 'png' || $this->getextname($value2) == 'gif'){
					$this->filecopy($fn);
				}
			}
		}

		foreach($zy['css'] as $key=>$value){
			$nr = $this->urlread($value);
			$zy_ = $zy[$key];
			$nr = str_replace('gb2312','utf-8',$nr);
			$fn = substr(md5($value),8,16).'.'.$this->getextname($value);
			if(!empty($zy_)){
				foreach($zy_ as $k=>$v){
					$fn_ = substr(md5($v),8,16).'.'.$this->getextname($v);
					$nr = str_replace($k,$fn,$nr);
				}
			}
			@file_put_contents($this->xmpath_img.$fn, $nr);
		}
		/*处理html文件*/
	}



	function filecopy($fn){ 
		//$this->xmpath_lib = XM_PATH.substr(md5($url),8,16).'/lib/';
		//$this->xmpath_img = XM_PATH.substr(md5($url),8,16).'/images/';
		$nr = @file_get_contents($this->xmpath_lib.$fn);
		@file_put_contents($this->xmpath_img.$fn, $nr);
		return true;
	}

	function read($file){ 
		$file = $this->xmpath_lib.$file;
		if (!is_file($file)) {
			return array();
		}
		return include $file;
	}
	
	function write($file, $array){ 
		$file =  $this->xmpath_lib.$file;
		//------------------------------------------
		$array = "<?php\nreturn " . var_export($array, true) . ";\n?>";
		$strlen = @file_put_contents($file, $array);
		@chmod($file, 0777);
		return $strlen;	
	}
		
	function urlread($sUrl){
		$fn = $this->xmpath_lib.substr(md5($sUrl),8,16).'.'.$this->getextname($sUrl);
		if(is_file($fn)){
			$nr = @file_get_contents($fn);
			
		}else{
			$nr = $this->download_file($sUrl,$fn);
		}
		return $nr;
	}
		
	//=======================================================
	//把远程内容存储到本地
	function download_file($sUrl,$sSavePath=''){ 
//		$file = @file_get_contents("compress.zlib://".$sUrl);
		$file = $this->kf->getfile($sUrl);
		if(!$this->is_utf8($file)){
			$file = iconv('gbk', 'utf-8//IGNORE', $file);
		}
		@file_put_contents($sSavePath,$file);
		return $file;
	}

	//==================================================
	function is_utf8($word){ 
		if (preg_match("/^([".chr(228)."-".chr(233)."]{1}[".chr(128)."-".chr(191)."]{1}[".chr(128)."-".chr(191)."]{1}){1}/",$word) == true || preg_match("/([".chr(228)."-".chr(233)."]{1}[".chr(128)."-".chr(191)."]{1}[".chr(128)."-".chr(191)."]{1}){1}$/",$word) == true || preg_match("/([".chr(228)."-".chr(233)."]{1}[".chr(128)."-".chr(191)."]{1}[".chr(128)."-".chr(191)."]{1}){2,}/",$word) == true){ 
			return true; 
		}else{ 
			return false; 
		} 
	} // function is_utf8 



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


	public function getextname($url){
		$ext =  pathinfo($url, PATHINFO_EXTENSION);
		$ext =  empty($ext)?$ext:'nn';
		return $ext;
	}	
}//end class
?>