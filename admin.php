<!--
   项目名称：明石留言板
   版本：V1.8
   时间：2021-2-21
   
   Copyright©2021 | Akashi Soft
   遵循 CC-BY-NC-SA 版权协议
   
   admin.php
-->
   
 <?php 
	
    require_once( 'header.php'); 
	
 
	// 首先判断Cookie是否有记住了用户信息
	if (isset($_COOKIE['username'])) {
		# 若记住了用户信息,则直接传给Session
		$_SESSION['islogin'] = 1;
	}
	if (isset($_SESSION['islogin'])) {
		
	} else {
		// 若没有登录
		exit("<br><br><center><h1><div class=\"mdui-typo\">您还没有登录，请<a href=\"./index.php\">登录</a></div></h1></center><br><br>");
	}
 ?>
 
 
 
 
<h1 style="color:LightSteelBlue"><center>管理留言板</center></h1>


<div class="mdui-tab mdui-tab-centered" mdui-tab>
  
  
  <a href="#info&action" class="mdui-ripple mdui-ripple-white">
    <i class="mdui-icon material-icons">folder_shared</i>
    <label>详细信息&编辑</label>
  </a>
  <a href="#selfchange" class="mdui-ripple mdui-ripple-white">
  <i class="mdui-icon material-icons">color_lens</i>
    <label>自定义站点</label>
  </a>
  <a href="#badword_and_action" class="mdui-ripple mdui-ripple-white">
    <i class="mdui-icon material-icons">speaker_notes_off</i>
    <label>小黑屋管理</label>
  </a>
  <a href="#fuction" class="mdui-ripple mdui-ripple-white">
    <i class="mdui-icon material-icons">info</i>
    <label>更多功能</label>
  </a>
</div>


<div id="info&action" class="mdui-p-a-2">
<center>

		<div class="mdui-table-fluid">
  <table class="mdui-table mdui-table-hoverable mdui-table-fluid">
    <thead>
      <tr>
	    
        <th>#留言标题</th>
        <th>#发送者</th>
        <th>#留言内容&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</th>
		
        
		<th>#IP地址</th>
		
		<th>#时间</th>
		
		<th>#Useragent</th>
		
		<th>#操作</th>
		
		
      </tr>
    </thead>
   
  
			<?php

// 获取留言信息
// message.txt
$info = @file_get_contents("./database/message.txt");

$info = rtrim($info, "@");

if (strlen($info)>=8){

// 拆分留言信息
$messagelist = explode("@@@", $info);

foreach ($messagelist as $key => $value) {
    $message = explode("##", $value); 
    echo "<tr>";
	 
    echo "<td>" . htmlspecialchars($message[0]) . "</td>";
    echo "<td>" . htmlspecialchars($message[1]) ."</td>";
    echo "<td>" . htmlspecialchars($message[2]) ."</td>"; 
    echo "<td>" . htmlspecialchars($message[3]) ." </td>"; 
    echo "<td>" . htmlspecialchars($message[4]) ."</td>"; 
	echo "<td>" . htmlspecialchars($message[5]) ." </td>"; 
	echo "<td><div class=\"mdui-typo\"><a href='delete.php?id={$key}'>删除</a></td></div>";
	
   
   
    // 传值
    echo "</tr>";
	
   
}
}
?>
		</table>
</div>
	</center>

</div>



<div id="selfchange" class="mdui-p-a-2">
<center>

<div class="mdui-panel" mdui-panel>



<form action="./database/selfsetting/selfsetting.php" method="post">

<div class="mdui-textfield">
  <label class="mdui-textfield-label">自定义站点主题色。请参见MDUI文档填入一个颜色名，不填则默认为白色。</label>
    <textarea class="mdui-textfield-input" rows="1" name="themecolor">
<?php 

echo "$selfsettingout[0]";

?>
</textarea>
</div>
 	<br>
		
<div class="mdui-textfield">
  <label class="mdui-textfield-label">给你的网站取一个好听的名字吧~建议不要超过10个字哦</label>
    <textarea class="mdui-textfield-input" rows="1" name="changewebname">
<?php 

echo "$selfsettingout[1]";

?>
</textarea>
</div>
 <br>


<div class="mdui-textfield">
  <label class="mdui-textfield-label">设置网站图标。在此输入图片URL地址</label>
<textarea class="mdui-textfield-input" rows="1" name="changewebsign">
<?php 

echo "$selfsettingout[2]";

?>
</textarea>
</div>
 <br>

<div class="mdui-textfield">
  <label class="mdui-textfield-label">输入一个阿拉伯数字以限制留言最大字数。</label>
    <textarea class="mdui-textfield-input" rows="1" name="set-maxlength">
<?php 

echo "$selfsettingout[3]";

?>
</textarea>
</div>
<br>

<label class="mdui-checkbox">
  <input type="checkbox" value="1" name="checkbox_select" 
  <?php
  if(($selfsettingout[4] != 1)){
	  
  }else{
	  echo 'checked';
  }
  ?>/>
  <i class="mdui-checkbox-icon"></i>
 隐藏侧边栏 “关于” 界面的入口
</label>

<br>
<br>
        <button class="mdui-btn mdui-color-blue-100 mdui-ripple" type="submit">保存修改</button>

</form>

  </div>
</center>
 </div>

<div id="badword_and_action" class="mdui-p-a-2">

<center>

<div class="mdui-panel" mdui-panel>

<div class="mdui-panel-item">
    <div class="mdui-panel-item-header">
      <div class="mdui-panel-item-title">禁止提交留言IP</div>
      <div class="mdui-panel-item-summary"></div>
      <i class="mdui-panel-item-arrow mdui-icon material-icons">keyboard_arrow_down</i>
    </div>
	
    <div class="mdui-panel-item-body">
	PS.一行只输入一个IP，空一行再输入下一个IP。
    
    <form action="./database/ban/modifyaddbandat.php" method="post">

    <textarea class="mdui-textfield-input" rows="10" name="add-modifybandat">
<?php 

$pathaddban='./database/ban/addban.dat'; //禁止提交留言小黑屋dat文件的路径
readfile($pathaddban); 

?>
</textarea>

      <div class="mdui-panel-item-actions">
       
        <button class="mdui-btn mdui-color-theme-accent mdui-ripple" type="submit">保存修改</button>
        </form>
      </div>
    </div>
  </div>

<div class="mdui-panel-item">
    <div class="mdui-panel-item-header">
      <div class="mdui-panel-item-title">全站封禁IP</div>
      <div class="mdui-panel-item-summary"></div>
      <i class="mdui-panel-item-arrow mdui-icon material-icons">keyboard_arrow_down</i>
    </div>
    <div class="mdui-panel-item-body">
   PS.一行只输入一个IP，空一行再输入下一个IP。
    <form action="./database/ban/modifyallsitebandat.php" method="post">

<textarea class="mdui-textfield-input" rows="10" name="all-modifybandat">
<?php 

$pathban='./database/ban/ban.dat'; //全站封禁小黑屋dat文件的路径
readfile($pathban); 

?>
</textarea>

  <div class="mdui-panel-item-actions">
    
    <button class="mdui-btn mdui-color-theme-accent mdui-ripple" type="submit">保存修改</button>
    </form>
      </div>
    </div>
  </div>

  </div>
<br>


	</center>
</div>




<div id="fuction" class="mdui-p-a-2">
<center>
<form action="http://versioncheck.imakashi.top/" method="post">
  <input type="hidden" name="versioncheck-softname" value="Akashi-Messageboard">
  <input type="hidden" name="versioncheck-version" value="versioncheck-AMB-V1.8">
<h2>检查更新
<div class="mdui-chip">
  <button class="mdui-btn mdui-color-blue-100 mdui-ripple" type="submit">
  <i class="mdui-icon material-icons">autorenew</i>
</button>
</div>
</h2>
</form>

<h2>安全退出
<div class="mdui-chip">
  <a href="./logout.php">
  <button class="mdui-btn mdui-color-blue-100 mdui-ripple">
 <i class="mdui-icon material-icons">exit_to_app</i>
  </button>
  </a>
</div>
</h2>

<h2>更多信息
<div class="mdui-chip">
<button class="mdui-btn mdui-ripple mdui-color-blue-100" mdui-dialog="{target: '#copyrightinfo'}">
<i class="mdui-icon material-icons">copyright</i>
</button>
</div>
</h2>


	<div class="mdui-dialog" id="copyrightinfo">
	<div class="mdui-dialog-title">明石留言板 程序声明</div>
  <div class="mdui-dialog-content">
  
  <p align="left">
  <b>Copyright&copy;2021 Akashi | blog.imakashi.top</b><br>
  <br>
  <b>明石/Akashi/Akashi Soft/blog.imakashi.top 对此程序享有著作权。</b><br><br>
  <b>1.你可以在遵循 CC-BY-NC-SA 版权协议的前提下使用或传播本程序。你可以进行基于本程序的非商业性自由创作，你需要至少保留底部原作者版权信息。</b><br>
  <b>2.禁止使用本程序或本程序衍生程序进行商业性活动；禁止使用本程序或本程序衍生程序进行违法活动。由于不当使用本程序或本程序衍生程序而产生的一切后果，由使用者承担。</b><br>
  <b>3.更新软件版本时请注意备份 "database" 文件夹内的数据，若是因不当操作而引起的数据丢失，本软件作者不承担责任。</b><br><br>
  <b>最后，感谢您使用本程序，祝您使用愉快。</b><br>
  </p>
  </div>
  <div class="mdui-dialog-actions">
   <button class="mdui-btn mdui-ripple" mdui-dialog-close>我已了解以上内容</button>
  </div>
  </div>

</center>
 </div>
 
 
 
 <?php include 'footer.php';?>
</body>
</html>