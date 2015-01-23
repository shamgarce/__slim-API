<?php
/*
* 名称：CnkknDPHPLogin Class
* 描述：PHP用于登录的类，基于MySQL
* 作者：Daniel King，cnkknd@msn.com
* 日期：Start@2003/8/25，Update@2004/4/16
*/

class PW{
	var $c = "";
	var $a = "";
	
	//-------------------------------------------------

	function P(){
		//监测,CA是否能通过权限监测
	}

	function D(){		//debug
		echo '<br>',$_GET['c'];
		echo '<br>',$_GET['a'];
		echo '<br>',$this->c;
		echo '<br>',$this->a;
		
	}

}
?>