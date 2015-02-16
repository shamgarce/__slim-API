<?php
/** 参数检查
Fi::Fint('id');			//正整数
Fi::Fvar('str');		//不包含特殊字符的
*/
$_W['_file'][] 	= __FILE__;

abstract class Fi {

	function Fset(){
		self::Fint('id');
		self::Fint('siteid');
		self::Fint('flag');
		self::Fint('cid');
		self::Fint('classid');
		self::Fint('num');
	}

	public static $zenze = array(
            'INT'    	=>  '/^[0-9]*$/',
            'VAR'   	=>  '/^\w+$/'
   	);

	function Danger_replace($str){
		if(empty($str)) return $str;
		foreach(self::$sqlindb as $invalue)
		{
			$str = str_ireplace($invalue,"",$str);
		}
		return $str;
	}

	function Doget($vtype,$basename){
		if(isset($_GET[$basename])){
			$str = $_GET[$basename];
			$str = self::FI_flit($str,$vtype);
			$_GET[$basename] = $str;
		}
	}	
	
	function Dopost($vtype,$basename){
		if(isset($_POST[$basename])){
			$str = $_POST[$basename];
			$str = self::FI_flit($str,$vtype);
			$_POST[$basename] = $str;
		}
	}	
	
    public static function Fint($basename){
		if(isset($_GET[$basename])){
			$_GET[$basename] = intval($_GET[$basename]);
		}
		if(isset($_POST[$basename])){
			$_POST[$basename] = intval($_POST[$basename]);
		}
    }
     
     public static function Fvar($basename){
    	self::Doget('VAR',$basename);
    	self::Dopost('VAR',$basename);
     }

    public static function FI_flit($str,$fftype)
    {
		if(empty($str)) return '';
		if(preg_match(self::$zenze[$fftype] ,$str)){
			return $str;
		}
		else
		{
			return '';
		}
    }

}
?>