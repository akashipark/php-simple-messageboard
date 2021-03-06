<!--
   项目名称：明石留言板
   版本：V1.8
   时间：2021-2-21
   
   Copyright©2021 | Akashi Soft
   遵循 CC-BY-NC-SA 版权协议
   
   about.php
-->

<?php 

require_once( 'header.php');

?> 

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
     
	<form action="http://versioncheck.imakashi.top/" method="post">
  <input type="hidden" name="versioncheck-softname" value="Akashi-Messageboard">
  <input type="hidden" name="versioncheck-version" value="versioncheck-AMB-V1.8.1">
<button class="mdui-btn mdui-color-theme-accent mdui-ripple" type="submit">检查更新</button>
	</form>
    </div>
  </div>

  <!-- 卡片的标题和副标题 -->
  <div class="mdui-card-primary">
    <div class="mdui-card-primary-title">明石留言板 [V1.8.1]</div>
    <div class="mdui-card-primary-subtitle">Akashi Messagebox(Without database)</div>
  </div>

  

  <blockquote>
  <h3> 作者：明石       
  <div class="mdui-card-actions">
    <a class="mdui-btn mdui-ripple" href="https://github.com/akashipark" target="_blank" >GITHUB</a>
    <a class="mdui-btn mdui-ripple" href="https://imakashi.top" target="_blank" >BLOG</a>
  </div>  
<img src ="https://th.bing.com/th/id/Rff115f863fc1bc9e80ed1813a46f26f6?rik=rAB%2bJWkqlFI%2fvQ&riu=http%3a%2f%2fconogasi.org%2fwp-content%2fuploads%2f2017%2f05%2fCC-BY-NC-SA-4.0.jpg" height="66" width="170" />      
  <br>
遵循 CC-BY-NC-SA 版权协议
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


<?php include 'footer.php';?>

