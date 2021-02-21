<!--
   项目名称：明石留言板
   版本：V1.8
   时间：2021-2-21
   
   Copyright©2021 | Akashi Soft
   遵循 CC-BY-NC-SA 版权协议
   
   login.php
-->

<?php require_once( 'header.php'); ?>

<?php

if( $_SERVER['HTTP_REFERER'] == "" )
{

exit('<br><br><h1><center>非法操作，请勿直接访问本页面。</center></h1><br><br>');
}		

?>

   
<?php



 //验证验证码

  $logincaptchafinal = $_POST["logincaptcharesult"];
  $logincaptchauser = htmlspecialchars($_POST["logincaptchauser"]);
  
  if(($logincaptchafinal != $logincaptchauser))
  {
	
	  exit("<br><br><h1><center><div class=\"mdui-typo\">验证码错误，请<a href=\"./index.php\">重试</a></div></h1></center><br><br>");
  }
  elseif(($logincaptchauser == ''))
  {
	  exit("<br><br><h1><center><div class=\"mdui-typo\">验证码不能为空，请<a href=\"./index.php\">重试</a></div></h1></center><br><br>");
  }
  elseif(($logincaptchauser = $logincaptchafinal))
  {
	  
  }
  
       //验证密码
	
		$password = htmlspecialchars($_POST['password']);
		
		if (($password == '')) {
			// 若为空,视为未填写,提示错误
			
			
			exit("<br><br><h1><center><div class=\"mdui-typo\">密码不能为空，请<a href=\"./index.php\">重试</a></div></h1></center><br><br>");
		
		
		}elseif (($password != 'akashi')) {
			# 密码错误,同空的处理方式
			
			
			exit("<br><br><h1><center><div class=\"mdui-typo\">密码错误，请<a href=\"./index.php\">重试</a></div></h1></center><br><br>");
		
			
			
		
		}elseif (($password = 'akashi')) {
			# 用户名和密码都正确,将用户信息存到Session中
			$_SESSION['islogin'] = 1;
			
			$url = "./admin.php";  
               echo "<script language='javascript' type='text/javascript'>window.location.href='$url'</script>";  
              
			
		}
 ?>
 
