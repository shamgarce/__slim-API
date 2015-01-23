<?php 
/*
$upload = M('uploadfile');
if(!empty($_FILES['file']['name'])) {
//==================================
				//$upload->allowExts  = array('gif', 'jpg', 'png', 'jpeg','xml');    有默认值,不用设置//设置上传文件类型
				$upload->maxSize  = 320000;                                    //设置上传文件大小
				$upload->savePath =  './data/tempfile/';                   		//设置附件上传目录
				$upload->saveRule =  'time';                				//上传文件命名规则
				if(!$upload -> upload()){ 
						echo $upload -> error;
						exit;
				}else{
						$uploadList = $upload -> getUploadFileInfo();           //取得成功上传的文件信息
						echo $uploadList['file'];
				}
//==================================
}
echo '<hr>';
*/

/**
 * 文件上传类
 */
class UploadFile { // 类定义开始
	/**
     +----------------------------------------------------------
     * 上传文件的最大值
     +----------------------------------------------------------
     * @var integer
     * @access private
     +----------------------------------------------------------
     */
	var $maxSize = -1;

	/**
     +----------------------------------------------------------
     * 是否支持多文件上传
     +----------------------------------------------------------
     * @var boolean
     * @access private
     +----------------------------------------------------------
     */
	var $supportMulti = true;

	/**
     +----------------------------------------------------------
     * 允许上传的文件后缀
     +----------------------------------------------------------
     * @var array
     * @access private
     +----------------------------------------------------------
     */
	var $allowExts = array('gif','doc','jpg','png','pdf','xml','jpeg');
	/**
     +----------------------------------------------------------
     * 允许上传的文件类型
     +----------------------------------------------------------
     * @var array
     * @access private
     +----------------------------------------------------------
     */
	var $allowTypes = array();

	/**
     +----------------------------------------------------------
     * 上传文件保存路径
     +----------------------------------------------------------
     * @var string
     * @access private
     +----------------------------------------------------------
     */
	var $savePath = '';

	/**
     +----------------------------------------------------------
     * 上传文件命名规则
     * 例如可以是 time uniqid com_create_guid 等
     * 必须是一个无需任何参数的函数名 可以使用自定义函数
     +----------------------------------------------------------
     * @var string
     * @access private
     +----------------------------------------------------------
     */
	var $saveRule = 'create_guid';

	/**
     +----------------------------------------------------------
     * 上传文件Hash规则函数名
     * 例如可以是 md5_file sha1_file 等
     +----------------------------------------------------------
     * @var string
     * @access private
     +----------------------------------------------------------
     */
	var $hashType = 'md5_file';

	/**
     +----------------------------------------------------------
     * 错误信息
     +----------------------------------------------------------
     * @var string
     * @access private
     +----------------------------------------------------------
     */
	var $error = '';
	var $nerror = 0;

	/**
     +----------------------------------------------------------
     * 上传成功的文件信息
     +----------------------------------------------------------
     * @var array
     * @access private
     +----------------------------------------------------------
     */
	var $uploadFileInfo ;

	/**
     +----------------------------------------------------------
     * 集合元素
     +----------------------------------------------------------
     * @var array
     * @access protected
     +----------------------------------------------------------
     */
	var $_elements = array();

	/**
     +----------------------------------------------------------
     * 架构函数
     * 
     +----------------------------------------------------------
     * @access public 
     +----------------------------------------------------------
     */
	function UploadFile($allowExts=array(),$allowTypes=array(),$savePath=UPLOAD_PATH,$saveRule='') {
		if($maxSize && is_numeric($maxSize)) {
			$this->maxSize = $maxSize;
		}
		if(!empty($allowExts)) {
			$this->allowExts = $allowExts;
		}
		if(!empty($allowTypes)) {
			$this->allowTypes = $allowTypes;
		}
		if(!empty($saveRule)) {
			$this->saveRule = $saveRule;
		}
		$this->savePath = $savePath;
	}

	/**
     +----------------------------------------------------------
     * 上传一个文件
     * 
     +----------------------------------------------------------
     * @access public 
     +----------------------------------------------------------
     * @param mixed $name 数据
     * @param string $value  数据表名
     +----------------------------------------------------------
     * @return string
     +----------------------------------------------------------
     * @throws FcsException
     +----------------------------------------------------------
     */
	function save($file) {
		$filename = $this->savePath.$file['savename'];
		if(!move_uploaded_file($file['tmp_name'], $filename)) {
			return false;
		}
		return true;
	}

	function add($element) {
		return (array_push($this->_elements, $element)) ? TRUE : FALSE;
	}

	/**
     +----------------------------------------------------------
     * 上传文件
     * 
     +----------------------------------------------------------
     * @access public 
     +----------------------------------------------------------
     * @param string $savePath  上传文件保存路径 
     +----------------------------------------------------------
     * @return string
     +----------------------------------------------------------
     * @throws FcsException
     +----------------------------------------------------------
     */ 


	function upload($savePath ='') {
		// 如果不指定保存文件名，则由系统默认	
		if(!empty($path)) {
			$this->savePath = $savePath;
		}
		
		// 检查上传目录
		if(!file_exists($this->savePath)) {
			$this->error  =  '上传目录不存在';
			return false;
		}else {
			if(!is_writeable($this->savePath)) {
				$this->error  =  '上传目录不可写';
                           
				return false;
			}
		}		
		$isUpload   = false;
		foreach($_FILES as $key => $file) {
			// 过滤无效的上传
			if(!empty($file['name'])) {
				// 登记上传文件的扩展信息
				$file['extension']  = $this->getExt($file['name']);
				$file['savepath']   = $this->savePath;
				$file['savename']   = $this->getSaveName($file);
                     
				if($file['error']!=0) {
					//文件上传失败
					//捕获错误代码
                                   
					$this->error($file['error']);
					return false;
				}
				//文件上传成功，进行自定义规则检查

				//检查文件大小
				if(!$this->checkSize($file['size'])) {
					$this->error = '上传文件大小不符！';
                                 
					return false;
				}

				//检查文件Mime类型
				if(!$this->checkType($file['type'])) {
					$this->error = '上传文件MIME类型不允许！';
                                       
					return false;
				}
				//检查文件类型
				if(!$this->checkExt($file['extension'])) {
					$this->error = '上传文件类型不允许';
					return false;
				}

				//检查是否合法上传
				$file['tmp_name'] = str_replace('\\\\', '\\', $file['tmp_name']);
				if(!$this->checkUpload($file['tmp_name'])) {
					$this->error = '非法上传文件！';
					return false;
				}
				//保存上传文件
				if(!$this->save($file)) {
					$this->error = $file['error'];
                                     
					return false;
				}
				if(function_exists($this->hashType)) {
					$fun =  $this->hashType;
                                   
					$file['hash']   =  $fun($file['savepath'].$file['savename']);
				}
				$file['uploadTime'] =   time();

				//上传成功后保存文件信息，供其他地方调用
				unset($file['tmp_name'],$file['error']);
				$fileInfo[$key] = $file['savename'];
				$isUpload  = true;
			}
                       
		} 
		if($isUpload) {
			$this->uploadFileInfo = $fileInfo;
			return true;
		} else {
			$this->error  =  '没有选择上传文件';
			$this->nerror = 4;
			return false;
		}
	}

	/**
     +----------------------------------------------------------
     * 获取错误代码信息
     * 
     +----------------------------------------------------------
     * @access public 
     +----------------------------------------------------------
     * @param string $errorNo  错误号码 
     +----------------------------------------------------------
     * @return void
     +----------------------------------------------------------
     * @throws FcsException
     +----------------------------------------------------------
     */
	function error($errorNo)
	{
		switch($errorNo) {
			case 1:
				$this->error = '上传的文件超过了 php.ini 中 upload_max_filesize 选项限制的值';
				break;
			case 2:
				$this->error = '上传文件的大小超过了 HTML 表单中 MAX_FILE_SIZE 选项指定的值';
				break;
			case 3:
				$this->error = '文件只有部分被上传';
				break;
			case 4:
				$this->nerror = 4;
				$this->error = '没有文件被上传';
				break;
			case 6:
				$this->error = '找不到临时文件夹';
				break;
			case 7:
				$this->error = '文件写入失败';
				break;
			default:
				$this->error = '未知上传错误！';
		}
		return ;
	}

	/**
     +----------------------------------------------------------
     * 根据上传文件命名规则取得保存文件名
     * 
     +----------------------------------------------------------
     * @access private 
     +----------------------------------------------------------
     * @param string $filename 数据
     +----------------------------------------------------------
     * @return string
     +----------------------------------------------------------
     */
	function getSaveName($filename)
	{
		$rule = $this->saveRule;
		if(empty($rule)) {//没有定义命名规则，则保持文件名不变
			$saveName = $filename['name'];
		}else {
			if(function_exists($rule)) {
				//使用函数生成一个唯一文件标识号
				$saveName = $rule();
			}else {
				//使用给定的文件名作为标识号
				$saveName = $rule;
			}

		}

		return $saveName.".".$filename['extension'];
		
	}


	/**
     +----------------------------------------------------------
     * 检查上传的文件类型是否合法
     * 
     +----------------------------------------------------------
     * @access public 
     +----------------------------------------------------------
     * @param string $type 数据
     +----------------------------------------------------------
     * @return boolean
     +----------------------------------------------------------
     */
	function checkType($type)
	{
		if(!empty($this->allowTypes)) {
			return in_array($type,$this->allowTypes);
		}
		return true;
	}


	/**
     +----------------------------------------------------------
     * 检查上传的文件类型是否合法
     * 
     +----------------------------------------------------------
     * @access public 
     +----------------------------------------------------------
     * @param string $type 数据
     +----------------------------------------------------------
     * @return boolean
     +----------------------------------------------------------
     */
	function checkExt($type)
	{
		if(!empty($this->allowExts)) {
			return in_array($type,$this->allowExts);
		}
		return true;
	}

	/**
     +----------------------------------------------------------
     * 检查文件大小是否合法
     * 
     +----------------------------------------------------------
     * @access public 
     +----------------------------------------------------------
     * @param integer $size 数据
     +----------------------------------------------------------
     * @return boolean
     +----------------------------------------------------------
     */
	function checkSize($size)
	{
		return !($size > $this->maxSize) || (-1 == $this->maxSize);
	}

	/**
     +----------------------------------------------------------
     * 检查文件是否非法提交
     * 
     +----------------------------------------------------------
     * @access public 
     +----------------------------------------------------------
     * @param integer $size 数据
     +----------------------------------------------------------
     * @return boolean
     +----------------------------------------------------------
     */
	function checkUpload($filename)
	{
          
		return is_uploaded_file($filename);
	}

	/**
     +----------------------------------------------------------
     * 取得上传文件的后缀
     * 
     +----------------------------------------------------------
     * @access protected 
     +----------------------------------------------------------
     * @param integer $size 数据
     +----------------------------------------------------------
     * @return boolean
     +----------------------------------------------------------
     */
	function getExt($filename)
	{
		$pathinfo = pathinfo($filename);
		return $pathinfo['extension'];
	}

	/**
     +----------------------------------------------------------
     * 取得上传文件的信息
     * 
     +----------------------------------------------------------
     * @access public 
     +----------------------------------------------------------
     * @return array
     +----------------------------------------------------------
     */
	function getUploadFileInfo()
	{
		return $this->uploadFileInfo;
	}

	/**
     +----------------------------------------------------------
     * 取得最后一次错误信息
     * 
     +----------------------------------------------------------
     * @access public 
     +----------------------------------------------------------
     * @return string
     +----------------------------------------------------------
     */
	function getErrorMsg()
	{
		return $this->error;
	}
	function str()
	{
		return 'asdfadsf';
	}
	

}//类定义结束
?>