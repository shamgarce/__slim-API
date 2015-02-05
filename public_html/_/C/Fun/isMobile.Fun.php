<?
/** *程  序：iswap.php判断是否是通过手机访问
*版  本：Ver 1.0 beta
*修  改：奇迹方舟(imiku.com)
*最后更新：2010.11.4 22:56
*程序返回：@return bool 是否是移动设备
*该程序可以任意传播和修改，但是请保留以上版权信息!
*/
function isMobile() {
	// 如果有HTTP_X_WAP_PROFILE则一定是移动设备
	if (isset ($_SERVER['HTTP_X_WAP_PROFILE'])) {
		return true;
	}
	//如果via信息含有wap则一定是移动设备,部分服务商会屏蔽该信息
	if (isset ($_SERVER['HTTP_VIA'])) {
	//找不到为flase,否则为true
		return stristr($_SERVER['HTTP_VIA'], "wap") ? true : false;
	}
	//脑残法，判断手机发送的客户端标志,兼容性有待提高
	if (isset ($_SERVER['HTTP_USER_AGENT'])) {
		$clientkeywords = array (
		'nokia',
		'sony',
		'ericsson',
		'mot',
		'samsung',
		'htc',
		'sgh',
		'lg',
		'sharp',
		'sie-',
		'philips',
		'panasonic',
		'alcatel',
		'lenovo',
		'iphone',
		'ipod',
		'blackberry',
		'meizu',
		'android',
		'netfront',
		'symbian',
		'ucweb',
		'windowsce',
		'palm',
		'operamini',
		'operamobi',
		'openwave',
		'nexusone',
		'cldc',
		'midp',
		'wap',
		'mobile'
		);
		// 从HTTP_USER_AGENT中查找手机浏览器的关键字
		if (preg_match("/(" . implode('|', $clientkeywords) . ")/i", strtolower($_SERVER['HTTP_USER_AGENT']))) {
			return true;
		}
	}
		//协议法，因为有可能不准确，放到最后判断
		if (isset ($_SERVER['HTTP_ACCEPT'])) {
		// 如果只支持wml并且不支持html那一定是移动设备
		// 如果支持wml和html但是wml在html之前则是移动设备
			if ((strpos($_SERVER['HTTP_ACCEPT'], 'vnd.wap.wml') !== false) && (strpos($_SERVER['HTTP_ACCEPT'], 'text/html') === false || (strpos($_SERVER['HTTP_ACCEPT'], 'vnd.wap.wml') < strpos($_SERVER['HTTP_ACCEPT'], 'text/html')))) {
				return true;
			}
		}
	return false;
}
?>