<!--
   项目名称：明石留言板
   版本：V1.8
   时间：2021-2-21
   
   Copyright©2021 | Akashi Soft
   遵循 CC-BY-NC-SA 版权协议
   
   delete.php
-->

<?php require_once( 'header.php'); ?>

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


// 获取要删除留言的 id号
$id = $_GET["id"]; 
                   
// 从message.txt获取留言信息
$info = @file_get_contents("./database/message.txt");

// 拆分留言信息
$messagelist = explode("@@@", $info);

// 使用unset删除留言
unset($messagelist[$id]);

// 写回message.txt
$messageinfo = implode("@@@", $messagelist);
file_put_contents("./database/message.txt", $messageinfo);

			$url = "./admin.php";  
               echo "<script language='javascript' type='text/javascript'>window.location.href='$url'</script>";  


?>