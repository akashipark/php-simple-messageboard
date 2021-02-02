<!--
   项目名称：明石留言板
   版本：V1.2
   时间：2021-1-29
   
   Copyright©2021 | Akashi Soft
   遵循 CC-BY-NC-SA 版权协议
   
   add.php
-->

<?php //限制直接访问本页面

require_once( 'header.php');
if( $_SERVER['HTTP_REFERER'] == "" )
{

exit('<br><br><h1><center>非法操作，请勿直接访问本页面。</center></h1><br><br>');
}
		

?> 

<?php   //IP黑白名单检测
$ip=$_SERVER["REMOTE_ADDR"];

$ban=@file_get_contents("./ban/addban.dat");

if(stripos($ban,$ip))
{
exit("<center><h1>Your IP [$ip] are forbiden to add content!</h1><h2>If you have any question, please contact the webmaster</h2></center>");
}
?>

<?php //限制同IP多次访问

define('TIME_OUT', 30); //定义重复操作最短的允许时间，单位秒

$time = time();
if( isset($_SESSION['time']) )
{
if( $time - $_SESSION['time'] <= TIME_OUT ) //判断超时
{
exit('<br><br><h1><center>30秒只能发送一条留言，您的提交过于频繁。</center></h1><br><br>');
}
}
$_SESSION['time'] = $time;

?>

<?php    //验证验证码

  $addcaptchafinal = $_POST["addcaptcharesult"];
  $addcaptchauser = $_POST["addcaptchauser"];
  
  if(($addcaptchafinal != $addcaptchauser))
  {
	
	  exit("<br><br><h1><center><div class=\"mdui-typo\">验证码错误，请<a href=\"./index.php\">重试</a></div></center></h1><br><br>");
  }
  elseif(($addcaptchauser == ''))
  {
	  exit("<br><br><h1><center><div class=\"mdui-typo\">验证码不能为空，请<a href=\"./index.php\">重试</a></div></center></h1><br><br>");
  }
  elseif(($addcaptchauser = $addcaptchafinal))
  {
	  
  }
  
?>

<?php   //进行添加留言操作


//敏感词审核开始

 $badword = array ( 
     'cnm' ,'妈逼' ,'麻痹' ,'mb','去死' ,'去你妈' , '人民代表大会' , '欠操' , '嫩逼' , '操你妈' , '淫' , '乳' , '奸' , '裸' , '骚' , '嫖' , '姦' , '枪' , '共产党' , 'fuck' , 'bitch' , 'J巴' , 'jb' , '屌' , 'A片' , 'wdnmd' , '操B' , '操逼' , '插逼' , '水逼' , '粉逼' , '插B' , '大b' , '二B' , '狗b' , '傻B' , '傻X' , '傻逼' , '骚逼' , 'h漫' , 'h图' , '嫩b' , '18禁' , '法轮功' , 'FL功' , '革命' , '暴动' , '暴乱' , '起义' , '游行' , '示威' , '小粉红' , '舔狗' , '法轮' , '两会' , '退党' , '反华' , '反共' , '中华民国' , '偷拍' , '政治' , '办证' , '变态' , '婊子' , '暴亂' , '暴動' , '潮吹' , '代孕' , '习近平' , '吸精瓶' , '肛' , '换妻' , '贷款', '爆操', '黑逼' ,
); 
$badword1 = array_combine ( $badword , array_fill (0, count ( $badword ), '*' )); 

$contenttest = $_POST["content"]; 
$titletest = $_POST['title'];
$authortest = $_POST["author"];
$captchauser = $_POST['captchauser'];

$contentstr = strtr ( $contenttest , $badword1); 
$titlestr = strtr ( $titletest , $badword1); 
$authorstr = strtr ( $authortest , $badword1); 

//敏感词审核结束（不要问我是从哪里知道这些语言的哈哈哈）



date_default_timezone_set('PRC');//设置时区中国大陆


// 1.获取要添加的留言信息，并且补上其他辅助消息（IP地址，添加时间）
$title = $titlestr; // 获取留言标题
$author = $authorstr; // 获取留言者
$content = $contentstr; // 留言内容
$ip = $_SERVER["REMOTE_ADDR"]; // IP地址
$addtime = date('Y-m-d H:i:s');// 添加时间 （时间戳的格式）
				 
	$browser = $_SERVER["HTTP_USER_AGENT"];		 
	 
				 
// 2.拼装（组装）留言信息
$message = "{$title}##{$author}##{$content}##{$ip}##{$addtime}##{$browser}@@@";

// 3.将留言信息追加到文件中
$info = file_get_contents("./database/message.txt"); // 获取所有以前的留言
file_put_contents("./database/message.txt", $info . $message); // 覆盖式的写入，会对原有数据进行覆盖
                                            
// 4.输出留言成功
			$url = "./index.php";  
               echo "<script language='javascript' type='text/javascript'>window.location.href='$url'</script>";  


?> 

