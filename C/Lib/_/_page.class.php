<?php 
/*
页面分析模型

//完善页面分析模块
$page = M('page');
$page->page('http://www.28.com/');
echo $page->nr;
echo $page->head;
echo $page->body;
echo $page->title;
echo $page->keyword;
echo $page->discription;
print_r($page->headstyle);
print_r($page->urllist);
print_r($page->imglist);
print_r($page->csslist);
print_r($page->urlmap);
*/
include_once COMMON_PATH.'B.class.php';
class page extends B {
	//-----------------------------------------------
    var $url    	= '';
    var $nr   		= '';			//获取到的内容
	var $head 		= '';		// head
	var $body 		= '';		// body
	//-----------------------------------------------
	var $title 			= '';		// title
	var $keyword		= '';		// keyword
	var $discription	= '';		// discription
	var $headstyle		= array();		// 外站地址
	//-----------------------------------------------
	var $urllist		= array();		//
	var $imglist		= array();		//
	var $csslist		= array();		//
	var $urlmap		= array();		//
//	var $urlmap_tw		= array();		//
	
	//-----------------------------------------------
	//每个模式包含参数,1,2
	//	原始地址
	//	原始地址 -> 完整资源地址
	//	原始地址 -> 本地资源地址
    function __construct(){}

    public function page($url,$nr){
		$this->url= $url;
		$this->nr = strtolower($nr);
		
		$nr = strtolower($this->nr);
		$this->head 	= cut('<head>','</head>',$nr);
		
		//下面三组数据要进行补全
		$body 		= cut('<body','</body>',$nr);
		$this->body = substr($body,strpos($body,'>')+1,strlen($body));
		//============================================
		$this->title 	= cut('<title>','</title>',$nr);
		$keyword 		= cut('keywords','>',$nr);
		$keyword 		= substr($keyword,strpos($keyword,'content')+7,strlen($keyword));
		$this->keyword	= str_replace(array("\\",'=','"',"'","/"),'',$keyword);
		$discription		= cut('description','>',$nr);
		$discription		= substr($discription,strpos($discription,'content')+7,strlen($discription));
		$this->discription	= str_replace(array("\\",'=','"',"'","/"),'',$discription);
		//============================================
		$this->getheadstyle();
		$this->geturllist();
		$this->getcsslist();
		$this->getimglist();
		$this->geturlmap();
		//$this->urlmap_tw();
	}

    public function getheadstyle(){
		$style = array();
		$style_ = $this->cutall('<style','</style>',$this->head);
		foreach($style_ as $value){
			$st = '<style'.$value.'</style>';
			$style[]	= $st;
		}
		$this->headstyle = $style;
	}
	
	//原始地址
	function geturllist(){
		$arr 		= array();
		$urllist 	= array();
		$nr = str_replace("\n","",$this->nr);
		$nr = str_replace("\r","",$nr);
		$arr = $this->get_all_url($nr);
		$this->urllist = $arr['url'];
	}
	
	
	function getimglist() {
		//分离其中的图片
		if(empty($this->nr))return array();
		$arr = array();
		$urllist = array();
		$nr = str_replace("\n","",$this->nr);
		$nr = str_replace("\r","",$nr);
		$arr = $this->get_all_img($nr);
		if(!empty($arr))$arr = array_unique($arr);		//排重
		$this->imglist = $arr;
		unset($arr);
	}
	
	
	//-----------------------------------------------
	//csslist pagestyle
	function getcsslist(){		
		//-----------------------------------------------
		//样式文件
		$nr = str_replace("\n","",$this->nr);
		$nr = str_replace("\r","",$nr);
		$file_ = $this->cutall('<link','>',$nr);
		$file = array();
		foreach($file_ as $value){
			if(strpos($value,'css')!==false ){
				$file____ = cut('href','.css',$value).".css";
				$file____ = str_replace(array('=','"',"'",' '),'',$file____);
				$file[] = $file____;
			}
		}
		$this->csslist = $file;
		unset($file_);
		unset($file);
	}
	

	function geturlmap() {
		if(empty($this->nr))return array();
		
		$nr = str_replace("\n","",$this->nr);
		$nr = str_replace("\r","",$nr);
		$arr = $this->get_all_url($nr);
		//---------------------------------------
		//计算
		foreach($arr['url'] as $key=>$value){
			$url = $this->parse_url_join($this->parse_uri($value,$this->url));
			if(substr($url,0,4)=='http'){
				$list_['url'][$key] 	= $url;
				$list_['name'][$key] 	= trim($arr['name'][$key]);
			}
		}
		unset($arr);
		$this->urlmap = $list_;
		return $list_;
	}	
	
//在外面进行计算//
//	function urlmap_tw(){
////		print_r($this->urlmap);
////		exit;
//
//		if(!empty($this->urlmap)){
//			foreach($this->urlmap['url'] as $key=>$url){
//				//-----------------------------------
//				$_img 	= $this->get_all_img($this->urlmap['name'][$key]);		//这个获得一个数组
//				$_wz 	= trim(strip_tags($this->urlmap['name'][$key]));			//这个获得一个串
//				//1:如果空
//				//2:分离其中的文字部分
//				//3:获取其中的图片信息
//				if(!empty($_wz))$this->urlmap_tw[$url]['wz'][] = $_wz;
//				if(!empty($_img)){
//					if(empty($this->urlmap_tw[$url]['img'])) $this->urlmap_tw[$url]['img'] = array();
//					$this->urlmap_tw[$url]['img'] =array_merge($this->urlmap_tw[$url]['img'],$_img);
//				}
//				//-----------------------------------
//			}
//			print_r($this->urlmap_tw);
//			//排重urlmap_tw
//		//	foreach($this->urlmap_tw as $key=>$value){
//		//		if(!empty($this->urlmap_tw[$key]['wz']))$this->urlmap_tw[$key]['wz'] = array_unique($this->urlmap_tw[$key]['wz']);
//		//		if(!empty($this->urlmap_tw[$key]['img']))$this->urlmap_tw[$key]['img'] = array_unique($this->urlmap_tw[$key]['img']);
//		//	}
//			
//		}
//		
//	}	
	
	//==============================================================
	function get_all_url($document) { 
		preg_match_all("'<\s*a\s.*?href\s*=\s*([\"\'])?(?(1)(.*?)\\1|([^\s\>]+))[^>]*>?(.*?)</a>'isx",$document,$links); 
		while(list($key,$val) = each($links[2])) { 
			if(!empty($val)) {
				$match['url'][$key] = $val; 
			}
		} 
		while(list($key,$val) = each($links[3])) { 
			if(!empty($val)){
				$match['url'][$key] = $val; 
			} 
		} 
		while(list($key,$val) = each($links[4])) { 
			if(!empty($val)) 
			$match['name'][$key] = $val; 
		} 
//		while(list($key,$val) = each($links[0])) { 
//			if(!empty($val)) 
//			$match['all'][$key] = $val; 
//		} 
		return $match; 
	}
	
	function get_all_img($str){ 
		$str = stripslashes($str);   
//		$pattern = "/<img[^>]*src\=\"(([^>]*)(jpg|gif|png|bmp|jpeg))\"/";   //获取所有图片标签的全部信息   
		$pattern = "/<[img|IMG].*?src=[\'|\"](.*?(?:[\.gif|\.jpg]))[\'|\"].*?[\/]?>/";   //获取所有图片标签的全部信息
		preg_match_all($pattern, $str, $matches);   
		return $matches[1];
	}	
	
}
?>