<?php
class pageft{ 
	function getnav($totle,$displaypg=30,$url=''){
		$page 	=	isset($_GET['page']) ? intval($_GET['page']) :1;
		$totle 	=	isset($totle) ? intval($totle) :0;
		$displaypg 	=	isset($displaypg) ? intval($displaypg) :10;
		$page_len = 10;
		if($displaypg==0){$displaypg=10;}
		if(!$url){$url=$_SERVER["REQUEST_URI"];}
		$parse_url=parse_url($url);
		$url_query=$parse_url["query"]; //单独取出URL的查询字串
		if($url_query){
			$url_query=ereg_replace("(^|&)page=$page","",$url_query);
			$url=str_replace($parse_url["query"],$url_query,$url);
			if($url_query) $url.="&page"; else $url.="page";
		}else {
			$url.="?page";
		}
		//页码计算：
		$lastpg=ceil($totle/$displaypg); //最后页，也是总页数
		$page=min($lastpg,$page);
		$prepg=$page-1; //上一页
		$nextpg=($page==$lastpg ? 0 : $page+1); //下一页
		$firstcount=($page-1)*$displaypg;
		if($firstcount<0 || $firstcount == ''){$firstcount=0;}
		//开始分页导航条代码：
		//$pagenav="第 <B>".($totle?($firstcount+1):0)."</B>-<B>".min($firstcount+$displaypg,$totle)."</B> 条，共 $totle 条记录";
		//如果只有一页则跳出函数：
		if($lastpg<=1){return '';}
		//$pagenav.=" <a href='$url=1'>首页</a> ";
		if($prepg) $pagenav.=" <a href='$url=$prepg'>上一页</a> "; else $pagenav.="";
		
		//$pagenav.=" <a href='$url=$lastpg'>尾页</a> ";
		//下拉跳转列表，循环列出所有页码：
		/*$pagenav.="　到第 <select name='topage' size='1' onchange='window.location=\"$url=\"+this.value'>\n";
		for($i=1;$i<=$lastpg;$i++){
			if($i==$page){
				$pagenav.="<option value='$i' selected>$i</option>\n";
			}else{ 
				$pagenav.="<option value='$i'>$i</option>\n";
			}
		}
		$pagenav.= " </select> 页，共 $lastpg 页";*/
		//数字分页
		$max_p = $lastpg;
		$page_len  = ($page_len%2) ? $page_len : $page_len+1; //如果为偶数便+1
		$pageoffset = ($page_len-1)/2; //数字分页左右数量
		//总页数和数字分页显示数
		if($max_p > $page_len)
		{
			//数字分页左右数量大于等于当前页面，不进行偏移
			if($pageoffset >= $page)
			{
				$init = 1;
				$max_p= $page_len;
			}else{
			//当前页码+左右数量 大于总数量，不进行偏移
				if($page+$pageoffset > $max_p)
				{
					$init  = $max_p-$page_len+1;
				}else{
				//进行偏移，最左边 当前页码 - 左右数量
					$init   = $page-$pageoffset;
					$max_p = $page+$pageoffset;
				}
			}
		}
		//echo $init.'===='.$max_p;
		//循环数字分页
		for($i=$init ;$i<=$max_p;$i++)
		{
			//$i 等于 当前页码
			if($i == $page)
			{
				$pagenav .= '<span class="current">'.$i.'</span>';
			}else{
				if(!empty($i)){
				$pagenav .= " <a href='".$url."=".$i."' >".$i."</a> ";
				}
			}
		}
		if($nextpg) $pagenav.=" <a href='$url=$nextpg'>下一页</a> "; else $pagenav.="";
		return $pagenav;
	}
	
	//获得数量
	function getcount($totle,$displaypg=30,$url=''){
		$page 	=	isset($_GET['page']) ? intval($_GET['page']) :1;
		$totle 	=	isset($totle) ? intval($totle) :0;
		$displaypg 	=	isset($displaypg) ? intval($displaypg) :10;
		if($displaypg==0){$displaypg=10;}
		//===================================================
		$lastpg=ceil($totle/$displaypg); //最后页，也是总页数
		$page=min($lastpg,$page);
		$prepg=$page-1; //上一页
		$nextpg=($page==$lastpg ? 0 : $page+1); //下一页
		$firstcount=($page-1)*$displaypg;
		if($firstcount<0 || $firstcount == ''){$firstcount=0;}
		if($lastpg<=1){return 0;}
		return $firstcount;
	}

}	//end class 
?>