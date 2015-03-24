<?php
//类文件自动加载
/**	 addby sham 3.5	**/
function __Sham__loader($class)
{
    $file = __DIR__."\\library\\$class.php";
    if (is_file($file)) {
        require_once($file);
    }
}
spl_autoload_register('__Sham__loader');
/**	 /addby sham 3.5	**/

define(SHAM_PATH,__DIR__);

//加载文件
require(__DIR__.'\Set.php');                        //加载s类文件
