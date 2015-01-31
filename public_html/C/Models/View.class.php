<?php 
/*
		if($this->isCached('Meth.htm')){
			echo '有缓存,显示缓存';
			$this->display('Meth.htm');
			exit;
		}
		$hello = "Hello World!";		//赋值
		$this->assign("hello",$hello);	//引用模板文件
		$this->display('Meth.htm');
*/
class View{ 
	var $vars 			= array(); 
	var $info  			= array();
	var $info_name 		= '';
	var $info_id 		= '';
	var $info_url 		= '';
	var $cache_lifetime = 0;				//有效时间 0为不缓存,使用新设定的缓存时间
	var $cachecontent 	= 0;				//缓存内容
	var $cache_path 	= 'fcache/';
	var $err_path      	= 'errlog/';		//data目录下
	var $dis			= 0;				//
	//==================================================
	var $cacheFileName    = "";   		 //缓存文件名[页面] 跟站点域名相关
	var $cacheFileName_chr= "";   		 //缓存文件名[字符] 跟站点域名无关，仅和参数有关
	//==================================================

	function __construct(){
		include CM.'Smarty/Smarty.class.php';
		$this -> template = new Smarty();
		$this -> template -> template_dir 	= APP;		//设置模板目录
		$this -> template -> compile_dir 	= RHAPPCACHE.'smarty/temp';		//设置编译目录
		$this -> template -> cache_dir 		= RHAPPCACHE.'smarty/cache/';	//设置缓存目录
		$this -> template -> left_delimiter = "<%";							//设置左边界符
		$this -> template -> right_delimiter= "%>";							//设置右边界符
		//$this -> template -> security 		= false; 
		$this -> template -> cache_lifetime = 2;							//设置缓存时间
		$this -> template -> caching 		= false;							//缓存
		$this -> template -> debugging 		= false; 						//**编译
		//$this -> template -> display_debug = true;
	}
	
	//ok
	public function assign($var, $value=''){ 
		if(is_array($var)){ 
			$this->vars = array_merge($this->vars, $var); 
		}else{
			$this->vars[$var] = $value; 
		}
	}
	
	public function isCached($file,$mobanid = ''){ 
		$this-> Exist($file);
		$file = './'.$this->getrealpath($file);
		return $this-> template->isCached($file,$mobanid);
	} 

	
	public function display($file,$mobanid = ''){ 
		$this-> Exist($file);
		$file = './'.$this->getrealpath($file);
		$this-> template->assign($this->vars);
		$this-> template->display($file,$mobanid); 
	} 
	
	public function fetch($file,$mobanid = ''){ 
		$this-> Exist($file);
		$file = './'.$this->getrealpath($file);
		$this-> template->assign($this->vars);
		return $this-> template-> fetch($file,$this->vars);
	}

	//判断模板文件是否存在
	private function Exist($file){
		
		$realpath = $this->getrealpath($file);
		
		if(empty($realpath)) exit('模板文件不存在');
	}

	function getrealpath($file){		//转换为实际地址
		$file = RHAPP.$file;
		if(file_exists($file)){
			return $file;
		}
		return '';
	}	
	
	function parse_uri($uri,$currentPath='',$pathSeparator='/'){
		if($uri == 'http://') $uri = '#'; 
		$arrUrl = parse_url($uri);
		if (empty($arrUrl['scheme'])||is_null($arrUrl['scheme'])){
			$arrUrlCurrent = parse_url($currentPath);
			isset($arrUrl['query']) && $arrUrlCurrent['query'] = $arrUrl['query'];
			isset($arrUrl['fragment']) && $arrUrlCurrent['fragment'] = $arrUrl['fragment'];
			if (empty($arrUrlCurrent['path'])||is_null($arrUrlCurrent['path'])||$uri{0}=='/'||$uri{0}=='\\')
				$arrUrlCurrent['path'] = '/'.$arrUrl['path'];
			else
				$arrUrlCurrent['path'] = preg_replace('/[\/\\\][^\/\\\]*$/','/'.$arrUrl['path'],$arrUrlCurrent['path']);
		}else{
			$arrUrlCurrent = $arrUrl;
		}
		$uri = preg_replace(array('/\\\/','/\/+/','/\/\.\//'),array('/','/','/'),$arrUrlCurrent['path']);
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
		return $arrUrlCurrent['path'];
	}	
	
	
}//end class 
?>