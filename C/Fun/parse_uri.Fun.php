<?php

//echo parse_url_join(parse_uri('blog/','http://www.sman.cn/')),'<br />';
//输出:http://www.sman.cn/blog

	function parse_uri($uri,$currentPath='',$pathSeparator='/'){
		if($uri == 'http://') $uri = '#'; 
		$arrUrl = parse_url($uri);
		if (empty($arrUrl['scheme'])||is_null($arrUrl['scheme'])){
			$arrUrlCurrent = parse_url($currentPath);
			$arrUrlCurrent['query'] = $arrUrl['query'];
			$arrUrlCurrent['fragment'] = $arrUrl['fragment'];
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
		return $arrUrlCurrent;
		
	}

	/*合并由parse_url分析的数组(没有考虑用户名密码)*/
	function parse_url_join($arr){
		$out = array();
		if (!empty($arr['scheme'])){
			array_push($out,$arr['scheme'].'://');
		}
		if (!empty($arr['host'])){
			array_push($out,$arr['host']);
		}
		if (!empty($arr['port'])){
			array_push($out,':'.$arr['port']);
		}
		if (!empty($arr['path'])){
			array_push($out,$arr['path']);
		}
		if (!empty($arr['query'])){
			array_push($out,'?'.$arr['query']);
		}
		if (!empty($arr['fragment'])){
			array_push($out,'#'.$arr['fragment']);
		}
		return implode('',$out);
	}


?>