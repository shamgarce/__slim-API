<?php
/*
 * 签名验证监测算法
 * */
$user       = "1234";
$deviceid   = "a67282337ebf6947592517aaf4beb195";
$openid     = "2a76b0ed2182b98fa05a96525ebd7ad0";
$timestamp  = "1426233285";
$salt       = "ccab8f440ff0825e";
$signature  = "bb8894ec9f2146cb292d5a9f84f6b1a8";
echo $signature.'<hr>';
echo md5($openid.$timestamp.$salt);

/*
openid : md5(user,deviceid)
md5 (openid,timestamp,salt)

//phpinfo();
