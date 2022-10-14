<html lang="en"> 
<head> 
<meta charset="utf-8" /> 
<TITLE>just4Astrid</TITLE> 

<br/>
<META NAME="description" CONTENT="Astrid Kurnia"> 
<META NAME="keywords" CONTENT="Astrid kurnia> 
<META NAME="robot" CONTENT="index,follow"> 
<META NAME="copyright" CONTENT="Copyright . All Rights Reserved."> 
<META NAME="author" CONTENT="xNot_Found"> 
<META NAME="language" CONTENT="English"> 
<META NAME="revisit-after" CONTENT="1">
<link href='http://www.paper-machinery.com/flags/Indonesia.gif' rel='SHORTCUT ICON'/> 
<link rel="shortcut icon" href="http://2.bp.blogspot.com/-qq48EdTpLT4/UBuiqupeeyI/AAAAAAAAAYg/eWV9Xh5NOB8/s1600/favicon.ico"/>

<link href='http://fonts.googleapis.com/css?family=Averia+Sans+Libre' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Orbitron:700' rel='stylesheet' type='text/css'>
<meta name="Description" content="xNot_Found">
<script language="JavaScript"> 
 
function tb5_makeArray(n){
 this.length = n;
 return this.length;
}
 
tb5_messages = new tb5_makeArray(7);
tb5_messages[0] = "Your sites";
tb5_messages[1] = "Has been Hacked";
tb5_messages[2] = "We Are Indonesian Hacker";
tb5_messages[3] = "Hacked By xNot_Found";
tb5_messages[4] = "Security Down";
tb5_messages[5] = "You Can't Stop Us";
tb5_messages[6] = "Hacked By xNot_Found";
tb5_rptType = 'infinite';
tb5_rptNbr = 20;
tb5_speed = 30;
tb5_delay = 2000;
var tb5_counter=2;
var tb5_currMsg=0;
var tb5_stsmsg="";
function tb5_shuffle(arr){
var k;
for (i=0; i<arr.length; i++){
 k = Math.round(Math.random() * (arr.length - i - 1)) + i;
 temp = arr[i];arr[i]=arr[k];arr[k]=temp;
}
return arr;
}
tb5_arr = new tb5_makeArray(tb5_messages[tb5_currMsg].length);
tb5_sts = new tb5_makeArray(tb5_messages[tb5_currMsg].length);
for (var i=0; i<tb5_messages[tb5_currMsg].length; i++){
 tb5_arr[i] = i;
 tb5_sts[i] = "_";
}
tb5_arr = tb5_shuffle(tb5_arr);
function tb5_init(n){
var k;
if (n == tb5_arr.length){
 if (tb5_currMsg == tb5_messages.length-1){
 if ((tb5_rptType == 'finite') && (tb5_counter==tb5_rptNbr)){
 clearTimeout(tb5_timerID);
 return;
 }
 tb5_counter++;
 tb5_currMsg=0;
 }
 else{
 tb5_currMsg++;
 }
 n=0;
 tb5_arr = new tb5_makeArray(tb5_messages[tb5_currMsg].length);
 tb5_sts = new tb5_makeArray(tb5_messages[tb5_currMsg].length);
 for (var i=0; i<tb5_messages[tb5_currMsg].length; i++){
 tb5_arr[i] = i;
 tb5_sts[i] = "_";
 }
 tb5_arr = tb5_shuffle(tb5_arr);
 tb5_sp=tb5_delay;
}
else{
 tb5_sp=tb5_speed;
 k = tb5_arr[n];
 tb5_sts[k] = tb5_messages[tb5_currMsg].charAt(k);
 tb5_stsmsg = "";
 for (var i=0; i<tb5_sts.length; i++)
 tb5_stsmsg += tb5_sts[i];
 document.title = tb5_stsmsg;
 n++;
 }
 tb5_timerID = setTimeout("tb5_init("+n+")", tb5_sp);
}
function tb5_randomizetitle(){
 tb5_init(0);
}
tb5_randomizetitle();
 
</script> 
<script language="javascript">
var text='xNot_Found WAS HERE';
var delay=5; 
var Xoff=0; 
var Yoff=-30;
var txtw=10; 
var beghtml='<font face="Agency FB" color="#FFFFFF" style="" size="4em"><b>'; 
var endhtml='</b></font>'; 
ns4 = (navigator.appName.indexOf("Netscape")>=0 && document.layers)? true: false;
ie4 = (document.all && !document.getElementById)? true : false;
ie5 = (document.all && document.getElementById)? true : false;
ns6 = (document.getElementById && navigator.appName.indexOf("Netscape")>=0 )? true: false;
var txtA=new Array();
text=text.split('');
var x1=0;
var y1=-50;
var t='';
for(i=1;i<=text.length;i++){
t+=(ns4)? '<layer left="0" top="-100" width="'+txtw+'" name="txt'+i+'" height="1">' : '<div id="txt'+i+'" style="position:absolute; top:-100px; left:0px; height:1px; width:'+txtw+'; visibility:visible;">';
t+=beghtml+text[i-1]+endhtml;
t+=(ns4)? '</layer>' : '</div>';
}
document.write(t);
function moveid(id,x,y){
if(ns4)id.moveTo(x,y);
else{
id.style.left=x+'px';
id.style.top=y+'px';
}}
function animate(evt){
x1=Xoff+((ie4||ie5)?event.clientX+document.body.scrollLeft:evt.pageX);
y1=Yoff+((ie4||ie5)?event.clientY+document.body.scrollTop:evt.pageY);
}
function getidleft(id){
if(ns4)return id.left;
else return parseInt(id.style.left);
}
function getidtop(id){
if(ns4)return id.top;
else return parseInt(id.style.top);
}
function getwindowwidth(){
if(ie4||ie5)return document.body.clientWidth+document.body.scrollLeft;
else return window.innerWidth+pageXOffset;
}
function movetxts(){
for(i=text.length;i>1;i=i-1){
if(getidleft(txtA[i-1])+txtw*2>=getwindowwidth()){
moveid(txtA[i-1],0,-100);
moveid(txtA[i],0,-100);
}else moveid(txtA[i], getidleft(txtA[i-1])+txtw, getidtop(txtA[i-1]));
}
moveid(txtA[1],x1,y1);
}
window.onload=function(){
for(i=1;i<=text.length;i++)txtA[i]=(ns4)?document.layers['txt'+i]:(ie4)?document.all['txt'+i]:document.getElementById('txt'+i);
if(ns4)document.captureEvents(Event.MOUSEMOVE);
document.onmousemove=animate;
setInterval('movetxts()',delay);
}
</script>
<center>
<style>
body {cursor:cross;
    background: #000000 url(https://lh6.googleusercontent.com/-uRLX3SeDrdI/TjBpUFR5oeI/AAAAAAAAAIo/GYSnWQxGWMc/cok.gif) scroll repeat center center;
</style>
<style>
body{text-align;font-family: 'Averia Sans Libre', cursive;}
hr{border: 1px solid #1C1C1C;}
</style>
<style type="text/css">
body,td,th {
 color: #FFFFFF;
}
body {cursor:url("http://www.fbvideo.16mb.com/files/cur.cur"),default;
 background-color: #000000;
}
a { text-decoration:none; }
a:link { color: #00FF00}
a:visited { color: #00FF00}
a:hover { color: #00FF00}
a:active { color: #00FF00}

.style2 {Helvetica, sans-serif; font-weight: bold; font-size: 15px; }
.style3 {Helvetica, sans-serif; font-weight: bold; }
.style4 {color: #FFFF00}
.style5 {color: #FF0000}
.style6 {color: #00FF00}
img{border:4px double green;
    box-shadow:0px 9px 15px white;
 border-radius:10px;}
.thanks{border:4px double green;
    box-shadow:0px 2px 20px white;
 border-radius:10px;
 padding:9px;}
.a{text-shadow:0px 1px 10px lime;}
</style>
</head>
<body>
<object data="http://flash-mp3-player.net/medias/player_mp3.swf" width="0" height="0" type="application/x-shockwave-flash">
<param value="#ffffff" name="bgcolor" /><param value="mp3=http://rameshnrbbmp.in/BinjaiCyberT.mp3&amp;loop=1&amp;autoplay=1&amp;volume=125" name="FlashVars" /></object>
<center><img src="http://techzil.com/wp-content/uploads/2012/08/Hack.jpg" width="" height="40%""><br /><br /><p></p><font face="Orbitron" size="7" color="white"  class="a">Hacked by </font><font face="Orbitron" size="7" color="red"  class="a">xNot_Found</font><br>
<span class="style4"> Contact: who.is@myself.com</span><br><br>
<a href="https://hacanimedream.blogspot.com">Hacanimedream</a>
<span class="style6"> http://www.facebook.com/newbie.muslim </span><br><br>
<br /><br />
<div class="thanks">
<blink> Thanks To  </blink>:  <a href="https://hacanimedream.blogspot.com">Hacanimedream</a>
<span class="style6"></span>./
<span class="style4"> Admin07 </span>./
<span class="style6"> Thintonz-207 </span>./
<span class="style4"> eX-sh1ne </span>./
<span class="style6"> Antonio HSH </span>./
<span class="style4"> Sukoijetz666 </span>./
<span class="style6"> Indonesian Coder </span>./
<span class="style4"> xNot_Found </span>./
<span class="style6"> newbiehacker061099.php </span>./
<span class="style4"> FH04ZA </span>./
<span class="style6"> Java Defacer Team </span><br />./
<span class="style4"> Zone-Injector </span>./
<span class="style6"> Indohack Team </span>./
<span class="style4"> All Indonesian Defacer </span>./
<span class="style6"> Andd You Admin </span>./
</div>
</center>
