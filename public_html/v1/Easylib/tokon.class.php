<?php
class tokon{
	public $tokon 		= '';				//
	public $deviceid 	= '';
	public $tokonsalt 	= '5fdedc7t2f37ff11';				//位字符	
	
	
	function __construct($device='',){
		
	}
	$deviceid='',$tokon=''
	
	
	//根据sessionid 获取一个新的tokon
	//该tokon会把原来的设备tokon覆盖掉，然后产生一个新的返回
	//生成原则，时间+_+设备id 的 hash 这个tokon对服务器端永久有效 知道获取新的tokon才会无效化
	//有效无效是根据数据库中记录的时间来进行判定的
	public function gettokon(){
		$this->istokon() && retuur this-tokon
		$this->tokon = $this->newtokon();
	}		//传入设备号的加密代码md5(md5(设备id+salt)+salt)
	
	//验证tokon是否可用
	function is_tokon(){}				
	
	
	
	
	
}
?>