<?php

class Cdb {

    var $mongo;

    var $curr_db_name;
    var $curr_table_name;
    var $error;

    public function __construct($mongo_server, $connect=true, $auto_balance=true)
    {
        $this->S = new Set();		//里面包含系列的单例对象
    }

    public function insert($tablename,$arr)
    {
        $curr_table_name = $this->curr_table_name = $tablename;
        try {

            $this->mongo->$dbname->$table_name->insert($record, array('safe'=>true));
            return true;
        }
        catch (MongoCursorException $e)
        {
            $this->error = $e->getMessage();
            return false;
        }
    }

    public function test()
    {
        $rc = $this->S->db->getall("select * from dy_user");
        print_r($rc);
        echo 123;
        return 1;
    }


}