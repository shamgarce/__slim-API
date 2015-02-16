<?php
$_W['_file'][] = __FILE__;
//主类
class AppBase {
	
	//==============================================================
	public function ButtomDebug(){}				
	public function AppModuleRun(){}			
	
	public function assign($var, $value = ''){
		$this->View->assign($var, $value); 
	}
	
	public function display($file='',$mobanid = ''){
		$this->assign('rs',$this->rs);
		$this->ButtomDebug();
		global $_W;
		$file = !empty($file)?$file:$_W['a'].'.htm';

		$this->View->display($file,$mobanid); 
	}
	
	public function fetch($file='',$mobanid = ''){
		global $_W;
		$file = !empty($file)?$file:$_W['a'].'.htm';
		return $this->View->fetch($file,$mobanid); 
	}
	
}
?>