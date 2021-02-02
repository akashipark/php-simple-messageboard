<!--
   项目名称：明石留言板
   版本：V1.5
   时间：2021-1-29
   
   Copyright©2021 | Akashi Soft
   遵循 CC-BY-NC-SA 版权协议
   
   index.php
-->

<?php require_once( 'header.php'); ?>



    <center><h1 style="color:LightSteelBlue"><?php echo $nowwebname;?></h1> </center>
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
  <a href="#about" class="mdui-ripple mdui-ripple-white">
    <i class="mdui-icon material-icons">info</i>
    <label>关于</label>
  </a>
  <a href="#login" class="mdui-ripple mdui-ripple-white">

    <i class="mdui-icon material-icons">assignment_ind</i>
    <label>管理员登录</label>
  </a>
</div>

<!-- 登录界面开始 -->

<div id="login" class="mdui-p-a-2">
<center>
<form action="./login.php" method="post">
		<div class="mdui-textfield mdui-textfield-floating-label">
  <label class="mdui-textfield-label">密码</label>
  <input class="mdui-textfield-input" type="password" name="password" required/>
  <div class="mdui-textfield-error">密码不能为空</div>
</div>

<?php
$loginCAPTCHAnum1 = mt_rand(1,20);
$loginCAPTCHAnum2 = mt_rand(1,20);

$logincaptcharesult = $loginCAPTCHAnum1 + $loginCAPTCHAnum2;
?>


<div class="mdui-textfield mdui-textfield-floating-label">
  <label class="mdui-textfield-label">请输入<?php echo "$loginCAPTCHAnum1" ;echo'+';echo"$loginCAPTCHAnum2" ?>的值</label>
  <input class="mdui-textfield-input" type="text" name="logincaptchauser" required/>
  <div class="mdui-textfield-error">验证码不能为空</div>
  <input type="hidden" name="logincaptcharesult" value="<?php echo "$logincaptcharesult"; ?>">
</div>

<button class="mdui-btn mdui-color-theme-accent mdui-ripple" type="submit"><i class="mdui-icon material-icons">arrow_forward</i>密码登录</button>
	</form>
	
<button class="mdui-btn mdui-ripple mdui-color-theme-accent" mdui-dialog="{target: '#errorwebauthn'}"><i class="mdui-icon material-icons">lock_outline</i>使用 WebAuthn 认证</button>

	
	
	
	
	<div class="mdui-dialog" id="errorwebauthn">
  <div class="mdui-dialog-title">错误：未能成功开启 WebAuthn</div>
  <div class="mdui-dialog-content">抱歉，本站 WebAuthn 功能正在调试中，当前不可用。请您使用密码登录。</div>
  <div class="mdui-dialog-actions">
    <button class="mdui-btn mdui-ripple" mdui-dialog-close>明白了</button>
    <!--<button class="mdui-btn mdui-ripple" mdui-dialog-confirm>erase</button>-->
  </div>
</div>
	
	
	
</center>
</div>

<!-- 登录界面结束 -->

<!-- 显示留言界面开始 -->

<div id="show" class="mdui-p-a-2">
<h3>
<center>
		<div class="mdui-table-fluid">
  <table class="mdui-text-color-theme-text mdui-table mdui-table-hoverable">
    <thead>
      <tr>
	    
        <th>#标题</th>
        <th>#发送者</th>
        <th>#留言内容&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</th>
		
        <th>#时间</th>
      </tr>
    </thead>
   
  
<?php

         // 获取留言

        $info = file_get_contents("./database/message.txt");

        $info = rtrim($info, "@");

        if (strlen($info)>=8){

         // 拆分留言
          $messagelist = explode("@@@", $info);

          foreach ($messagelist as $key => $value) {
          $message = explode("##", $value); 
             echo "<tr>";
	 
             echo "<td>{$message[0]}</td>";
          echo "<td>{$message[1]}</td>";
          echo "<td>{$message[2]}</td>"; 
          echo "<td>{$message[4]}</td>"; 
   
          echo "</tr>";
   
         }
     }
   ?>
   
		</table>
       </div>
	</center>
</h3>
</div>

<!-- 显示留言界面结束 -->

<!-- 提交界面开始 -->

<div id="add" class="mdui-p-a-2">



	<form action="add.php" method="post">
		<div class="mdui-textfield mdui-textfield-floating-label">
  <label class="mdui-textfield-label">您的称呼</label>
  <input class="mdui-textfield-input" type="text" name="author" required/>
  <div class="mdui-textfield-error">名称不能为空</div>
</div>

<div class="mdui-textfield mdui-textfield-floating-label">
  <label class="mdui-textfield-label">标题</label>
  <input class="mdui-textfield-input" type="text" name="title">

</div>

		<div class="mdui-textfield">
  <textarea class="mdui-textfield-input" rows="4" placeholder="留言内容" name="content" required/></textarea>
  <div class="mdui-textfield-error">内容不能为空</div>
</div>

<?php
$addCAPTCHAnum1 = mt_rand(1,20);
$addCAPTCHAnum2 = mt_rand(1,20);

$addcaptcharesult = $addCAPTCHAnum1 + $addCAPTCHAnum2;
?>


<div class="mdui-textfield mdui-textfield-floating-label">
  <label class="mdui-textfield-label">请输入<?php echo "$addCAPTCHAnum1" ;echo'+';echo"$addCAPTCHAnum2" ?>的值</label>
  <input class="mdui-textfield-input" type="text" name="addcaptchauser" required/>
  <div class="mdui-textfield-error">验证码不能为空</div>
  <input type="hidden" name="addcaptcharesult" value="<?php echo "$addcaptcharesult"; ?>">
</div>

  
  
<button class="mdui-btn mdui-color-theme-accent mdui-ripple" type="submit"><i class="mdui-icon material-icons">near_me</i></button>
<button class="mdui-btn mdui-color-theme-accent mdui-ripple" type="reset">重置</button>
	</form>

</div>

<!-- 提交界面结束 -->

<!-- 关于界面开始 -->

<div id="about" class="mdui-p-a-2">

<div class="mdui-card">

  <!-- 卡片头部，包含头像、标题、副标题 -->
  <div class="mdui-card-header">
    <img class="mdui-card-header-avatar" src="https://p.ananas.chaoxing.com/star3/origin/d958da15d56688ec747faafc79b61209.jpg?rw=315&rh=334&_fileSize=18387&_orientation=1"/>
    <div class="mdui-card-header-title">明石</div>
    <div class="mdui-card-header-subtitle">青春无悔热爱！</div>
  </div>

  <!-- 卡片的媒体内容，可以包含图片、视频等媒体内容，以及标题、副标题 -->
  <div class="mdui-card-media">

    <!-- 卡片中可以包含一个或多个菜单按钮 -->
    <div class="mdui-card-menu">
     <form action="http://versioncheck.yesalan.top/" method="post">
  <input type="hidden" name="versioncheck-softname" value="Akashi-Messageboard">
  <input type="hidden" name="versioncheck-version" value="versioncheck-AMB-V1.5">
<button class="mdui-btn mdui-color-theme-accent mdui-ripple" type="submit">检查更新</button>
	</form>
    </div>
  </div>

  <!-- 卡片的标题和副标题 -->
  <div class="mdui-card-primary">
    <div class="mdui-card-primary-title">明石留言板 [V1.5]</div>
    <div class="mdui-card-primary-subtitle">Akashi Messagebox(Without database)</div>
  </div>

  

  <blockquote>
  <h3> 作者：明石       
  <div class="mdui-card-actions">
    <a class="mdui-btn mdui-ripple" href="https://github.com/akashipark" target="_blank" >GITHUB</a>
    <a class="mdui-btn mdui-ripple" href="https://yesalan.top" target="_blank" >BLOG</a>
  </div>  
<img src ="https://th.bing.com/th/id/Rff115f863fc1bc9e80ed1813a46f26f6?rik=rAB%2bJWkqlFI%2fvQ&riu=http%3a%2f%2fconogasi.org%2fwp-content%2fuploads%2f2017%2f05%2fCC-BY-NC-SA-4.0.jpg" height="66" width="170" />      
  <br>
遵循 CC-BY-NC-SA 协议
<br>
<hr>
<br>

     样式为MDUI             <br>  <br>     
	     字体： PingFang SC Regular(如果可用)       <br>   <br> 
		 <div class="mdui-typo">此网页背景图片来自 <a href="http://www.tuquu.com/" target="_blank" >图趣网</a></div>        <br>   <br> 

<br> 
</div>

</div>
</div>

<!-- 关于界面结束 -->


<?php include 'footer.php';?>

</body>

</html>