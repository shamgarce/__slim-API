<?php

class Sham_cdb {

    public $mongo;
    public $curr_db_name;
    public $curr_table_name;
    public $error;

    public function __construct()
    {

    }
    public function test()
    {
        echo 123;
    }
    //
    public function insert($tablename,$arr)
    {

        echo 123;
//        $dbname = $this->curr_db_name;
//        try {
//            $this->mongo->$dbname->$table_name->insert($record, array('safe'=>true));
//            return true;
//        }
//        catch (MongoCursorException $e)
//        {
//            $this->error = $e->getMessage();
//            return false;
//        }
    }




}







