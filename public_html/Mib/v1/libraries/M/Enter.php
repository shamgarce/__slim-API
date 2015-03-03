<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Enter
{
    private $tmp = array();
    private $route = array();
    private $db = null;
    private $params = array();
    private $data = array();
    private $CI = null;

    public function __construct($params)    //$params 是路由参数
    {
        $this->CI =& get_instance();
        $this->params = $params;
        $this->tmp['timestamp_'] = $this->CI->T();
        //$sign //参数是签名
    }

    /*
     * 1 : 接口   /   注册用户    //接口 [adduser]
     * 输入
     * {
       "username":"ASDASDFASDF",
       "password":"wangjun1"
       }
    返回
    {
    "code":"200",
    "msg":"succeed",
    }
    */
    public function adduser($sign = array())
    {
        /*
         * 1 : 用户名是否已经存在
         * 2 : 长度
         * */
        $username = $this->CI->input->post('username');
        $password = $this->CI->input->post('password');
        //====================================================
        $_march = '/[^A-Za-z0-9]/';             //如果发现字母数字意外的字符 报错
        if(preg_match($_march, $username)) {
            $this->J(-200, '用户名非法，请重新输入正确的用户名');
        }

        if(preg_match($_march, $password)) {
            $this->J(-200, '密码非法，请重新输入正确的密码');
        }

        $ulen = strlen($username);
        $upwd = strlen($password);
        if($ulen<4 || $ulen >16){
            $this->J(-200, '用户名长度非法');
        }

        if($upwd<4){
            $this->J(-200, '密码长度非法');

        }


        //该用户已经存在
        $sql = "select count(*) from dy_user where user_login = '$username'";
        $count = $this->CI->db->getone($sql);
        if($count != 0){
            $this->J(-200, '该用户已经存在');
        }

        //===============================================================
        //添加用户操作
        $mc['user_login']   = $username;
        //$mc['user_password']= MD5($password.$sign['salt']);
        $mc['user_password']= $password;
        $mc['open_id']      = substr(MD5($username.'_'.$sign['salt'].'_'.$this->CI->T()),8,16);                //计算生成一个  唯一
        $mc['enable']       = 1;
        $mc['f_regtime']    = time();
        $this->CI->db->autoexecute('dy_user',$mc,'INSERT');

        $this->J(200, 'succeed');
    }

    /*
        *  罚单app登录 [login]
    模块 :登录模块
    说明 :本接口能够实现登录功能
    参数 :"username":用户名，"password":密码
    成功 :登陆成功"code"的返回值为"200"
    失败 :返回值待定     *
         *
    提交 :
    {
    "username":"zhangbo",
    "password":"zhangbo"
    }
    返回 :
    {
    "code":"200",
    "msg":"succeed",
    }     *
    * */
    public function login($sign = array())
    {
        $username = $this->CI->input->post('username');
        $password = $this->CI->input->post('password');

        $_march = '/[^A-Za-z0-9]/';             //如果发现字母数字意外的字符 报错
        if(preg_match($_march, $username)) {
            $this->J(-200, '用户名非法，请重新输入正确的用户名');
        }

        $sql = "select * from dy_user where user_login = '$username'";
        $row = $this->CI->db->getrow($sql);

        if(empty($row)){
            $this->J(-200, '该用户不存在');
        }
        if($row['enable'] ==0){
            $this->J(-200, '不是有效用户');
        }
//        if($row['user_password'] != MD5($password.$sign['salt'])){
//            $this->J(-200, '密码错误');
//        }
        if($row['user_password'] != $password){
            $this->J(-200, '密码错误');
        }

        //================================================================
        $mc['f_logintime'] = $this->CI->T();




        $this->J(200, 'succeed');
    }


    /*
     * 接口 : 上传抽样单    [enter/uploading]
     * 录入模块中的上传模块，将抽样单中的所有信息通过json串上传，
     * 上传成功后code返回200，上传失败返回505。
     * 提交
     * {
    "phaForm": [
        {   "SampleFormNumber": "58",
        "checkDepartment": {
            "checkDepartment": "天津报验",
            "checkDepartmentHandler": "小天报",
            "checkDepartmentPhone": "120"
        },
        "labelCheck": {
            "lotNumber": true,
            "number": true,
            "others": "679797",
            "packageGuiGe": true,
            "pharmaceuticalName": true,
            "productDepartment": true,
            "registerNumber": true,
            "specification": true,
            "unitsNumber": true,
            "validityPeriod": true
        },
        "packageCondition": {
            "inPackageMaterial": "6487788",
            "outPackage": "4878874",
            "outPackageMaterial": "67878787",
            "sealing": "4678878"
        },
        "pharmaceuticalInforamation": {
            "checkInformNumber": "76794679",
            "chineseName": "8767464",
            "compactNumber": "79797",
            "doseModel": "467678",
            "englishName": "748786",
            "lotNumber": "64788787",
            "pharmaceuticalName": "4678789",
            "productDepartment": "4679788",
            "productRegion": "467687676",
            "registerNumber": "858467",
            "specification": "4667878",
            "storeConditionl": "878888674",
            "validityPeriod": "76787"
        },
        "sampleCondition": {
            "checkNumber": "469494",
            "simpleConditionList": [
                {
                    "one": "1",
                    "three": "1",
                    "two": "1",
                    "xianghao": "1",
                    "xuhao": "1"
                },
                {
                    "one": "2",
                    "three": "2",
                    "two": "2",
                    "xianghao": "2",
                    "xuhao": "2"
                },
                {
                    "one": "3",
                    "three": "3",
                    "two": "3",
                    "xianghao": "3",
                    "xuhao": "3"
                },
                {}
            ],
            "simpleIncludeMaterial": "678786",
            "simpleNumber": "18",
            "simpleUnit": "7697979",
            "simpleUnitsNumber": "3"
        },
        "sampleSpot": {
            "simplePlace": "467678",
            "storeHnmidity": "46787887",
            "storePlace": "34648784",
            "storeTemperature": "467587"
        },
        "simpleDepartment": {
            "simpleDate": "464979",
            "simpleDepartment": "北京抽样",
            "simpleDepartmentHandler": "小北抽",
            "simpleDepartmentList": [
                {
                    "jingshouren": "小北抽",
                    "mima": "649797",
                    "xuhao": "1"
                },
                {
                    "jingshouren": "小北抽",
                    "mima": "6497979",
                    "xuhao": "2"
                },
                {
                    "jingshouren": "小北抽"
                }
            ],
            "simpleDepartmentPhone": "101"
        }      }
    ]
}
     *返回    { "code":"200","msg":"succeed","data":{"name":"name"}}
     * */
    public function uploading($sign = array())
    {
//          $phaForm = $_POST['phaForm'];
//          print_r($phaForm);
//          exit;

        $res['nam1e'] = 'nam2e';
        $this->data($res);
        $this->J(200, 'succeed');
    }

    /*
     *  上传预定 [enter/book/]
     *  模块 : 抽样单号管理
        说明 : 本接口为上传预定的接口;
        参数 : 为要预定的抽样单号的数量;
        成功 : code返回200并且在data数组中返回所预定的抽样单号号码
        失败 : 预定失败则返回506.
     * ========================================================
     * 输入
     *{
        "count":2
        }
     * ========================================================
     * 输出
     * {
        "code":"200",
        "msg":"succeed",
        "data":["1222121","3543434"]
        }
     */
    public function book($sign = array())
    {
        $count = intval($_POST['count']);



        $res[] = '1222121';
        $res[] = '3543434';
        $this->data($res);
        $this->J(200, 'succeed');
    }

    /*
    *  返回本地剩余的抽样单号 [enter/chexiao]
     *
       模块 :录入
       说明 :录入模块中的撤销功能，此功能会把手机端数据库中没有用过的抽样单号返回给数据库。
       参数 :SimpleNumber
       成功 :"code"的值为200
       失败 :“code”的值为507
     * 提交 :
       {
           "SimpleNumber":[]
       }
     * 返回 :
       {
       "code":"200",
       "data":[],
       "msg":"succeed"
       }
     */
    public function chexiao($sign = array())
    {

        $this->J(200, 'succeed');
    }


    /*
    *  抽样号检索 [search/simplenumber]
        模块 :检索模块中的抽样单号检索
        说明 :此接口用于实现在服务器上根据抽样单号
        参数 :"phaSimpleNumber":要查询的抽样单号
        成功 :查询成功"code"返回200，同时"data"中带有查询到的抽样单表的信息
        失败 :查询失败"code"返回508
     * 输入
     * {
        "phaSimpleNumber":"1312122"
        }
     * 输出
{
"code":"200",
"msg":"succeed",
"data":[{
"SampleFormNumber": "58",
        "checkDepartment": {
            "checkDepartment": "天津报验",
            "checkDepartmentHandler": "小天报",
            "checkDepartmentPhone": "120"
        },
        "labelCheck": {
            "lotNumber": true,
            "number": true,
            "others": "679797",
            "packageGuiGe": true,
            "pharmaceuticalName": true,
            "productDepartment": true,
            "registerNumber": true,
            "specification": true,
            "unitsNumber": true,
            "validityPeriod": true
        },
        "packageCondition": {
            "inPackageMaterial": "6487788",
            "outPackage": "4878874",
            "outPackageMaterial": "67878787",
            "sealing": "4678878"
        },
        "pharmaceuticalInforamation": {
            "checkInformNumber": "76794679",
            "chineseName": "8767464",
            "compactNumber": "79797",
            "doseModel": "467678",
            "englishName": "748786",
            "lotNumber": "64788787",
            "pharmaceuticalName": "4678789",
            "productDepartment": "4679788",
            "productRegion": "467687676",
            "registerNumber": "858467",
            "specification": "4667878",
            "storeConditionl": "878888674",
            "validityPeriod": "76787"
        },
        "sampleCondition": {
            "checkNumber": "469494",
            "simpleConditionList": [
                {
                    "one": "1",
                    "three": "1",
                    "two": "1",
                    "xianghao": "1",
                    "xuhao": "1"
                },
                {
                    "one": "2",
                    "three": "2",
                    "two": "2",
                    "xianghao": "2",
                    "xuhao": "2"
                },
                {
                    "one": "3",
                    "three": "3",
                    "two": "3",
                    "xianghao": "3",
                    "xuhao": "3"
                },
                {}
            ],
            "simpleIncludeMaterial": "678786",
            "simpleNumber": "18",
            "simpleUnit": "7697979",
            "simpleUnitsNumber": "3"
        },
        "sampleSpot": {
            "simplePlace": "467678",
            "storeHnmidity": "46787887",
            "storePlace": "34648784",
            "storeTemperature": "467587"
        },
        "simpleDepartment": {
            "simpleDate": "464979",
            "simpleDepartment": "北京抽样",
            "simpleDepartmentHandler": "小北抽",
            "simpleDepartmentList": [
                {
                    "jingshouren": "小北抽",
                    "mima": "649797",
                    "xuhao": "1"
                },
                {
                    "jingshouren": "小北抽",
                    "mima": "6497979",
                    "xuhao": "2"
                },
                {
                    "jingshouren": "小北抽"
                }
            ],
            "simpleDepartmentPhone": "101"
        }
    }]
}
    */
    public function simplenumber($sign = array())
    {
        $res[] = '1222121';
        $res[] = '3543434';


        $this->data($res);
        $this->J(200, 'succeed');
    }


    /*
    *  当天被抽样单位检索 [search/todaysearch]
     *
        模块 :检索模块中的当天被抽样单位检索
        说明 :此接口用于实现检索模块中的当天被抽样单位检索功能
        参数 :"simpledepartment":被抽样单位，"simpledate":抽样日期
        成功 :查询成功，"code"的值返回"200",同时"data"数组中携带查询到的抽样单表信息
        失败 :查询失败，"code"的值返回"509"。
         *
提交 :
{
"simpledepartment":"tianjinchouyang",
"simpledate":"2015-02-12"
}
     *
{
"code":"200",
"msg":"succeed",
"data":[{
    "SampleFormNumber": "58",
        "checkDepartment": {
            "checkDepartment": "天津报验",
            "checkDepartmentHandler": "小天报",
            "checkDepartmentPhone": "120"
        },
        "labelCheck": {
            "lotNumber": true,
            "number": true,
            "others": "679797",
            "packageGuiGe": true,
            "pharmaceuticalName": true,
            "productDepartment": true,
            "registerNumber": true,
            "specification": true,
            "unitsNumber": true,
            "validityPeriod": true
        },
        "packageCondition": {
            "inPackageMaterial": "6487788",
            "outPackage": "4878874",
            "outPackageMaterial": "67878787",
            "sealing": "4678878"
        },
        "pharmaceuticalInforamation": {
            "checkInformNumber": "76794679",
            "chineseName": "8767464",
            "compactNumber": "79797",
            "doseModel": "467678",
            "englishName": "748786",
            "lotNumber": "64788787",
            "pharmaceuticalName": "4678789",
            "productDepartment": "4679788",
            "productRegion": "467687676",
            "registerNumber": "858467",
            "specification": "4667878",
            "storeConditionl": "878888674",
            "validityPeriod": "76787"
        },
        "sampleCondition": {
            "checkNumber": "469494",
            "simpleConditionList": [
                {
                    "one": "1",
                    "three": "1",
                    "two": "1",
                    "xianghao": "1",
                    "xuhao": "1"
                },
                {
                    "one": "2",
                    "three": "2",
                    "two": "2",
                    "xianghao": "2",
                    "xuhao": "2"
                },
                {
                    "one": "3",
                    "three": "3",
                    "two": "3",
                    "xianghao": "3",
                    "xuhao": "3"
                },
                {}
            ],
            "simpleIncludeMaterial": "678786",
            "simpleNumber": "18",
            "simpleUnit": "7697979",
            "simpleUnitsNumber": "3"
        },
        "sampleSpot": {
            "simplePlace": "467678",
            "storeHnmidity": "46787887",
            "storePlace": "34648784",
            "storeTemperature": "467587"
        },
        "simpleDepartment": {
            "simpleDate": "464979",
            "simpleDepartment": "北京抽样",
            "simpleDepartmentHandler": "小北抽",
            "simpleDepartmentList": [
                {
                    "jingshouren": "小北抽",
                    "mima": "649797",
                    "xuhao": "1"
                },
                {
                    "jingshouren": "小北抽",
                    "mima": "6497979",
                    "xuhao": "2"
                },
                {
                    "jingshouren": "小北抽"
                }
            ],
            "simpleDepartmentPhone": "101"
        }
}]
}     *
     *
    */
    public function todaysearch($sign = array())
    {

    }

    /*
    *  抽样单位检索 [search/simpledepartment]
模块 :检索模块中的抽样单位检索
说明 :本接口能够实现检索模块中的抽样单位检索功能
参数 :"startDate":开始日期,"endDate":终止日期,"simpleName":检品名称
成功 :查询成功，"code"的返回值为200，并且在"data"数组中有返回的抽样单表信息
失败 :查询失败，"code"的返回值为510。     *
     *
提交 :

{
"startDate":"2015-01-11",
"endDate":"2015-02-28",
"simpleName":"wahaha"
}
     *
返回 :

{
"code":"200",
"msg":"succeed",
"data":[{
"SampleFormNumber": "58",
        "checkDepartment": {
            "checkDepartment": "天津报验",
            "checkDepartmentHandler": "小天报",
            "checkDepartmentPhone": "120"
        },
        "labelCheck": {
            "lotNumber": true,
            "number": true,
            "others": "679797",
            "packageGuiGe": true,
            "pharmaceuticalName": true,
            "productDepartment": true,
            "registerNumber": true,
            "specification": true,
            "unitsNumber": true,
            "validityPeriod": true
        },
        "packageCondition": {
            "inPackageMaterial": "6487788",
            "outPackage": "4878874",
            "outPackageMaterial": "67878787",
            "sealing": "4678878"
        },
        "pharmaceuticalInforamation": {
            "checkInformNumber": "76794679",
            "chineseName": "8767464",
            "compactNumber": "79797",
            "doseModel": "467678",
            "englishName": "748786",
            "lotNumber": "64788787",
            "pharmaceuticalName": "4678789",
            "productDepartment": "4679788",
            "productRegion": "467687676",
            "registerNumber": "858467",
            "specification": "4667878",
            "storeConditionl": "878888674",
            "validityPeriod": "76787"
        },
        "sampleCondition": {
            "checkNumber": "469494",
            "simpleConditionList": [
                {
                    "one": "1",
                    "three": "1",
                    "two": "1",
                    "xianghao": "1",
                    "xuhao": "1"
                },
                {
                    "one": "2",
                    "three": "2",
                    "two": "2",
                    "xianghao": "2",
                    "xuhao": "2"
                },
                {
                    "one": "3",
                    "three": "3",
                    "two": "3",
                    "xianghao": "3",
                    "xuhao": "3"
                },
                {}
            ],
            "simpleIncludeMaterial": "678786",
            "simpleNumber": "18",
            "simpleUnit": "7697979",
            "simpleUnitsNumber": "3"
        },
        "sampleSpot": {
            "simplePlace": "467678",
            "storeHnmidity": "46787887",
            "storePlace": "34648784",
            "storeTemperature": "467587"
        },
        "simpleDepartment": {
            "simpleDate": "464979",
            "simpleDepartment": "北京抽样",
            "simpleDepartmentHandler": "小北抽",
            "simpleDepartmentList": [
                {
                    "jingshouren": "小北抽",
                    "mima": "649797",
                    "xuhao": "1"
                },
                {
                    "jingshouren": "小北抽",
                    "mima": "6497979",
                    "xuhao": "2"
                },
                {
                    "jingshouren": "小北抽"
                }
            ],
            "simpleDepartmentPhone": "101"
        }
}]
}
    */
    public function simpledepartment($sign = array())
    {

    }










    /**********************************************************************
    /**********************************************************************
    /**********************************************************************
    /**********************************************************************
    /**********************************************************************
    /**********************************************************************
    /**********************************************************************
    /**********************************************************************
    /**********************************************************************
    /**********************************************************************
    /**********************************************************************
    /**********************************************************************
     *
     * */
    private function data($data)
    {
        $this->data['data'] = $data;
    }

    private function msg($msg = '')
    {
        $this->data['msg'] = $msg;
    }

    private function code($code = '')
    {
        $code = intval($code);
        $this->data['code'] = $code;
    }

    public function D($code = 0, $data)
    {
        $code = intval($code);
        if (!empty($code)) $this->data['code'] = $code;
        $this->data['data'] = $data;
        $this->data['timestamp_'] = $this->tmp['timestamp_'];
        $this->data['timestamp'] = $this->CI->T();
        $this->data['debugpath'] = 'Enter';
        echo json_encode($this->data);
        exit;
    }

    public function J($code=0,$msg='')
    {
        $code = intval($code);
        if(!empty($code))  $this->data['code'] = $code;
        if(!empty($msg))   $this->data['msg']  = $msg;
        $this->data['timestamp_'] = $this->tmp['timestamp_'];
        $this->data['timestamp']  = $this->CI->T();
        $this->data['debugpath']  = 'Enter';
        echo json_encode($this->data);
        exit;
    }

    public function test($sign=array())
    {
        $params = $sign['params'];
        print_r($params);
//array_shift($params);
//array_pop()
//array_push()
//array_unshift()
//array_shift()
        exit;
    }

    //魔术
    public function __call($name,$arguments) {
        echo $name;
        print_r($arguments);
        exit;
    }

}