<?php
DEBUG_TRACER && $_W['_Files'][] 		= __FILE__;

//继承基础类BASE
//开发主要是继承这个类进行各项开发
class Api { 
	VAR $JSON 		= array();
	VAR $debugout 	= array();
	VAR $OUTPUT 	= array();
	VAR $_W 		= array();

	public function __construct($_W){
		$this->_W = $_W;
		//$this->action_before($_W);
	}
	
//	public function __IniRun(){	echo '__IniRun';	}
//	function __toString(){return "This is Test!";	}		//被ECHO
//	function __clone(){	echo "I am cloned!" ;	}		//被克隆
//	function __get($key){echo $key, " 属性不存在";}			//获取未定义变量的时候
//	function __set($key,$val){echo "Can't assign\"".$val . "\" to ". $key . " !未申明属性";}			//设置未定义的变量
//	function __call($key, $args){
//		echo "The function \"". $key ."\" doesn't exist. it's args are ". print_r($args);
//		exit;
//	}	//调用不存在的方法

	/*在action执行前运行 在应用中重写方法*/
	public function action_before($_W=array()){
		//$_W['code']<0	&&	$this->jsonout($this->JSON);
	}

	/*在action执行后运行 在应用中重写方法*/
	public function action_after(){
		global $_W;
		if(!$_W['_args']['debug']){
			$this->OUTPUT = $this->JSON;
		}else{
			$this->debugout['Timestamp_excute'] = $_W['Timestamp'] - microtime(TRUE);
			$this->debugout['MemsUsed'] 			= memory_get_usage() - $_W['_StartUseMems'];
			$this->debugout['QueryCount'] 	= $_W['QueryCount'];
			$this->debugout['_args'] 		= $_W['_args'];
			$this->debugout['code'] 		= $_W['json']['code'];
			$this->debugout['msg'] 			= $_W['json']['msg'];
			$this->debugout['data'] 		= $_W['json']['data'];
			$this->OUTPUT = $this->debugout;
		}
	}

	public function jsonout(){		//这个必须有、不要改写 action完毕后执行
		$this->action_after();
		echo json_encode($this->OUTPUT);
		exit;		//所有程序到这里才完整执行
	}
}
