<?php
//需要拒绝的参数
$curl_deny = array (
'makehtml.gethtml',
);
//拒绝a参数出现
$curl_denya = array(
'__construct',
'__ini',
'getdb',
'__Pagecheck',
'__Pagecache',
'assign',
'display',
'isCached',
'fetch',
'meth',
);
?>