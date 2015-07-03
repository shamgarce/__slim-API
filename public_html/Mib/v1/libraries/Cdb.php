<?php

class Cdb {

    var $mongo;

    var $curr_db_name;
    var $curr_table_name;
    var $error;

    public function __construct($mongo_server, $connect=true, $auto_balance=true)
    {
        $this->S =  & get_instance()->S;
    }

    public function insert($tablename,$arr)
    {
        //autoExecute($table, $field_values, $mode = 'INSERT', $where = '', $querymode = ''){
        $this->S->db->autoExecute($tablename,$arr,'INSERT');
        return true;
    }


}