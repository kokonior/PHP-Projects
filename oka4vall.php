<html><head><meta content="text/html; charset=ISO-8859-1" http-equiv="content-type"><title>Hacked By NorilaClasse</title></head>
<script type="text/javascript">
/*
Snow Fall 1 - no images - Java Script
Visit http://rainbow.arch.scriptmania.com/scripts/
  for this script and many more
*/

// Set the number of snowflakes (more than 30 - 40 not recommended)
var snowmax=35

// Set the colors for the snow. Add as many colors as you like
var snowcolor=new Array("#aaaacc","#ddddff","#ccccdd","#f3f3f3","#f0ffff")

// Set the fonts, that create the snowflakes. Add as many fonts as you like
var snowtype=new Array("Times","Arial","Times","Verdana")

// Set the letter that creates your snowflake (recommended: * )
var snowletter="*"

// Set the speed of sinking (recommended values range from 0.3 to 2)
var sinkspeed=0.6

// Set the maximum-size of your snowflakes
var snowmaxsize=30

// Set the minimal-size of your snowflakes
var snowminsize=8

// Set the snowing-zone
// Set 1 for all-over-snowing, set 2 for left-side-snowing
// Set 3 for center-snowing, set 4 for right-side-snowing
var snowingzone=1

///////////////////////////////////////////////////////////////////////////
// CONFIGURATION ENDS HERE
///////////////////////////////////////////////////////////////////////////


// Do not edit below this line
var snow=new Array()
var marginbottom
var marginright
var timer
var i_snow=0
var x_mv=new Array();
var crds=new Array();
var lftrght=new Array();
var browserinfos=navigator.userAgent
var ie5=document.all&&document.getElementById&&!browserinfos.match(/Opera/)
var ns6=document.getElementById&&!document.all
var opera=browserinfos.match(/Opera/)
var browserok=ie5||ns6||opera

function randommaker(range) {
        rand=Math.floor(range*Math.random())
    return rand
}

function initsnow() {
        if (ie5 || opera) {
                marginbottom = document.body.scrollHeight
                marginright = document.body.clientWidth-15
        }
        else if (ns6) {
                marginbottom = document.body.scrollHeight
                marginright = window.innerWidth-15
        }
        var snowsizerange=snowmaxsize-snowminsize
        for (i=0;i<=snowmax;i++) {
                crds[i] = 0;
            lftrght[i] = Math.random()*15;
            x_mv[i] = 0.03 + Math.random()/10;
                snow[i]=document.getElementById("s"+i)
                snow[i].style.fontFamily=snowtype[randommaker(snowtype.length)]
                snow[i].size=randommaker(snowsizerange)+snowminsize
                snow[i].style.fontSize=snow[i].size+'px';
                snow[i].style.color=snowcolor[randommaker(snowcolor.length)]
                snow[i].style.zIndex=1000
                snow[i].sink=sinkspeed*snow[i].size/5
                if (snowingzone==1) {snow[i].posx=randommaker(marginright-snow[i].size)}
                if (snowingzone==2) {snow[i].posx=randommaker(marginright/2-snow[i].size)}
                if (snowingzone==3) {snow[i].posx=randommaker(marginright/2-snow[i].size)+marginright/4}
                if (snowingzone==4) {snow[i].posx=randommaker(marginright/2-snow[i].size)+marginright/2}
                snow[i].posy=randommaker(2*marginbottom-marginbottom-2*snow[i].size)
                snow[i].style.left=snow[i].posx+'px';
                snow[i].style.top=snow[i].posy+'px';
        }
        movesnow()
}

function movesnow() {
        for (i=0;i<=snowmax;i++) {
                crds[i] += x_mv[i];
                snow[i].posy+=snow[i].sink
                snow[i].style.left=snow[i].posx+lftrght[i]*Math.sin(crds[i])+'px';
                snow[i].style.top=snow[i].posy+'px';

                if (snow[i].posy>=marginbottom-2*snow[i].size || parseInt(snow[i].style.left)>(marginright-3*lftrght[i])){
                        if (snowingzone==1) {snow[i].posx=randommaker(marginright-snow[i].size)}
                        if (snowingzone==2) {snow[i].posx=randommaker(marginright/2-snow[i].size)}
                        if (snowingzone==3) {snow[i].posx=randommaker(marginright/2-snow[i].size)+marginright/4}
                        if (snowingzone==4) {snow[i].posx=randommaker(marginright/2-snow[i].size)+marginright/2}
                        snow[i].posy=0
                }
        }
        var timer=setTimeout("movesnow()",50)
}

for (i=0;i<=snowmax;i++) {
        document.write("<span id='s"+i+"' style='position:absolute;top:-"+snowmaxsize+"'>"+snowletter+"</span>")
}
if (browserok) {
        window.onload=initsnow
}

</SCRIPT>
<p>
<font face="arial" size="-2">Free JavaScript from </font><br><font face="arial, helvetica" size="-2"><a href="http://rainbow.arch.scriptmania.com/scripts/">Rainbow Arch</a></font></p>
<script LANGUAGE="JavaScript">
<!-- Mouse Text Blur from Rainbow Arch -->
<!-- This script and many more from : -->
<!-- http://rainbow.arch.scriptmania.com -->

<!-- Mouse Text Blur from http://rainbow.arch.scriptmania.com

var n4=(document.layers);
var n6=(document.getElementById&&!document.all);
var ie=(document.all);
var o6=(navigator.appName.indexOf("Opera") != -1)?true:false;

//Things you can alter here...........
var msg="[+]~NorilaClasse~[+]~Was Here~[+]";
var fnt="Narkisim";
var clr="red";
var fsz=4;  //1 to 7 only
var del=0.6; //Delay speed, must be under 1
var num=(n6&&!o6)?10:20; //First value for N6 only. Struggles over 10
var stopafter=30; //Stop and clear after x seconds

//Alter nothing below............
var _d=(n4||ie)?'document.':'document.getElementById("';
var _a=(n4||n6)?'':'all.';
var _r=(n6)?'")':'';
var _s=(n4)?'':'.style';
var tmr=null;
var temp;
var y=0;
var x=0;
var put=false;
if (n4||n6){
window.captureEvents(Event.MOUSEMOVE);
function mouse1(e){
 if (put) return false;
 y = e.pageY+20-window.pageYOffset;
 x = e.pageX+20; 
 }
if (n4) window.onMouseMove=mouse1;                               
else document.onmousemove=mouse1;
}
if (ie||o6){
 function mouse2(){
 if (put) return false;
 y = (ie)?event.clientY+20:event.clientY+20-window.pageYOffset;
 x = event.clientX+20;
 } 
document.onmousemove=mouse2;
}
if (n4){
for (i=0; i < num; i++)
document.write('<layer name=text'+i+' top=0 left=0><font face='+fnt+' size='+fsz+' color='+clr+'>'+msg+'</font></layer>');
}
else{
if (ie){
document.write("<div id='outer' style='position:absolute;top:0px;left:0px'>
");
document.write("<div style='position:relative'>
");
}
for (i=0; i < num; i++)
document.write('<div id="text'+i+'" style="position:absolute;top:0px;left:0px;width:400px;height:20px"><font face='+fnt+' size='+fsz+' color='+clr+'>'+msg+'</font></div>
');
if (ie)
document.write("</div>
</div>
");
}
stopafter*=100000;
y1=new Array();
x1=new Array();
y2=new Array();
x2=new Array();
for (i=0; i < num; i++){
y1[i]=0;
x1[i]=0;
y2[i]=0;
x2[i]=0;
temp=eval(_d+_a+"text"+i+_r+_s);
}
var v=(n4)?"show":"visible";
function follow(){
sy=(n4||o6||n6)?window.pageYOffset:0;
if (ie) outer.style.pixelTop=document.body.scrollTop;
for (i=0; i < num; i++){
temp=eval(_d+_a+"text"+i+_r+_s);
temp.top=y1[i]+sy;
temp.left=x1[i];
temp.visibility=v;
}
}
function stagger(){
y1[0]=Math.round(y2[0]+=((y)-y2[0])*del);
x1[0]=Math.round(x2[0]+=((x)-x2[0])*del);
for (i=1; i < num; i++){
y1[i]=Math.round(y2[i]+=(y1[i-1]-y2[i])*del);
x1[i]=Math.round(x2[i]+=(x1[i-1]-x2[i])*del);
}
follow();
tmr=setTimeout('stagger()',20);
}
stagger();
function dsbl(){
v=(n4)?"hide":"hidden";
put=true;
x=0;
y=0;
setTimeout('clearTimeout(tmr)',stopafter+100000);
}
setTimeout('dsbl()',stopafter);
//-->
</SCRIPT>
<body style="background-color: black; color: rgb(0, 0, 0); height: 14px;" alink="#ee0000" link="#0000ee" vlink="#551a8b">
<body background="http://i50.tinypic.com/154x5s1.gif
" title="Pakistan Zindabad">
<div style="text-align: center; color: black; height: 0px;">
<font color="#00CC00" face="Iceland" size="8">#</font><big style="color: rgb(500, 1, 21);"><big><big><big>  HacKed by <span style="color: rgb(500, 1, 25);">NorilaClasse </span></big></big></big></big>    <font color="#00CC00" face="Iceland" size="8">#</font><pre><font color="#3a9dc6">   </font></pre>
<img style="width: 418px; height: 417px;" alt="" src="../store2.up-00.com/2016-07/1469292703541.jpg"><p align="center">
<font color="#3a9dc6" face="Iceland" size="8">#Op_Israel | Free_Palestine</font></p>
<p align="center">
<font color="#ffffff" face="Iceland" size="5"> 
<center>
<pre><font color="#00FF00" size="4">                     
__  __ ______  _____ _____         _____ ______     
|  \/  |  ____|/ ____/ ____|  /\   / ____|  ____|  _ 
| \  / | |__  | (___| (___   /  \ | |  __| |__    (_)
| |\/| |  __|  \___ \\___ \ / /\ \| | |_ |  __|      
| |  | | |____ ____) |___) / ____ \ |__| | |____   _ 
|_|  |_|______|_____/_____/_/    \_\_____|______| (_)
</font></pre>
</font></p>
<div class="ISD" align="center">
<font color="#ffffff" face="Iceland" size="5">Muslim Is Not A Terrorist </font></div>
<font color="#ffffff" face="Iceland" size="5">
<div class="email" align="center">
When <font color="#3a9dc6">America </font> Takes 1 Milliom Lives in iraq For Oil :<font color="red"> Not Terrorism </font></div>
<div class="email" align="center">
when <font color="#3a9dc6">serbs </font> rape Muslim women In Kosovo/bosnla :<font color="red"> Not Terrorism </font></div>
<div class="email" align="center">
When <font color="#3a9dc6">Russians </font> Kill  200.00 Cherchens In Bombings :<font color="red"> Not Terrorism </font></div>
<div class="email" align="center">
When <font color="#3a9dc6">Jews</font> Kik Out Palestinians And Take their Land : <font color="red"> Not Terrorism </font></div>
<div class="email" align="center">
When <font color="#3a9dc6">America </font> Drones Kill entire Family In Afghanistan/Pakistan : <font color="red"> Not Terrorism </font></div>
<div class="email" align="center">
When <font color="#3a9dc6">Israel</font> Kills 10.000 Lebanese Civilians Due to 2 mising Soldiers : <font color="red"> Not Terrorism </font></div>
<div class="email" align="center">
When <font color="#3a9dc6">Muslims</font> Retaliate and Show you How treat us : <font color="red"> Terrorism </font></div>
<div class="email" align="center">
IT seems Like The World <font color="red">"Terrorism"</font> is only Reserved For Muslims<<br><br>
<font size="3" color="#ffffff">contact me: </font><font size="3" color="#ff0000" > https://www.facebook.com/Hacker.NorilaClasse2/ </font> <br><br>
<div class="rblikebox">
<div>
<iframe src="https://www.facebook.com/plugins/likebox.php?href=https://www.facebook.com/Hacker.NorilaClasse2/&width=245&colorscheme=light&show_faces=true&connections=9&stream=false&header=false&height=270" scrolling="no" frameborder="0" scrolling="no" style="border: medium none; overflow: hidden; height: 270px; width: 245px;background:#fff;"></iframe></div>
</div>
</audio>
</div>
</font></div>
<br>
<iframe src="https://www.youtube.com/v/wzHM3HPxvbM&autoplay=1" __idm_id="80897" frameborder="no" height="0" scrolling="no" width="0"></iframe>
<br>
<br>
<br>
<span>
</span></body></html>
