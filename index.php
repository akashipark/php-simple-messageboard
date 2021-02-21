<!--
   项目名称：明石留言板
   版本：V1.8
   时间：2021-2-21
   
   Copyright©2021 | Akashi Soft
   遵循 CC-BY-NC-SA 版权协议
   
   index.php
-->

<?php require_once( 'header.php'); ?>

<?php 

if (!file_exists("install.lock")) {
    $url = "./install.php";  
               echo "<script language='javascript' type='text/javascript'>window.location.href='$url'</script>"; 
    exit();
}

?>


   <div class="mdui-tab mdui-tab-centered " mdui-tab>
  
  <a href="#show" class="mdui-ripple mdui-ripple-white">
    <i class="mdui-icon material-icons">assignment</i>
    <label>展示留言</label>
  </a>
  <a href="#add" class="mdui-ripple mdui-ripple-white">
    <i class="mdui-icon material-icons">border_color</i>
    <label>添加留言</label>
  </a>
  <!--<a href="#ban" class="mdui-ripple mdui-ripple-white">
  
    <i class="mdui-icon material-icons">assignment_ind</i>
    <label>小黑屋</label>
  </a>              
            功能预留
                             -->
  
  <a href="#login" class="mdui-ripple mdui-ripple-white">

    <i class="mdui-icon material-icons">assignment_ind</i>
    <label>管理员登录</label>
  </a>
</div>



<!-- 显示留言界面开始 -->

<div id="show" class="mdui-p-a-2">
<h3>
<center>

   <?php
   $messagelistshow = @file_get_contents("./database/message.txt");
   if (($messagelistshow != null)){


         // 获取留言

        $info = @file_get_contents("./database/message.txt");

        $info = rtrim($info, "@");

        if (strlen($info)>=8){

         // 拆分留言
          $messagelist = explode("@@@", $info);

          foreach ($messagelist as $key => $value) {
          $message = explode("##", $value); 
            
			
			
  echo("<div class=\"mdui-card\">");
  //卡片的标题和副标题
  echo("<div class=\"mdui-card-primary\">");
  echo("<div class=\"mdui-card-primary-title\">「" . htmlspecialchars($message[0]) . "」</div>");
  echo("<div class=\"mdui-card-primary-subtitle\">" . htmlspecialchars($message[4]) . "</div>");
  echo("</div>");
  // 卡片的内容
  echo("<div class=\"mdui-card-content\" style=\"word-break:break-all;\">" . htmlspecialchars($message[2]) . "</div>");
  echo("<div style=\"float:right; class=\"mdui-card-primary-subtitle\">来自：「" . htmlspecialchars($message[1]) . "」&emsp;</div>");
  echo("</div>");
  echo("<br/>");

		
         }
     }


   }else{
	   echo ("<div class=\"mdui-card\">
  
  <div class=\"mdui-card-primary\">
  <div class=\"mdui-card-primary-title\"> 「Hello, from V1.8」</div>
  <div class=\"mdui-card-primary-subtitle\">2021-2-21</div>
  </div>
  <div class=\"mdui-card-content\" style=\"word-break:break-all;\">你好，欢迎使用明石留言板！<br>(当有留言后本条提示会自动删除)</div>
  <div style=\"float:right;\" class=\"mdui-card-primary-subtitle\">来自:「系统」</div>
  </div>");
   }
?>
  
  

	</center>
</h3>
</div>

<!-- 显示留言界面结束 -->

<!-- 登录界面开始 -->

<div id="login" class="mdui-p-a-2">
<center>
<form action="./login.php" method="post" >
		<div class="mdui-textfield mdui-textfield-floating-label">
  <label class="mdui-textfield-label">密码</label>
  <input class="mdui-textfield-input" type="password" name="password" maxlength="12"/ required/>
  <div class="mdui-textfield-error">密码不能为空</div>
</div>

<?php
$loginCAPTCHAnum1 = mt_rand(1,20);
$loginCAPTCHAnum2 = mt_rand(1,20);

$logincaptcharesult = $loginCAPTCHAnum1 + $loginCAPTCHAnum2;
?>


<div class="mdui-textfield mdui-textfield-floating-label">
  <label class="mdui-textfield-label">请输入<?php echo "$loginCAPTCHAnum1" ;echo'+';echo"$loginCAPTCHAnum2" ?>的值</label>
  <input class="mdui-textfield-input" type="text" name="logincaptchauser" maxlength="3"/ required/>
  <div class="mdui-textfield-error">验证码不能为空</div>
  <input type="hidden" name="logincaptcharesult" value="<?php echo "$logincaptcharesult"; ?>">
</div>

<button class="mdui-btn mdui-color-theme-accent mdui-ripple" type="submit"><i class="mdui-icon material-icons">arrow_forward</i>登录</button>
	</form>
	
<!--<button class="mdui-btn mdui-ripple mdui-color-theme-accent" mdui-dialog="{target: '#errorwebauthn'}"><i class="mdui-icon material-icons">lock_outline</i>使用 WebAuthn 认证</button>

	
	
	
	
	<div class="mdui-dialog" id="errorwebauthn">
  <div class="mdui-dialog-title">错误：未能成功开启 WebAuthn</div>
  <div class="mdui-dialog-content">抱歉，本站 WebAuthn 功能正在调试中，当前不可用。请您使用密码登录。</div>
  <div class="mdui-dialog-actions">
    <button class="mdui-btn mdui-ripple" mdui-dialog-close>明白了</button>
    <button class="mdui-btn mdui-ripple" mdui-dialog-confirm>erase</button>
  </div>
</div>
	-->
	
	
</center>
</div>

<!-- 登录界面结束 -->

<!-- 提交界面开始 -->

<div id="add" class="mdui-p-a-2">



	<form action="add.php" method="post">
		<div class="mdui-textfield mdui-textfield-floating-label">
  <label class="mdui-textfield-label">您的称呼</label>
  <input class="mdui-textfield-input" type="text" name="author" maxlength="18"/ required/>
  <div class="mdui-textfield-error">名称不能为空</div>
</div>

<div class="mdui-textfield mdui-textfield-floating-label">
  <label class="mdui-textfield-label">标题</label>
  <input class="mdui-textfield-input" type="text" maxlength="40"/ name="title">

</div>

		<div class="mdui-textfield">
  <textarea class="mdui-textfield-input" rows="4" placeholder="留言内容" name="content" maxlength="<?php echo "$selfsettingout[3]"; ?>"/ required/></textarea>
  <div class="mdui-textfield-error">内容不能为空</div>
</div>

<?php
$addCAPTCHAnum1 = mt_rand(1,20);
$addCAPTCHAnum2 = mt_rand(1,20);

$addcaptcharesult = $addCAPTCHAnum1 + $addCAPTCHAnum2;
?>


<div class="mdui-textfield mdui-textfield-floating-label">
  <label class="mdui-textfield-label">请输入<?php echo "$addCAPTCHAnum1" ;echo'+';echo"$addCAPTCHAnum2" ?>的值</label>
  <input class="mdui-textfield-input" type="text" name="addcaptchauser" maxlength="3"/ required/>
  <div class="mdui-textfield-error">验证码不能为空</div>
  <input type="hidden" name="addcaptcharesult" value="<?php echo "$addcaptcharesult"; ?>">
</div>

  
  
<button class="mdui-btn mdui-color-theme-accent mdui-ripple" type="submit"><i class="mdui-icon material-icons">near_me</i></button>
<button class="mdui-btn mdui-color-theme-accent mdui-ripple" type="reset">重置</button>
	</form>

</div>

<!-- 提交界面结束 -->


<?php include 'footer.php';?>

</body>

</html>