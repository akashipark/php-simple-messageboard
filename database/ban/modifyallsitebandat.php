<!--
   项目名称：明石留言板
   版本：V1.2
   时间：2021-1-29
   
   Copyright©2021 | Akashi Soft
   遵循 CC-BY-NC-SA 版权协议
   
   modifyallsitebandat.php
-->

<?php require_once( '../../header.php'); ?>



<?php

if( $_SERVER['HTTP_REFERER'] == "" )
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
	
  $loadbandat = fopen("ban.dat", "w");
  $modifybandat = $_POST['all-modifybandat'];
  fwrite($loadbandat, $modifybandat);
  fclose($loadbandat);

  $url = "../../admin.php";  
               echo "<script language='javascript' type='text/javascript'>window.location.href='$url'</script>";  

?>
 
