<?php
//phpinfo();
 date_default_timezone_set("Asia/Tokyo");
$db = "sbkmart_himitsukisi_v2";
$user = "sbkmart_ed";
$pass = "Atomix@1234";

$con = mysql_connect("localhost",$user,$pass);
mysql_select_db($db , $con);

/*if($con)
echo 1;
else
echo 2;


echo $d = date('Y-m-d H:i:s');
*/

$date = date("Y-m-d H");

$sql = mysql_query("select * from `crazy_mindset_audios` where date_format(`publish_date` , '%Y-%m-%d %H')='". $date ."'");
if(mysql_num_rows($sql) > 0  ) {
    $up = "update `crazy_mindset_audios` set `status`='ACTIVE' where date_format(`publish_date` , '%Y-%m-%d %H')='" . $date . "'";
    mysql_query($up);
}


$rid = mt_rand(1111111,9999999);
$d = date('Y-m-d H:i:s');

$in = "INSERT INTO `test_cron`( `rid`, `cron_date`)
VALUES('$rid' , '$d')";
mysql_query($in);


?>
