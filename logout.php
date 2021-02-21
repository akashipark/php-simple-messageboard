<!--
  项目名称：明石留言板
   版本：V1.8
   时间：2021-2-21
   
   Copyright©2021 | Akashi Soft
   遵循 CC-BY-NC-SA 版权协议
   
   logout.php
-->

<?php require_once( 'header.php'); ?>

<?php

if( @$_SERVER['HTTP_REFERER'] == "" )
{

exit('<br><br><h1><center>非法操作，请勿直接访问本页面。</center></h1><br><br>');
}		

?>



<?php 
	


	// 清除Session
	$_SESSION = array();
	session_destroy();
 
	// 清除Cookie
	
	@setcookie('username', '', time()-99);
	@setcookie('code', '', time()-99);
 
	// 提示信息
	
	
	echo "<br><br><h1><center><div class=\"mdui-typo\">已安全退出，重新<a href=\"./index.php\">登录</a></div></h1></center><br><br>";
	
	exit();
 
 ?>