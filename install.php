<title>明石软件安装系统</title>
<body background="./assets/background.png">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
  <meta charset="utf-8">
  <link rel="stylesheet" href="https://cdn.bootcdn.net/ajax/libs/mdui/1.0.1/css/mdui.min.css">
  <script src="https://cdn.bootcdn.net/ajax/libs/mdui/1.0.1/js/mdui.min.js"></script>
  <br />
  <center><h1>明石留言板安装系统</h1></center>
  <?php
  $lockfile = "./database/install.lock";
  if (file_exists($lockfile)) {
    exit("<center><h3><br>您已经安装过了，如果需要重新安装请先删除根目录下的install.lock(如果你只需要修改内容请访问 database 目录或在网站的后台管理界面进行修改。)<br /></center></h3>");
  }
  if (!isset($_POST['submit'])) {
    ?>
	<br>
    <form action="" method="post" enctype="multipart/form-data">
      <div class="mdui-textfield mdui-textfield-floating-label">
        <label class="mdui-textfield-label">站点名称(取一个好听的名字吧！)</label>
        <input name="changewebname" type="text" class="mdui-textfield-input" />
      </div>
      <div class="mdui-textfield mdui-textfield-floating-label">
        <label class="mdui-textfield-label">站点标志(填入一个URL图片链接)</label>
        <input name="changewebsign" type="text" class="mdui-textfield-input" />
      </div>
	 
      <div class="mdui-textfield mdui-textfield-floating-label">
        <label class="mdui-textfield-label">留言最大字数(填入一个阿拉伯数字以限制留言最大字数)</label>
        <input name="set-maxlength" type="text" class="mdui-textfield-input" />
      </div>
	  <div class="mdui-textfield mdui-textfield-floating-label">
        <label class="mdui-textfield-label">输入您的昵称，只有您才能使用此昵称发表留言。不填则默认为“管理员”。</label>
        <input name="adminname" type="text" class="mdui-textfield-input" />
      </div>
	  <div class="mdui-textfield mdui-textfield-floating-label">
        <label class="mdui-textfield-label">输入一个大于或等于1 的阿拉伯数字以限制发送留言间隔时间（单位：秒）</label>
        <input name="submittime" type="text" class="mdui-textfield-input" />
      </div>
	  <div class="mdui-textfield mdui-textfield-floating-label">
        <label class="mdui-textfield-label">自定义站点主题色。请参见MDUI文档填入一个颜色名，不填则默认为白色。</label>
        <input name="themecolor" type="text" class="mdui-textfield-input" />
      </div>
	  <h3>提示：密码默认为 akashi ,请您前往 login.php 的第59、68行手动修改管理员密码。</h3>
      <br />
      <center>
        <input class="mdui-btn mdui-btn-raised mdui-ripple" type="submit" name="submit" value="安装" />
      </center>
    </form>
    <?php
  } else {
    if (empty($_POST['changewebname']) || empty($_POST['changewebsign']) || empty($_POST['set-maxlength'])) {
      exit("<br/><center><h1>请检查您是否填写完全部内容后重试!</h1></center>");
    } else {
      $webname = $_POST['changewebname'];
      $websign = $_POST['changewebsign'];
      $commentmax = $_POST['set-maxlength'];
	  $color = $_POST['themecolor'];
	  $submittime = $_POST["submittime"];
	  $adminname = $_POST["adminname"];

	  
	  if(($adminname = null)){
$adminname = '管理员';
	}elseif(($color = null)){
$color = 'white';
	}	
	
	   // 2.拼装（组装）信息
$selfsetting = "{$color}##{$webname}##{$websign}##{$commentmax}##{$submittime}## ## ##{$adminname}@@@";


// 3.将信息追加到文件中
                                            
 $loadselfsetting = @fopen("./database/selfsetting/selfsetting.dat", "w");
  $modifyselfsetting = $selfsetting;
  fwrite($loadselfsetting, $modifyselfsetting);
  fclose($loadselfsetting);
   
    }
 
    $fp2 = fopen($lockfile,'w');
    fwrite($fp2,'此为安装锁文件,请勿删除!');
    fclose($fp2);
    //写注册锁
    echo "<br/><center><h1>安装成功!2s后将为您自动跳转到首页!</h1></center>";
    header("Refresh:2;url=\"./index.php\"");
  }
  ?>
