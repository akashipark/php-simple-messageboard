<!--
   项目名称：明石留言板
   版本：V1.2
   时间：2021-1-29
   
   Copyright©2021 | Akashi Soft
   遵循 CC-BY-NC-SA 版权协议
   
   header.php
-->

<?php

header('Content-type:text/html; charset=utf-8');
session_start();

?>


<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1.0, user-scalable=no">
  <meta http-equiv="Cache-Control" content="no-siteapp" />
  <title><?php $nowwebname=@file_get_contents("./database/selfsetting/webname.dat"); echo $nowwebname; ?></title>
  <link rel="stylesheet" href="https://cdn.bootcdn.net/ajax/libs/mdui/1.0.1/css/mdui.min.css">
  <script src="https://cdn.bootcdn.net/ajax/libs/mdui/1.0.1/js/mdui.min.js"></script>
  <link rel="shortcut icon" type="image/x-icon" href="<?php $nowwebsign=@file_get_contents("./database/selfsetting/websign.dat"); echo $nowwebsign; ?>" media="screen" />

  <style>
    a {
      text-decoration:none
    }
    a:hover {
      text-decoration:none
    }
  </style>

  <style>
h1 {
	
	font-family: "PingFang SC Regular";
	
}
h3 {
	
	font-family: "PingFang SC Regular";
	
}

p {
	
	font-family: "PingFang SC Regular";
	
}

h2 {
	
	font-family: "PingFang SC Regular";
	
}

</style>

<style>  
@media (prefers-color-scheme: light) { 
.backgoundmode {  
  background:url(assets/background.png); 
  
} 
} 


@media (prefers-color-scheme: dark) { 
.backgoundmode {  
  
} 

.hellodark{
	color:white;
}
} 


@media (prefers-color-scheme: no-preference) { 

}

</style>



<script language="JavaScript">   // 网页简繁体转换

// 本js用于客户在网站页面选择繁体中文或简体中文显示，默认是正常显示，即简繁体同时显示
// 在用户第一次访问网页时,会自动检测客户端语言进行操作并提示.此功能可关闭
// 本程序只在UTF8编码下测试过，不保证其他编码有效
// -------------- 以下参数大部分可以更改 --------------------
//s = simplified 简体中文 t = traditional 繁体中文 n = normal 正常显示
var zh_default = 'n'; //默认语言，请不要改变
var zh_choose = 'n'; //当前选择
var zh_expires = 7; //cookie过期天数
var zh_class = 'zh_click'; //链接的class名，id为class + s/t/n 之一
var zh_style_active = 'font-weight:bold; color:green;'; //当前选择的链接式样
var zh_style_inactive = 'color:blue;'; //非当前选择的链接式样
var zh_browserLang = ''; //浏览器语言
var zh_autoLang_t = false; //浏览器语言为繁体时自动进行操作
var zh_autoLang_s = false; //浏览器语言为简体时自动进行操作
var zh_autoLang_alert = false; //自动操作后是否显示提示消息
//自动操作后的提示消息
var zh_autoLang_msg = '歡迎來到本站,本站爲方便台灣香港的用戶\n1.采用UTF-8國際編碼,用任何語言發帖都不用轉碼.\n2.自動判斷繁體用戶,顯示繁體網頁\n3.在網頁最上方有語言選擇,如果浏覽有問題時可以切換\n4.本消息在cookie有效期內只顯示一次';
var zh_autoLang_checked = 0; //次检测浏览器次数,第一次写cookie为1,提示后为2,今后将不再提示
//判断浏览器语言的正则,ie为小写,ff为大写
var zh_langReg_t = /^zh-tw|zh-hk$/i;
var zh_langReg_s = /^zh-cn$/i;
//简体繁体对照字表,可以自行替换
var zh_s = '皑蔼碍爱翱袄奥坝罢摆败颁办绊帮绑镑谤剥饱宝报鲍辈贝钡狈备惫绷笔毕毙闭边编贬变辩辫鳖瘪濒滨宾摈饼拨钵铂驳卜补参蚕残惭惨灿苍舱仓沧厕侧册测层诧搀掺蝉馋谗缠铲产阐颤场尝长偿肠厂畅钞车彻尘陈衬撑称惩诚骋痴迟驰耻齿炽冲虫宠畴踌筹绸丑橱厨锄雏础储触处传疮闯创锤纯绰辞词赐聪葱囱从丛凑窜错达带贷担单郸掸胆惮诞弹当挡党荡档捣岛祷导盗灯邓敌涤递缔点垫电淀钓调迭谍叠钉顶锭订东动栋冻斗犊独读赌镀锻断缎兑队对吨顿钝夺鹅额讹恶饿儿尔饵贰发罚阀珐矾钒烦范贩饭访纺飞废费纷坟奋愤粪丰枫锋风疯冯缝讽凤肤辐抚辅赋复负讣妇缚该钙盖干赶秆赣冈刚钢纲岗皋镐搁鸽阁铬个给龚宫巩贡钩沟构购够蛊顾剐关观馆惯贯广规硅归龟闺轨诡柜贵刽辊滚锅国过骇韩汉阂鹤贺横轰鸿红后壶护沪户哗华画划话怀坏欢环还缓换唤痪焕涣黄谎挥辉毁贿秽会烩汇讳诲绘荤浑伙获货祸击机积饥讥鸡绩缉极辑级挤几蓟剂济计记际继纪夹荚颊贾钾价驾歼监坚笺间艰缄茧检碱硷拣捡简俭减荐槛鉴践贱见键舰剑饯渐溅涧浆蒋桨奖讲酱胶浇骄娇搅铰矫侥脚饺缴绞轿较秸阶节茎惊经颈静镜径痉竞净纠厩旧驹举据锯惧剧鹃绢杰洁结诫届紧锦仅谨进晋烬尽劲荆觉决诀绝钧军骏开凯颗壳课垦恳抠库裤夸块侩宽矿旷况亏岿窥馈溃扩阔蜡腊莱来赖蓝栏拦篮阑兰澜谰揽览懒缆烂滥捞劳涝乐镭垒类泪篱离里鲤礼丽厉励砾历沥隶俩联莲连镰怜涟帘敛脸链恋炼练粮凉两辆谅疗辽镣猎临邻鳞凛赁龄铃凌灵岭领馏刘龙聋咙笼垄拢陇楼娄搂篓芦卢颅庐炉掳卤虏鲁赂禄录陆驴吕铝侣屡缕虑滤绿峦挛孪滦乱抡轮伦仑沦纶论萝罗逻锣箩骡骆络妈玛码蚂马骂吗买麦卖迈脉瞒馒蛮满谩猫锚铆贸么霉没镁门闷们锰梦谜弥觅绵缅庙灭悯闽鸣铭谬谋亩钠纳难挠脑恼闹馁腻撵捻酿鸟聂啮镊镍柠狞宁拧泞钮纽脓浓农疟诺欧鸥殴呕沤盘庞国爱赔喷鹏骗飘频贫苹凭评泼颇扑铺朴谱脐齐骑岂启气弃讫牵扦钎铅迁签谦钱钳潜浅谴堑枪呛墙蔷强抢锹桥乔侨翘窍窃钦亲轻氢倾顷请庆琼穷趋区躯驱龋颧权劝却鹊让饶扰绕热韧认纫荣绒软锐闰润洒萨鳃赛伞丧骚扫涩杀纱筛晒闪陕赡缮伤赏烧绍赊摄慑设绅审婶肾渗声绳胜圣师狮湿诗尸时蚀实识驶势释饰视试寿兽枢输书赎属术树竖数帅双谁税顺说硕烁丝饲耸怂颂讼诵擞苏诉肃虽绥岁孙损笋缩琐锁獭挞抬摊贪瘫滩坛谭谈叹汤烫涛绦腾誊锑题体屉条贴铁厅听烃铜统头图涂团颓蜕脱鸵驮驼椭洼袜弯湾顽万网韦违围为潍维苇伟伪纬谓卫温闻纹稳问瓮挝蜗涡窝呜钨乌诬无芜吴坞雾务误锡牺袭习铣戏细虾辖峡侠狭厦锨鲜纤咸贤衔闲显险现献县馅羡宪线厢镶乡详响项萧销晓啸蝎协挟携胁谐写泻谢锌衅兴汹锈绣虚嘘须许绪续轩悬选癣绚学勋询寻驯训讯逊压鸦鸭哑亚讶阉烟盐严颜阎艳厌砚彦谚验鸯杨扬疡阳痒养样瑶摇尧遥窑谣药爷页业叶医铱颐遗仪彝蚁艺亿忆义诣议谊译异绎荫阴银饮樱婴鹰应缨莹萤营荧蝇颖哟拥佣痈踊咏涌优忧邮铀犹游诱舆鱼渔娱与屿语吁御狱誉预驭鸳渊辕园员圆缘远愿约跃钥岳粤悦阅云郧匀陨运蕴酝晕韵杂灾载攒暂赞赃脏凿枣灶责择则泽贼赠扎札轧铡闸诈斋债毡盏斩辗崭栈战绽张涨帐账胀赵蛰辙锗这贞针侦诊镇阵挣睁狰帧郑证织职执纸挚掷帜质钟终种肿众诌轴皱昼骤猪诸诛烛瞩嘱贮铸筑驻专砖转赚桩庄装妆壮状锥赘坠缀谆浊兹资渍踪综总纵邹诅组钻致钟么为只凶准启板里雳余链泄';
var zh_t = '皚藹礙愛翺襖奧壩罷擺敗頒辦絆幫綁鎊謗剝飽寶報鮑輩貝鋇狽備憊繃筆畢斃閉邊編貶變辯辮鼈癟瀕濱賓擯餅撥缽鉑駁蔔補參蠶殘慚慘燦蒼艙倉滄廁側冊測層詫攙摻蟬饞讒纏鏟産闡顫場嘗長償腸廠暢鈔車徹塵陳襯撐稱懲誠騁癡遲馳恥齒熾沖蟲寵疇躊籌綢醜櫥廚鋤雛礎儲觸處傳瘡闖創錘純綽辭詞賜聰蔥囪從叢湊竄錯達帶貸擔單鄲撣膽憚誕彈當擋黨蕩檔搗島禱導盜燈鄧敵滌遞締點墊電澱釣調叠諜疊釘頂錠訂東動棟凍鬥犢獨讀賭鍍鍛斷緞兌隊對噸頓鈍奪鵝額訛惡餓兒爾餌貳發罰閥琺礬釩煩範販飯訪紡飛廢費紛墳奮憤糞豐楓鋒風瘋馮縫諷鳳膚輻撫輔賦複負訃婦縛該鈣蓋幹趕稈贛岡剛鋼綱崗臯鎬擱鴿閣鉻個給龔宮鞏貢鈎溝構購夠蠱顧剮關觀館慣貫廣規矽歸龜閨軌詭櫃貴劊輥滾鍋國過駭韓漢閡鶴賀橫轟鴻紅後壺護滬戶嘩華畫劃話懷壞歡環還緩換喚瘓煥渙黃謊揮輝毀賄穢會燴彙諱誨繪葷渾夥獲貨禍擊機積饑譏雞績緝極輯級擠幾薊劑濟計記際繼紀夾莢頰賈鉀價駕殲監堅箋間艱緘繭檢堿鹼揀撿簡儉減薦檻鑒踐賤見鍵艦劍餞漸濺澗漿蔣槳獎講醬膠澆驕嬌攪鉸矯僥腳餃繳絞轎較稭階節莖驚經頸靜鏡徑痙競淨糾廄舊駒舉據鋸懼劇鵑絹傑潔結誡屆緊錦僅謹進晉燼盡勁荊覺決訣絕鈞軍駿開凱顆殼課墾懇摳庫褲誇塊儈寬礦曠況虧巋窺饋潰擴闊蠟臘萊來賴藍欄攔籃闌蘭瀾讕攬覽懶纜爛濫撈勞澇樂鐳壘類淚籬離裏鯉禮麗厲勵礫曆瀝隸倆聯蓮連鐮憐漣簾斂臉鏈戀煉練糧涼兩輛諒療遼鐐獵臨鄰鱗凜賃齡鈴淩靈嶺領餾劉龍聾嚨籠壟攏隴樓婁摟簍蘆盧顱廬爐擄鹵虜魯賂祿錄陸驢呂鋁侶屢縷慮濾綠巒攣孿灤亂掄輪倫侖淪綸論蘿羅邏鑼籮騾駱絡媽瑪碼螞馬罵嗎買麥賣邁脈瞞饅蠻滿謾貓錨鉚貿麽黴沒鎂門悶們錳夢謎彌覓綿緬廟滅憫閩鳴銘謬謀畝鈉納難撓腦惱鬧餒膩攆撚釀鳥聶齧鑷鎳檸獰甯擰濘鈕紐膿濃農瘧諾歐鷗毆嘔漚盤龐國愛賠噴鵬騙飄頻貧蘋憑評潑頗撲鋪樸譜臍齊騎豈啓氣棄訖牽扡釺鉛遷簽謙錢鉗潛淺譴塹槍嗆牆薔強搶鍬橋喬僑翹竅竊欽親輕氫傾頃請慶瓊窮趨區軀驅齲顴權勸卻鵲讓饒擾繞熱韌認紉榮絨軟銳閏潤灑薩鰓賽傘喪騷掃澀殺紗篩曬閃陝贍繕傷賞燒紹賒攝懾設紳審嬸腎滲聲繩勝聖師獅濕詩屍時蝕實識駛勢釋飾視試壽獸樞輸書贖屬術樹豎數帥雙誰稅順說碩爍絲飼聳慫頌訟誦擻蘇訴肅雖綏歲孫損筍縮瑣鎖獺撻擡攤貪癱灘壇譚談歎湯燙濤縧騰謄銻題體屜條貼鐵廳聽烴銅統頭圖塗團頹蛻脫鴕馱駝橢窪襪彎灣頑萬網韋違圍爲濰維葦偉僞緯謂衛溫聞紋穩問甕撾蝸渦窩嗚鎢烏誣無蕪吳塢霧務誤錫犧襲習銑戲細蝦轄峽俠狹廈鍁鮮纖鹹賢銜閑顯險現獻縣餡羨憲線廂鑲鄉詳響項蕭銷曉嘯蠍協挾攜脅諧寫瀉謝鋅釁興洶鏽繡虛噓須許緒續軒懸選癬絢學勳詢尋馴訓訊遜壓鴉鴨啞亞訝閹煙鹽嚴顔閻豔厭硯彥諺驗鴦楊揚瘍陽癢養樣瑤搖堯遙窯謠藥爺頁業葉醫銥頤遺儀彜蟻藝億憶義詣議誼譯異繹蔭陰銀飲櫻嬰鷹應纓瑩螢營熒蠅穎喲擁傭癰踴詠湧優憂郵鈾猶遊誘輿魚漁娛與嶼語籲禦獄譽預馭鴛淵轅園員圓緣遠願約躍鑰嶽粵悅閱雲鄖勻隕運蘊醞暈韻雜災載攢暫贊贓髒鑿棗竈責擇則澤賊贈紮劄軋鍘閘詐齋債氈盞斬輾嶄棧戰綻張漲帳賬脹趙蟄轍鍺這貞針偵診鎮陣掙睜猙幀鄭證織職執紙摯擲幟質鍾終種腫衆謅軸皺晝驟豬諸誅燭矚囑貯鑄築駐專磚轉賺樁莊裝妝壯狀錐贅墜綴諄濁茲資漬蹤綜總縱鄒詛組鑽緻鐘麼為隻兇準啟闆裡靂餘鍊洩';
String.prototype.tran = function() {
var s1,s2;
if (zh_choose == 't') {
   s1 = zh_s;
   s2 = zh_t;
}else if(zh_choose == 's') {
   s1 = zh_t;
   s2 = zh_s;
}else {
   return this;
}
var a = '';
var l = this.length;
for(var i=0;i<this.length;i++){
        var c = this.charAt(i);
        var p = s1.indexOf(c)
        a += p < 0 ? c : s2.charAt(p);
    }
return a;
}
function setCookie(name, value) {
var argv = setCookie.arguments;
var argc = setCookie.arguments.length;
var expires = (argc > 2) ? argv[2] : null;
if (expires != null) {
   var LargeExpDate = new Date ();
   LargeExpDate.setTime(LargeExpDate.getTime() + (expires*1000*3600*24));
}
document.cookie = name + "=" + escape (value)+((expires == null) ? "" : ("; expires=" +LargeExpDate.toGMTString()));
}
function getCookie(Name) {
var search = Name + "="
if (document.cookie.length > 0) {
   offset = document.cookie.indexOf(search);
   if(offset != -1) {
    offset += search.length;
    end = document.cookie.indexOf(";", offset);
    if(end == -1) end = document.cookie.length;
    return unescape(document.cookie.substring(offset, end));
   }else {
    return '';
   }
}
}
function zh_tranBody(obj) {
var o = (typeof(obj) == "object") ? obj.childNodes : document.body.childNodes;
for (var i = 0; i < o.length; i++) {
   var c = o.item(i);
   if ('||BR|HR|TEXTAREA|SCRIPT|'.indexOf("|"+c.tagName+"|") > 0) continue;
   if (c.className == zh_class) {
    if (c.id == zh_class + '_' + zh_choose) {
     c.setAttribute('style', zh_style_active);
     c.style.cssText = zh_style_active;
    }else {
     c.setAttribute('style', zh_style_inactive);
     c.style.cssText = zh_style_inactive;
    }
    continue;   
   }
   if (c.title != '' && c.title != null) c.title = c.title.tran();
   if (c.alt != '' && c.alt != null) c.alt = c.alt.tran();
   if (c.tagName == "INPUT" && c.value != '' && c.type != 'text' && c.type != 'hidden' && c.type != 'password') c.value = c.value.tran();
   if (c.nodeType == 3) {
    c.data = c.data.tran();  
   }else{
    zh_tranBody(c);
   }
}
}
function zh_tran(go) {
if (go) zh_choose = go;
setCookie('zh_choose', zh_choose, zh_expires);
if (go == 'n') {
   window.location.reload();
}else {
   zh_tranBody();
}
}
function zh_getLang() {
if (getCookie('zh_choose')) {
   zh_choose = getCookie('zh_choose');
   return true;
}
if (!zh_autoLang_t && !zh_autoLang_s) return false;
if (getCookie('zh_autoLang_checked')) return false;
if (navigator.language) {
   zh_browserLang = navigator.language;
}else if (navigator.browserLanguage) {
   zh_browserLang = navigator.browserLanguage;
}
if (zh_autoLang_t && zh_langReg_t.test(zh_browserLang)) {
   zh_choose = 't';
}else if (zh_autoLang_s && zh_langReg_s.test(zh_browserLang)) {
   zh_choose = 's';
}
zh_autoLang_checked = 1;
setCookie('zh_choose', zh_choose, zh_expires);
if (zh_choose == zh_default) return false;
return true;
}
function zh_init() {
zh_getLang();
c = document.getElementById(zh_class + '_' + zh_choose);
if (zh_choose != zh_default) {
   if (window.onload) {
    window.onload_before_zh_init = window.onload;
    window.onload = function() {
     zh_tran(zh_choose);
     if (getCookie('zh_autoLang_check')) {alert(zh_autoLang_msg);};
     window.onload_before_zh_init();
     };
   }else {
    window.onload = function() {
     zh_tran(zh_choose);
     if (getCookie('zh_autoLang_check')) {alert(zh_autoLang_msg);};
     };
   }
}
}
zh_init();
</script>

<!--[if lt IE 9]>
<style>.alert { padding: 15px; margin-bottom: 20px; border: 1px solid transparent; border-radius: 4px } .alert-danger { background-color: #f2dede; border-color: #ebccd1; color: #a94442; border-bottom: 1px solid #ebccd1 } .alert-link { color: #843534; font-weight: bold } .topframe { margin: 0; padding-left: 15px; padding-right: 15px; text-align: center; border-radius: 0; position: fixed; left: 0; right: 0; top: 0; z-index: 1000 }
</style><div class="alert alert-danger topframe"><br><h1>本站点不支持IE9及以下浏览器访问</h1><br><h3>不会吧不会吧，都1202年啦，还在人在用 不安全、访问又慢的IE浏览器？？</h3><a class="alert-link" target="_blank" href="https://browsehappy.com">立即升级</a><br><br><br><br><br><br><br><br><br><br><br><br><br><br><h2>你还想继续用这个浏览器访问？</h2><br><h3>不好意思，没做适配，就这样的烂摊子看你愿意用不</h3></div><script src="https://cdn.bootcss.com/html5shiv/r29/html5.min.js"></script><script src="https://cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script><![endif]-->

</head>
<header class="mdui-appbar mdui-appbar-fixed ">
  <body class="backgoundmode mdui-theme-layout-auto mdui-drawer-body-left mdui-appbar-with-toolbar mdui-theme-primary-white">
   

  <?php   //IP黑白名单检测
$ip=$_SERVER["REMOTE_ADDR"];

$ban=@file_get_contents("./database/ban/ban.dat");

if(stripos($ban,$ip))
{
exit("<center><h1>Your IP [$ip] are forbiden to view this page!</h1><h2>If you have any question, please contact the webmaster</h2></center>");
}
?>


   <div class="mdui-fab-wrapper" mdui-fab="">
      <button class="mdui-fab mdui-ripple mdui-color-theme-accent mdui-fab-opened">
        <i class="mdui-icon material-icons">language</i>
        <i class="mdui-icon mdui-fab-opened material-icons">cached</i>
      </button>
      <div class="mdui-fab-dial mdui-fab-dial-show" style="height: auto;">
        <button class="mdui-fab mdui-fab-mini mdui-ripple mdui-color-orange mdui-fab-opened" style="transition-delay: 30ms;" onclick="zh_tran('s');">简</button>
        <button class="mdui-fab mdui-fab-mini mdui-ripple mdui-color-pink mdui-fab-opened" style="transition-delay: 15ms;" onclick="zh_tran('t');">繁</button>
		

      </div>
    </div>
   
    <div class="mdui-toolbar mdui-color-theme">
      <span class="mdui-btn mdui-btn-icon mdui-ripple mdui-ripple-white" mdui-drawer="{target: '#main-drawer'}">
        <i class="mdui-icon material-icons">menu</i>
      </span>
      <a href="" class="mdui-typo-title"><?php echo $nowwebname; ?></a>
	  
	  
	  
	  

  </div>
    </header>
    <div class="mdui-drawer" id="main-drawer">
      <div class="mdui-list" mdui-collapse="{accordion: true}" style="margin-bottom: 68px;">
        <div class="mdui-list">
          <a href="./index.php" class="mdui-list-item">
            <i class="mdui-list-item-icon mdui-icon material-icons">filter_none</i>
            &emsp;主页
          </a>
		  




          <a href="./admin.php" class="mdui-list-item">
            <i class="mdui-list-item-icon mdui-icon material-icons">build</i>
            &emsp;后台管理<?php 
	
   
	
 
	// 首先判断Cookie是否有记住了用户信息
	if (isset($_COOKIE['username'])) {
		# 若记住了用户信息,则直接传给Session
		$_SESSION['username'] = $_COOKIE['username'];
		$_SESSION['islogin'] = 1;
	}
	if (isset($_SESSION['islogin'])) {
		echo'(已登录)';
	} else {
		// 若没有登录
		echo'(未登录)';
		echo'';
	}
 ?>
          </a>
        </div>
        <a href="https://yesalan.top" target="_blank" class="mdui-list-item">
          <i class="mdui-list-item-icon mdui-icon material-icons">favorite_border</i>
          &emsp;明石's blog
        </a>
		<a href="https://github.com/akashipark" target="_blank" class="mdui-list-item">
          <i class="mdui-list-item-icon mdui-icon material-icons">code</i>
          &emsp;明石的Github
        </a>
		
		
		<div class="mdui-collapse-item ">
          <div class="mdui-collapse-item-header mdui-list-item mdui-ripple">
          <i class="mdui-list-item-icon mdui-icon material-icons">date_range</i>
            &emsp;站点统计信息
            <i class="mdui-list-item-icon mdui-icon material-icons">keyboard_arrow_down</i>
          </div>
         
		  <div class="mdui-collapse-item-body mdui-list">
      
      <?php
$file             = "./database/count.txt"; // 记数文件名称
$startno          = "1000";   // 起始数值
$tempfile         = "./database/temp.txt"; 
$t_now   = time();
$t_array = getdate($t_now);
$day     = $t_array['mday'];
$mon     = $t_array['mon'];
$year    = $t_array['year'];
if (file_exists("$file")) {
        $count_info=file("$file");
        $c_info = explode(",", $count_info[0]);
        $total_c=$c_info[0];
        $yesterday_c=$c_info[1];
        $today_c=$c_info[2];
        $lastday=$c_info[3];
} else {
        $total_c="$startno";
        $yesterday_c="0";
        $today_c="0";
        $lastday="0";
}

if ( !isset($HTTP_COOKIE_VARS["countcookie"]) || $HTTP_COOKIE_VARS["countcookie"] != $day) {
        $your_c=1;
        $lockfile=fopen("./database/temp.txt","a");
        flock($lockfile,3);
        putenv('TZ=JST-9');
 
        $t_array2 = getdate($t_now-24*3600);
        $day2=$t_array2['mday'];
        $mon2=$t_array2['mon'];
        $year2=$t_array2['year'];
        $today = "$year-$mon-$day";
        $yesterday = "$year2-$mon2-$day2";
        if ($today != $lastday) {
    
                     if ($yesterday != $lastday) $yesterday_c = "0";
                              else $yesterday_c = $today_c;
    
                $today_c = 0;
                $lastday = $today;
        }
        $total_c++;
        $today_c++;
        $total_c     = sprintf("%06d", $total_c);
        $today_c     = sprintf("%06d", $today_c);
        $yesterday_c = sprintf("%06d", $yesterday_c);
        @setcookie("countcookie","$day",$t_now+43200);
        $fp=fopen("$file","w");
        fputs($fp, "$total_c,$yesterday_c,$today_c,$lastday");
        fclose($fp);
        fclose($lockfile);
}
if ( empty( $your_c ) ) $your_c = 1;
@setcookie("yourcount",$your_c+1,$t_now+43200);
$your_c = sprintf("%06d", $your_c);
///////////////////////////////////////////////////////
echo "<br>";
echo "<li>&nbsp&nbsp&nbsp&nbsp总访问数:".$total_c."</li>";
echo "<br>";
echo "<li>&nbsp&nbsp&nbsp&nbsp昨日访问数:".$yesterday_c."</li>";
echo "<br>";
echo "<li>&nbsp&nbsp&nbsp&nbsp今日访问数:".$today_c."</li>";
?>
          </div>
        </div>
		<br>
    <br>
		
		<div class="hellodark">



<script language="JavaScript">
var mess="";

day = new Date( )

hr = day.getHours( )
if (( hr >= 4) && (hr <= 6 ))
mess="&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp天还没亮，<br>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp夜猫子，快休息啦！ "
if (( hr > 6 ) && (hr < 7))
mess="&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp早上好，<br>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp起得真早呀 "
if (( hr >= 7 ) && (hr < 12))
mess="&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp上午好！<br>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp从现在开始美好的一天吧"
if (( hr >= 12) && (hr <= 13))
mess="&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp中午好呀！<br>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp别太为难自己的肚子哦！"
if (( hr > 13) && (hr <= 16))
mess="&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp下午好，<br>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp喝杯茶再继续奋斗吧！ "
if (( hr > 16) && (hr <= 18))
mess="&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp傍晚了呢，<br>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp我大概在吃晚饭了，你呢？"
if ((hr > 18) && (hr < 21))
mess="&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp晚上了，<br>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp总结一下一天的收获吧！"
if ((hr >= 21) && (hr <= 23))
mess="&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp夜已深，<br>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp该睡觉了呢！"
if ((hr > 23) && (hr < 4))
mess="&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp很晚了哦，<br>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp注意休息呀！"
document.write(mess)
</script>

</div>
        
      </div>
    </div>
    <br/>
