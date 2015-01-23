<?php
class dic {
	
	/*
	getcity		获取城市
	getxb		性别
	gethd		//活动
	getbm		部门
	getks		科室
	getly		来源 -> 只有竞价 优化,实用性不高
	getgj		经常更新的轨迹信息
	getym		域名
	getbz		病种 双结构
	gettr		来源 规定的来源
	
	getbzp		病种 双结构
	getcityp	双结构
	gettrp		双结构
	*/
	
	public function refresh(){			//更新dic缓存
		$sql[] = "select id,trname,pre_id from sy_dic_trace order by id";			//两层结构
		$sql[] = "select bzid,bzname,preid from sy_dic_bingzhong order by bzid";			//两层结构
		$sql[] = "select id,name,parentid from city order by id";
		$sql[] = "select acid,acname from sy_dic_activity";
		$sql[] = "select bmid,bmname from sy_dic_bm";
		$sql[] = "select ksid,ksname from sy_dic_keshi";
		$sql[] = "select lyid,lyname from sy_dic_laiyuan";
		$sql[] = "select id,gjname from sy_dic_trace_guiji";
		$sql[] = "select ymid,ymname from sy_dic_ym";
		foreach($sql as $value){
			$this->db->lifetime = 1;
			$this->db->getall($value);
			$this->db->getmap($value);
		}
		return true;
	}

	public function get(){						//获取所有的数据
		$res['city'] = $this->getcity();
		$res['xb'] = $this->getxb();
		$res['hd'] = $this->gethd();
		$res['bm'] = $this->getbm();
//		$res['ks'] = $this->getks();
///		$res['ly'] = $this->getly();
//		$res['gj'] = $this->getgj();
//		$res['ym'] = $this->getym();
		$res['bz'] = $this->getbz();
		$res['tr'] = $this->gettr();
		$res['ys'] = $this->getys();
		$res['user'] = $this->getuser();
//		$res['comm'] = $this->getcomm();
		//print_r($res['city']);
		return $res;
	}	


	public function getcomm(){
		$sql = "select type,name from sy_dic_comm";
		$this->db->lifetime = 1*60*60;
		$res = $this->db->getmap($sql);
		//========================================================		
		$this->db->lifetime = 0;
		return $res;
	}
	
	public function getys($states=0){
		//获取医生	1/获取有效    空/所有
		if($states==1){
			//$sql = "select ysid,ysname from sy_dic_yisheng where states = 1";
			$sql = "SELECT id,u_name FROM `sy_user` WHERE  `u_department` = 11 and u_delete =1 ";
		}else{
			//$sql = "select ysid,ysname from sy_dic_yisheng";
			$sql = "SELECT id,u_name FROM `sy_user` WHERE  `u_department` = 11";
		}
		$this->db->lifetime = 10;
		$res = $this->db->getmap($sql);
		//========================================================		
		$this->db->lifetime = 0;
		return $res;
	}
	
	public function getuser(){
		$sql = "select id,u_name from sy_user";
		$this->db->lifetime = 10;
		$res = $this->db->getmap($sql);
		//========================================================		
		$this->db->lifetime = 0;
		return $res;
	}
	
	public function getcityname(){
		$sql = "select id,name from city order by id";
		$this->db->lifetime = 1*60*60;
		$res = $this->db->getmap($sql);
		return $res;
	}		
	
	public function getcity(){//城市
		$sql = "select id,name,parentid from city order by id";
		$this->db->lifetime = 1*60*60;
		$bz_ = $this->db->getall($sql);
		foreach($bz_ as $key=>$value){
			if($value['parentid'] == 0){
				$bz__[$value['id']] = $value['name'];
			}
		}
		foreach($bz__ as $key=>$value){
			foreach($bz_ as $key2=>$value2){
				if($key == $value2['parentid']){
					$bz__[$value2['id']] = $value.' -> '.$value2['name'];
				}
			}			
		}		
		$res = $bz__;
		$this->db->lifetime = 0;
		return $res;
	}	
	public function getxb(){//性别
		$res[] = '无';
		$res[1] = '男';
		$res[2] = '女';
		return $res;
	}
		
	public function gethd($states = 0){		//获取活动信息
		if($states ==1){
			$sql = "select acid,acname from sy_dic_activity where states =1";
		}else{
			$sql = "select acid,acname from sy_dic_activity";
		}
		$this->db->lifetime = 1*60*60;
		$res = $this->db->getmap($sql);
		//========================================================		
		$this->db->lifetime = 0;
		return $res;
	}
	public function getbm($states = 0){
		if($states ==1){
			$sql = "select bmid,bmname from sy_dic_bm where states =1";
		}else{
			$sql = "select bmid,bmname from sy_dic_bm";
		}
		$this->db->lifetime = 1*60*60;
		$res = $this->db->getmap($sql);
		//========================================================		
		$this->db->lifetime = 0;
		return $res;
	}

	public function getym($states=0){
		$sql = "select ymid,ymname from sy_dic_ym";
		$this->db->lifetime = 1*60*60;
		$res = $this->db->getmap($sql);
		//========================================================		
		$this->db->lifetime = 0;
		return $res;
	}

	public function getbzname($states=0){
		$sql = "select bzid,bzname from sy_dic_bingzhong";
		$this->db->lifetime = 1*60*60;
		$res = $this->db->getmap($sql);
		return $res;
	}
	
	public function getbz($states=0){
		//========================================================
		//病种处理
		$sql = "select bzid,bzname,preid from sy_dic_bingzhong order by bzid";			//两层结构
		$this->db->lifetime = 1*60*60;
		$bz_ = $this->db->getall($sql);
		foreach($bz_ as $key=>$value){
			if($value['preid'] == 0){
				$bz__[$value['bzid']] = $value['bzname'];
			}
		}
		foreach($bz__ as $key=>$value){
			foreach($bz_ as $key2=>$value2){
				if($key == $value2['preid']){
					$bz__[$value2['bzid']] = $value.' -> '.$value2['bzname'];
				}
			}			
		}
		//病种处理结束
		//========================================================		
		$res = $bz__;
		$this->db->lifetime = 0;
		return $res;
	}
	
	public function gettrname($states=0){
		if($states ==1){
			$sql = "select id,trname,pre_id from sy_dic_trace where states =1 order by id";			//两层结构
		}else{
			$sql = "select id,trname,pre_id from sy_dic_trace order by id";			//两层结构
		}
		$sql = "select id,trname from sy_dic_trace";			//两层结构
		$this->db->lifetime = 1*60*60;
		$res = $this->db->getmap($sql);
		return $res;
	}
	
	public function gettr($states=0){
		//========================================================
		//病种处理
		if($states ==1){
			$sql = "select id,trname,pre_id from sy_dic_trace where states =1 order by id";			//两层结构
		}else{
			$sql = "select id,trname,pre_id from sy_dic_trace order by id";			//两层结构
		}
		$this->db->lifetime = 1*60*60;
		$bz_ = $this->db->getall($sql);
		foreach($bz_ as $key=>$value){
			if($value['pre_id'] == 0){
				$bz__[$value['id']] = $value['trname'];
			}
		}
		foreach($bz__ as $key=>$value){
			foreach($bz_ as $key2=>$value2){
				if($key == $value2['pre_id']){
					$bz__[$value2['id']] = $value.' -> '.$value2['trname'];
				}
			}			
		}
		//病种处理结束
		//========================================================		
		$res = $bz__;
		$this->db->lifetime = 0;
		return $res;
	}	

	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	public function getks($states=0){
		$sql = "select ksid,ksname from sy_dic_keshi";
		$this->db->lifetime = 30*24*60*60;
		$res = $this->db->getmap($sql);
		//========================================================		
		$this->db->lifetime = 0;
		return $res;
	}
	public function getly($states=0){
		$sql = "select lyid,lyname from sy_dic_laiyuan";
		$this->db->lifetime = 30*24*60*60;
		$res = $this->db->getmap($sql);
		//========================================================		
		$this->db->lifetime = 0;
		return $res;
	}
	public function getgj($states=0){
		$sql = "select id,gjname from sy_dic_trace_guiji";
		$this->db->lifetime = 30*24*60*60;
		$res = $this->db->getmap($sql);
		//========================================================		
		$this->db->lifetime = 0;
		return $res;
	}	
	
	
	
	
}
?>