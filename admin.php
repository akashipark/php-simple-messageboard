<!--
   项目名称：明石留言板
   版本：V1.2
   时间：2021-1-29
   
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
		exit("<br><br><h1><center><div class=\"mdui-typo\">您还没有登录，请<a href=\"./index.php\">登录</a></div></h1></center><br><br>");
	}
 ?>
 
 
<h1 style="color:LightSteelBlue"><center>管理留言板</center></h1>


<div class="mdui-tab mdui-tab-centered" mdui-tab>
  
  <a href="#info_and_action" class="mdui-ripple mdui-ripple-white">
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
  <a href="#exit_info" class="mdui-ripple mdui-ripple-white">
    <i class="mdui-icon material-icons">info</i>
    <label>退出</label>
  </a>
</div>





<div id="info_and_action" class="mdui-p-a-2">


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
$info = file_get_contents("./database/message.txt");

$info = rtrim($info, "@");

if (strlen($info)>=8){

// 拆分留言信息
$messagelist = explode("@@@", $info);

foreach ($messagelist as $key => $value) {
    $message = explode("##", $value); 
    echo "<tr>";
	 
    echo "<td>{$message[0]}</td>";
    echo "<td>{$message[1]}</td>";
    echo "<td>{$message[2]}</td>"; 
    echo "<td>{$message[3]}</td>"; 
    echo "<td>{$message[4]}</td>"; 
	echo "<td>{$message[5]}</td>"; 
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





<div class="mdui-panel-item">  <!--自定义 站点名称-->
    <div class="mdui-panel-item-header">
      <div class="mdui-panel-item-title">自定义 站点名称</div>
      <div class="mdui-panel-item-summary"></div>
      <i class="mdui-panel-item-arrow mdui-icon material-icons">keyboard_arrow_down</i>
    </div>
    <div class="mdui-panel-item-body">
    <p>PS.建议不要超过十个字哦</p>
    <form action="./database/selfsetting/webname.php" method="post">

    <textarea class="mdui-textfield-input" rows="1" name="changewebname">
<?php 

$pathwebname='./database/selfsetting/webname.dat'; 
readfile($pathwebname); 

?>
</textarea>

      <div class="mdui-panel-item-actions">
       
        <button class="mdui-btn mdui-color-theme-accent mdui-ripple" type="submit">保存修改</button>
        </form>
      </div>
    </div>
  </div>











<div class="mdui-panel-item">   <!--自定义 站点标志-->
    <div class="mdui-panel-item-header">
      <div class="mdui-panel-item-title">自定义 站点标志</div>
      <div class="mdui-panel-item-summary"></div>
      <i class="mdui-panel-item-arrow mdui-icon material-icons">keyboard_arrow_down</i>
    </div>
    <div class="mdui-panel-item-body">
    <p>PS.输入图片的链接地址</p>
    <form action="./database/selfsetting/websign.php" method="post">

<textarea class="mdui-textfield-input" rows="1" name="changewebsign">
<?php 

$pathwebsign='./database/selfsetting/websign.dat'; 
readfile($pathwebsign); 

?>
</textarea>

  <div class="mdui-panel-item-actions">
    
    <button class="mdui-btn mdui-color-theme-accent mdui-ripple" type="submit">保存修改</button>
    </form>
      </div>
    </div>
  </div>

  </div>













</center>
 </div>























<div id="badword_and_action" class="mdui-p-a-2">

<center>

<div class="mdui-panel" mdui-panel>

<div class="mdui-panel-item">
    <div class="mdui-panel-item-header">
      <div class="mdui-panel-item-title">编辑 禁止提交留言IP地址</div>
      <div class="mdui-panel-item-summary"></div>
      <i class="mdui-panel-item-arrow mdui-icon material-icons">keyboard_arrow_down</i>
    </div>
    <div class="mdui-panel-item-body">
    <p>PS.一排添加一个IP，空一排再添加下一个IP</p>
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
      <div class="mdui-panel-item-title">编辑 全站封禁IP地址</div>
      <div class="mdui-panel-item-summary"></div>
      <i class="mdui-panel-item-arrow mdui-icon material-icons">keyboard_arrow_down</i>
    </div>
    <div class="mdui-panel-item-body">
    <p>PS.一排添加一个IP，空一排再添加下一个IP</p>
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




<div id="exit_info" class="mdui-p-a-2">
<center>
<h2>您确定要退出么？</h2>
<div class="mdui-chip">
  <a href="./logout.php">
  <span class="mdui-chip-icon mdui-color-blue"><i class="mdui-icon material-icons">exit_to_app</i></span>
  </a>
</div>
</center>
 </div>
 
 
 
 <?php include 'footer.php';?>
</body>
</html>