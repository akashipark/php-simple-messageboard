<!--
   项目名称：明石留言板
   版本：V1.8
   时间：2021-2-21
   
   Copyright©2021 | Akashi Soft
   遵循 CC-BY-NC-SA 版权协议
   
   selfsetting.php
-->

<?php require_once( '../../header.php'); ?>


<?php

if( @$_SERVER['HTTP_REFERER'] == "" )
{

exit('<br><br><h1><center>非法操作，请勿直接访问本页面。</center></h1><br><br>');
}		

?>

<?php 
	
   
	
 
	// 首先判断Cookie是否有记住了用户信息
	if (isset($_COOKIE['username'])) {
		# 若记住了用户信息,则直接传给Session
		$_SESSION['islogin'] = 1;
	}
	if (isset($_SESSION['islogin'])) {
		
	} else {
		// 若没有登录
		exit("<br><br><h1><center><div class=\"mdui-typo\">您还没有登录，请<a href=\"./index.php\">登录</a></div></h1></center><br><br>");
	}
 ?>

<?php 
$themecolor = $_POST["themecolor"];
$webname = $_POST["changewebname"];
$websign = $_POST["changewebsign"]; 
$maxlength = $_POST["set-maxlength"];
$checkbox_select=$_POST["checkbox_select"];

				 
// 2.拼装（组装）信息
$selfsetting = "{$themecolor}##{$webname}##{$websign}##{$maxlength}##{$checkbox_select}@@@";

// 3.将信息追加到文件中
                                            
 $loadselfsetting = @fopen("selfsetting.dat", "w");
  $modifyselfsetting = $selfsetting;
  fwrite($loadselfsetting, $modifyselfsetting);
  fclose($loadselfsetting);

			$url = "../../admin.php";  
               echo "<script language='javascript' type='text/javascript'>window.location.href='$url'</script>";  
 ?>