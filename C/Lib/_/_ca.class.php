<?php
/**
 * IN('ca');
 * $rc2 = ca::fc($rc);			显示分类类表
 * $rc2 = ca::fd($rc);			显示上级分类的展现形式
*/
abstract class ca {
	//========================================================
	function fd($rc){
		foreach($rc as $k=>$v){				//循环获取所属栏目名
			$rc[$k]['fdname'] = self::getfdname2($v,$rc);
		}
		$rc = self::getsort($rc,0);				//排序完毕
		$rc = self::getbasechr($rc,1);				//获取根目录的chr/并且完善fdname
		return $rc;
	}

	function getfdname2($v,$rc,$str =''){
		if($v['id_pre'] == 0){		return '-> '.$v['dname'];	}
		$str = self::getfdname2($rc[$v['id_pre']],$rc,$str).' -> '.$v['dname'];
		//====================================================
		//返回
		return $str;
	}
	//========================================================
	//列表
	//========================================================
	

	//========================================================
	//列表
	//========================================================
	function fc($rc){
		foreach($rc as $k=>$v){				//循环获取排序名[循环递归]
			$rc[$k]['fdname'] = self::getfdname($v,$rc);
		}
		$rc = self::getsort($rc,0);				//排序完毕
		$rc = self::getbasechr($rc);			//获取根目录的chr/并且完善fdname
		return $rc;
	}
	
	function getfdname($v,$rc,$str =''){
		if($v['id_pre'] == 0){		return $str;	}
		if($rc[$v['id_pre']]['id_pre'] == 0){
			$str.= '┗━';
			return self::getfdname($rc[$v['id_pre']],$rc,$str);
		}
		$str.= '　　';
		return self::getfdname($rc[$v['id_pre']],$rc,$str);
	}
	
	function getbasechr_______________________________________($rc){				//获取顶级栏目的chr,并且完善fdname
		foreach($rc as $k=>$v){
			$rc[$k]['fdname'] =$rc[$k]['fdname'].$rc[$k]['dname'];
			 if($v['id_pre'] == 0) $vasechr = $v['dchr'];
			$rc[$k]['basechr'] = $vasechr;
			//=========================================================
			if($v['id_pre'] == 0){
				$rc[$k]['basepatht'] ='/'.$rc[$k]['dchr'].'/';
				if($v['id_pre'] == 0) $mcccid = $v['id'];
			}else{ 
				$rc[$k]['basepatht'] =($rc[$k]['basepath']==0)?'/'.$rc[$k]['dchr'].'/':'/'.$rc[$k]['basechr'].'/'.$rc[$k]['dchr'].'/';
			}
			//=========================================================
			$rc[$k]['idmast'] = $mcccid;		//所属的顶级ID
		}
		return $rc;
	}
	
	function getsort($rc,$cid=0,$newarr = array()){
		//排序,生成一个新的数组
		foreach($rc as $k=>$v){
			if($v['id_pre']==$cid){
				$newarr[$v['id']] = $rc[$v['id']];
				$newarr = self::getsort($rc,$v['id'],$newarr);
				$flag = true;
			}
		}
		return $newarr;
	}
	//========================================================
	function getbasechr($rc,$f=0){
		foreach($rc as $k=>$v){
			if($f){	//fd
				$rc[$k]['fdname'] =$rc[$k]['fdname'];//.$rc[$k]['dname'];
			}else{	//fc
				$rc[$k]['fdname'] =$rc[$k]['fdname'].$rc[$k]['dname'];
			}
			
			if($v['id_pre'] == 0){
				$vasechr = $v['dchr'];						//之前
				$baseroot 		= $v['dchr'].'/';
				$baserootsec	= '';
				$baserootid 	= $v['id'];
			}
			$rc[$k]['baseroot'] = $baseroot;
			//=========================================================
			if($v['id_pre'] == 0){
				$rc[$k]['basepatht'] = '';
			}else{
				if($rc[$k]['basepath']==0){
					if(empty($baserootsec))$baserootsec = $rc[$k]['dchr'].'/';
					$rc[$k]['basepatht'] = $rc[$k]['dchr'].'/';
				}else{
					if(empty($baserootsec))$baserootsec = '/'.$rc[$k]['dchr'].'/';
					$rc[$k]['basepatht'] = $baserootsec.$rc[$k]['dchr'].'/';
				}
				//$rc[$k]['basepatht'] =($rc[$k]['basepath']==0)?'/'.$rc[$k]['dchr'].'/':'/'.$rc[$k]['basechr'].'/'.$rc[$k]['dchr'].'/';
			}
			//=========================================================
			$rc[$k]['idmast'] = $baserootid;		//所属的顶级ID
		}
		return $rc;
	}
	//========================================================
}
?>