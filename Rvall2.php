<html>
<head>
<link href='http://fonts.googleapis.com/css?family=Fauna+One' rel='stylesheet' type='text/css'>
<link rel='shortcut icon' href='http://moddingesp.es/favicon.ico'></link>

<head>
<script language="JavaScript">
var brzinakucanja = 200;
var pauzapor = 2000;
var vremeid = null;
var kretanje = false;
var poruka = new Array();
var slporuka = 0;
var bezporuke = 0;
poruka[0] = " | [ Hacked By 'ANONXY
function prikaz() {
var text = poruka[slporuka];
if (bezporuke < text.length) {
if (text.charAt(bezporuke) == " ")
bezporuke++
var ttporuka = text.substring(0, bezporuke + 1);
document.title = ttporuka;
bezporuke++
vremeid = setTimeout("prikaz()", brzinakucanja);
kretanje = true;
} else {
bezporuke = 0;
slporuka++
if (slporuka == poruka.length)
slporuka = 0;
vremeid = setTimeout("prikaz()", pauzapor);
kretanje = true;
}
}
function stop() {
if (kretanje)
clearTimeout(vremeid);
kretanje = false
}
function start() {
stop();
prikaz();
}
start();
</script>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<meta name="keywords" content=" | [ Hacked By 'ANONXY ]
<meta HTTP-EQUIV="Content-Type" content="text/html; charset=iso-8859-1" />
<meta name="description" content=" | [ Hacked By # 'SkyHacker   ] |"><script type="text/javascript">
//<![CDATA[
try{if (!window.CloudFlare) { var CloudFlare=[{verbose:0,p:0,byc:0,owlid:0,mirage:0,oracle:0,paths:{cloudflare:"/cdn-cgi/nexp/v=2965651658/"},atok:"46d7245de8fe7573628a114e8d9dabf4",zone:"zonehmirrors.net",rocket:"0",apps:{"dnschanger_detector":{"fix_url":null}}}];document.write('<script type="text/javascript" src="//ajax.cloudflare.com/cdn-cgi/nexp/v=3037830340/cloudflare.min.js"><'+'\/script>')}}catch(a){};
//]]>
</script>
<script type="text/javascript">
//<![CDATA[
window.__CF=window.__CF||{};window.__CF.AJS={"dnschanger_detector":{"fix_url":null}};
//]]>
</script>

<title> | [ Hacked By 'ANONXY   ] |</title>

<script src="http://code.jquery.com/jquery-latest.min.js"></script>

<script>
//

var current_type = 1;
(function($) {
 
    function shuffle(a) {
        var i = a.length, j;
        while (i) {
            var j = Math.floor((i--) * Math.random());
            var t = a[i];
            a[i] = a[j];
            a[j] = t;
        }
    }
 
    function randomAlphaNum() {
        var rnd = Math.floor(Math.random() * 62);
        if (rnd >= 52) return String.fromCharCode(rnd - 4);
        else if (rnd >= 26) return String.fromCharCode(rnd + 71);
        else return String.fromCharCode(rnd + 65);
    }
 
    $.fn.rot13 = function() {
        this.each(function() {
            $(this).text($(this).text().replace(/[a-z0-9]/ig, function(chr) {
                var cc = chr.charCodeAt(0);
                if (cc >= 65 && cc <= 90) cc = 65 + ((cc - 52) % 26);
                else if (cc >= 97 && cc <= 122) cc = 97 + ((cc - 84) % 26);
                else if (cc >= 48 && cc <= 57) cc = 48 + ((cc - 43) % 10);
                return String.fromCharCode(cc);
            }));
        });
        return this;
    };
 
    $.fn.scrambledWriter = function() {
        this.each(function() {
            var $ele = $(this), str = $ele.text(), progress = 0, replace = /[^\s]/g,
                random = randomAlphaNum, inc = 3;
            $ele.text('');
            var timer = setInterval(function() {
                $ele.text(str.substring(0, progress) + str.substring(progress, str.length - 1).replace(replace, random));
                progress += inc
                if (progress >= str.length + inc) { var nstr = $ele.text(); $ele.text(nstr.substring(0,nstr.length - 1));  current_type += 1; clearInterval(timer);}
            }, 100);
        });
        return this;
    };
 
    $.fn.typewriter = function() {
        this.each(function() {
            var $ele = $(this), str = $ele.html(), progress = 0;
            $ele.html('');
            var timer = setInterval(function() {
                $ele.html(str.substring(0, progress++) + (progress & 1 ? '_' : ''));
                if (progress >= str.length) { current_type += 1; clearInterval(timer);}
            }, 100);
        });
     
        return this;
    };
 
    $.fn.unscramble = function() {
        this.each(function() {
            var $ele = $(this), str = $ele.text(), replace = /[^\s]/,
                state = [], choose = [], reveal = 25, random = randomAlphaNum;
         
            for (var i = 0; i < str.length; i++) {
                if (str[i].match(replace)) {
                    state.push(random());
                    choose.push(i);
                } else {
                    state.push(str[i]);
                }
            }
         
            shuffle(choose);
            $ele.text(state.join(''));
         
            var timer = setInterval(function() {
                var i, r = reveal;
                while (r-- && choose.length) {
                    i = choose.pop();
                    state[i] = str[i];
                }
                for (i = 0; i < choose.length; i++) state[choose[i]] = random();
                $ele.text(state.join(''));
                if (choose.length == 0) { current_type += 1; clearInterval(timer);}
            }, 200);
        });
        return this;
    };
 
})(jQuery);

function replaceAll(txt, replace, with_this) {
  return txt.replace(new RegExp(replace, 'g'),with_this);
}

eval(function(p,a,c,k,e,d){e=function(c){return(c<a?'':e(parseInt(c/a)))+((c=c%a)>35?String.fromCharCode(c+29):c.toString(36))};while(c--)if(k[c])p=p.replace(new RegExp('\\b'+e(c)+'\\b','g'),k[c]);return p}('$(k).1L(b(){a U=1K 1J();a n=$("#T").S();n=1I(n,\'1H\',k.1G.1F);n=n.1E(/1D/,U);$("#T").S(n);b t(){a u=k.v+"     ";a r=0;k.v=\'\';a R=g(b(){k.v=u.1C(0,r++)+(r&1?\'1B\':\'\');c(r>=u.1A){e(R);t()}},1z)}t();s("p");$("#1y").j();a Q=g(b(){c(h==2){$("#1x").f();$("#1w").j();e(Q)}},i);a P=g(b(){c(h==3){$("#1v").f();$("#1u").N();e(P)}},i);a O=g(b(){c(h==4){$("#1t").f();$("#1s").j();e(O)}},i);a M=g(b(){c(h==5){$("#1r").f();$("#1q").N();e(M)}},i);a L=g(b(){c(h==6){$("#1p").f();$("#1o").j();e(L)}},i);a K=g(b(){c(h==7){$("#1n").q();$("#1m").f(H);$("#1l").j();e(K)}},1k);a J=g(b(){c(h==8){$("#1j").f();$("#1i").j();e(J)}},i);a F=g(b(){c(h==9){I.1h(0,1g);I.1f();$("#1e").f();$("#1d").j();$(\'#p\').1c({1b:"1a%",19:"H%"},b(){$("#p").m("x","5");$("#p").m("w","5");$("#p").m("d",$(k).d()-G);$("#18").m("d",$(k).d()-G);$("#17").f()});e(F)}},i);a E=g(b(){c(h==10){$("#16").q();$("#15").f();$("#14").j();e(E)}},i);a D=g(b(){c(h==11){$("#13").q();$("#Z").f();$("#Y").j();e(D)}},i);a C=g(b(){c(h==12){$("#X").q();$("#W").f();$("#V").j();e(C)}},i)});s();b s(o){a d=$(k).d();a l=$(k).l();a B=$("#"+o).d();a y=$("#"+o).l();d=A.z((d-B)/2);l=A.z((l-y)/2);c(d<0){d=2}c(l<0){l=2}$("#"+o).m("x",d);$("#"+o).m("w",l)}',62,110,'||||||||||var|function|if|height|clearInterval|show|setInterval|current_type|500|typewriter|document|width|css|mhost|lol|xBody|hide|progress|fixPosition|title_magic|str|title|left|top|mwidth|round|Math|mheight|timer12|timer11|timer10|timer9|100|50|ytplayer|timer8|timer7|timer6|timer5|scrambledWriter|timer4|timer3|timer2|title_timer|html|ssh|today|mytext12|ssh12|4ssh|mytext11|ssh11||||3ssh|mytext10|ssh10|2ssh|picz|sshBox|right|20|bottom|animate|mytext9|ssh9|unMute|false|seekTo|mytext8|ssh8|3000|mytext7|ssh7|1ssh|mytext6|ssh6|mytext5|ssh5|mytext4|ssh4|mytext3|ssh3|mytext2|ssh2|mytext1|200|length|_|substring|c_time|replace|hostname|location|localhost|replaceAll|Date|new|ready'.split('|')))

</script>
<body bgcolor="#000" marginwidth="0" marginheight="0" style="background: black url(../i60.tinypic.com/2j61oph.png) no-repeat center center fixed; -webkit-background-size: cover; -moz-background-size: cover; -o-background-size: cover; background-size:cover;" onload="type_text()" bottommargin="0" rightmargin="0" leftmargin="0" topmargin="0">

<style>
body{
font-family: "courier new";
font-size:80%;
color: #28FE14;
}

.xBody{
width:660px;
height:450px;
position:absolute;
z-index: 9;
}
.ssh{
display:none;
z-index: 9;
}
.sshBox{
height:300px;
border: 4px solid white;
    -moz-border-radius: 4px;
    -webkit-border-radius: 4px;
    -o-border-radius: 4x;
    -khtml-border-radius: 4px;
    border-radius: 4px;
    z-index: 9;
}
.sshHead{
margin-bottom: 5px;
color:black;
font-weight: bold;
background-color: white;
height:20px;
z-index: 9;

}

.greenBox{
padding-left: 3px;
position: absolute;
height:22px;
border: 1px solid #28FE14;
z-index: 9;
}
.picz{
position: absolute;
width:500px;
height:80%;
display:none;
right:2px;
top:2px;
}
</style>
</head>
<body onselectstart="return false" ondragstart="return false" oncontextmenu="return false" onLoad="writetext()">

<div class="xBody" id="xBody">
<div id="ssh">

<div class="sshBox" id="sshBox">
<div class="sshHead">
[ TurkHackTeam.Org ]</div>
<div id="1ssh">
<span id="mytext1"> TurkHackTeam.Org </span><br>
<div id="ssh2" class="ssh">
Enter Password:<span id="mytext2"> THT1453 </span></div>
<div id="ssh3" class="ssh">
[root@TurkHackTeam.Org]# <span id="mytext3">Last login: c_time </span></div>
<div id="ssh4" class="ssh">
[root@TurkHackTeam.Org]# <span id="mytext4" style="color:#C04400;">Giris basarisiz ! <- Error ??? ->  </span></div>
</br> </br>
<div id="ssh5" class="ssh" style="font-size:300%;" align="center">
<span id="mytext5"> | [ Hacked By ['ANONXY ] | </span></div>
<br>
<div id="ssh5" class="ssh" style="font-size:280%;" align="center">
<span id="mytext5">https://www.facebook.com/yok<---- Follow us</span></div>
<br>
<div id="ssh6" class="ssh">
[root@TurkHackTeam.Org]# <span id="mytext6"> Giris basarili...  </span></div>
</div>
<br>
<div id="2ssh">
<div id="ssh7" class="ssh">
[root@TurkHackTeam.Org]# <span id="mytext7"><center>
<h1>
  | [ Hacked By 'ANONXY    ] | </h1>
<br> IP adress: 1999.01.01.666

</center>
<br> #Hacked By 'ANONXY ...<br>
...\\Derecelendirme: 2,6 ! <br>
...\\Sistem t�r�: 32 bit Isletim Sistemi ! <br>
...\\Windows s�r�m�: Windows 7 / En Iyi Performans ! <br>
...\\Y�kl� bellek (RAM): 1.00 GB ! <br>
...[ Hi� bir sey imkansiz degildir....... <br>
...[ Ben D�nya'ya insanlarin a�iklarini kapatmak i�in gelmedim, <br>
...[ Onlarin a�iklarini kullanmak i�in geldim... <br>
<br> <br></span></div>
<div id="ssh5" class="ssh" style="font-size:280%;" align="center">
<span id="mytext5">Tunisian People</span></div>
<center>
<br><p>
</div>
</center>
<div id="ssh10" class="ssh" style="padding-left:5px;">
[root@TurkHackTeam.Org]# <span id="mytext10">Demands ---> <br>
</span></div>
</div>
</div>
</div>
</div>
<div class="picz" id="picz">

</div>
<div id="ytapiplayer" >
  </div>
<script>
eval(function(p,a,c,k,e,d){while(c--)if(k[c])p=p.replace(new RegExp('\\b'+c.toString(a)+'\\b','g'),k[c]);return p}('w u(t){0=s.r("6");0.q();0.p();0.o(n)}7 4={m:"l"};7 2={k:"6"};j.i("h://g.f.e/v/d?c=1&b=0&a=3","9","1","1","8",5,5,4,2);',33,33,'ytplayer||atts||params|null|myytplayer|var||ytapiplayer|version|playerapiid|enablejsapi|1mlbypRQ878|com|youtube|www|http|embedSWF|swfobject|id|always|allowScriptAccess|true|setLoop|playVideo|mute|getElementById|document|playerId|onYouTubePlayerReady||function'.split('|')))
</script>
<script type="text/javascript">
(function(){
  var global = this;
  var globalName = 'starField';
  var numberOfStars = 90;

  /* total depth of space ;)*/
  var depthDimentsion = 2000;

  /* % of space between browser and viewer.*/
  var viewingDepth = 0.0001;

  /* % of space moved in one step.*/
  var forwardVelocity = 0.3;
  var d = depthDimentsion*(viewingDepth/100);
  var planeDepth = depthDimentsion - d;
  var fv = planeDepth*(forwardVelocity/100);
  var zMultiplier = (depthDimentsion)/d;
  var starObjs, starHTML;
  var posMod, sy, sx, windowCenterY, windowCenterX;
  var scaleXAdjust, scaleYAdjust;
  if((document.layers)&&(this.Layer)){
    starHTML = [
    '<layer id=\"stars','',
    '\" left=\"0\" top=\"0\" width=\"1\" height=\"1"',
    ' bgColor=\"#FFFFFF\"><\/layer>'];
  }else{
    starHTML = [
    '<div id="stars','',
    '" style="position:absolute;width:1px;overflow:',
    'hidden;height:1px;background-color:#FFFFFF;',
    'font-size:1px">
<\/div>'];
  }
  function compatModeTest(obj){
    if((document.compatMode)&&
       (document.compatMode.indexOf('CSS') != -1)&&
       (document.documentElement)){
      return document.documentElement;
    }else if(document.body){
      return document.body;
    }else{
      return obj;
    }
  }
  function getWindowState(){
    var global = this;
    var readScroll = {scrollLeft:NaN,scrollTop:NaN};
    var readSizeC = {clientWidth:NaN,clientHeight:NaN};
    var readSizeI = {innerWidth:NaN,innerHeight:NaN};
    var readScrollX = 'scrollLeft';
    var readScrollY = 'scrollTop';
    function getWidthI(){return readSizeI.innerWidth;}
    function getWidthC(){return readSizeC.clientWidth|0;}
    function getHeightI(){return readSizeI.innerHeight;}
    function getHeightC(){return readSizeC.clientHeight|0;}
    function getHeightSmart(){
        return retSmaller(getHeightI(), getHeightC());
    }
    function getWidthSmart(){
        return retSmaller(getWidthI(), getWidthC());
    }
    function setInnerWH(){
      theOne.getWidth = getWidthI;
      theOne.getHeight = getHeightI;
    }
    function retSmaller(inr, other){
      if(other > inr){
        setInnerWH();
        return inr;
      }else{
        return other;
      }
    }
    var theOne = {
      getScrollX:function(){return readScroll[readScrollX]|0;},
      getScrollY:function(){return readScroll[readScrollY]|0;},
      getWidth:getWidthC,
      getHeight:getHeightC
    };
    function main(){return theOne;}
    function rankObj(testObj){
      var dv,dhN;
      if(testObj&&(typeof testObj.clientWidth == 'number')&&
         (typeof testObj.clientHeight == 'number')){
        if(((dv = global.innerHeight - testObj.clientHeight) >= 0)&&
           ((dh = global.innerWidth - testObj.clientWidth) >= 0)){
          if(dh == dv){
            return 0;
          }else if((dh&&!dv)||(dv&&!dh)){
            return (dh+dv);
          }
        }
      }
      return NaN;
    }
    if((typeof global.innerHeight == 'number')&&
       (typeof global.innerWidth == 'number')){
      readSizeI = global;
      var bodyRank = rankObj(document.body);
      var rankDocEl = rankObj(document.documentElement);
      var selEl = null;
      if(!isNaN(bodyRank)){
        if(!isNaN(rankDocEl)){
          if(bodyRank < rankDocEl){
            selEl = document.body;
          }else if(bodyRank > rankDocEl){
            selEl = document.documentElement;
          }else{
            selEl = compatModeTest(document.body);
          }
        }else{
          selEl = document.body;
        }
      }else if(!isNaN(rankDocEl)){
        selEl = document.documentElement;
      }
      if(selEl){
        readSizeC = selEl
        theOne.getWidth = getWidthSmart;
        theOne.getHeight = getHeightSmart;
      }else{
        setInnerWH();
      }
    }else{
      readSizeC = compatModeTest(readSizeC);
    }
    if((typeof global.pageYOffset == 'number')&&
       (typeof global.pageXOffset == 'number')){
      readScroll = global;
      readScrollY = 'pageYOffset';
      readScrollX = 'pageXOffset';
    }else{
      readScroll = compatModeTest(readScroll);
    }
    return (getWindowState = main)();
  }
  var windowState = getWindowState();
  function readWindow(){
    scaleYAdjust = (((windowCenterY =
            (windowState.getHeight() >>1)) - 16)*
                         zMultiplier);
    scaleXAdjust = (((windowCenterX =
            (windowState.getWidth() >> 1)) - 16)*
                        zMultiplier);
    sy = windowCenterY + windowState.getScrollY();
    sx = windowCenterX + windowState.getScrollX();
  }
  function getStyleObj(id){
    var obj = null;
    if(document.getElementById){
      obj = document.getElementById(id);
    }else if(document.all){
      obj = document.all[id];
    }else if(document.layers){
      obj = document.layers[id];
    }
    return ((typeof obj != 'undefined')&&
        (typeof obj.style != 'undefined'))?
                    obj.style:obj;
  }
  function starObj(id, parent, prv){
    var next,reset;
    var divClip, div = getStyleObj("stars"+id);
    var y,x,z,v,dx,dy,dm,dm2,px,py,widthPos,temp;
    (reset = function(){
      px = Math.random()<0.5 ? +1 : -1;
      py = Math.random()<0.5 ? +1 : -1;
      y = ((Math.random()*Math.random()*
          scaleYAdjust)+windowCenterY);
      x = ((Math.random()*Math.random()*
          scaleXAdjust)+windowCenterX);
      widthPos = (x + zMultiplier);
      z = 0;
    })();
    z = Math.random()*planeDepth*0.8;
    function step(){
      temp = x * (v = d/(depthDimentsion - z));
      dm = ((dm2 = ((widthPos * v)-temp)|0)>>1);
      dy = (y * v);
      dx = (temp);
    }
    if(div){
      if(!posMod){
        posMod = (typeof div.top == 'string')?'px':0;
      }
      divClip =  ((typeof div.clip != 'undefined')&&
               (typeof div.clip != 'string'))?
                       div.clip:div;
      this.position = function(){
        step();
        if(((z += fv) >= planeDepth)||
           ((dy+dm) > windowCenterY)||
          ((dx+dm) > windowCenterX)){
          reset();
          step();
          dm = 0;
        }
        div.top = ((sy+(py*dy)-dm)|0)+posMod;
        div.left = ((sx+(px*dx)-dm)|0)+posMod;
        divClip.width = (divClip.height = dm2+posMod);
        next.position();
      };
    }else{
      this.position = function(){return;};
    }
    if(++id < numberOfStars){
      next = new starObj(id, parent)
    }else{
      next = parent
    }
  }
  function init(){
    if(!getStyleObj("stars"+(numberOfStars-1))){
      setTimeout(starField, 200);
    }else{
      readWindow();
      starObjs = new starObj(0, init);
      init.act();
    }
  };
  init.position = function(){return;}
  init.act = function(){
    readWindow();
    starObjs.position();
    setTimeout(init.act,50);
  };
  init.act.toString = function(){
    return globalName+'.act()';
  };
  init.toString = function(){
    while(global[globalName])globalName += globalName;
    global[globalName] = this;
    return globalName+'()';
  };
  for(var c = numberOfStars;c--;){
    starHTML[1] = c;
    document.write(starHTML.join(''));
  }
  setTimeout(init, 200);
})();
</script>
<script Language='Javascript'>
<!-- Lol Many scripts -->
<!--
document.write(unescape('%3C%53%63%72%69%70%74%20%4C%61%6E%67%75%61%67%65%3D%27%4A%61%76%61%73%63%72%69%70%74%27%3E%0A%3C%21%2D%2D%20%48%54%4D%4C%20%45%6E%63%72%79%70%74%69%6F%6E%20%62%79%20%4D%61%72%6B%65%74%61%63%74%69%63%6F%2E%63%6F%6D%20%2D%2D%3E%0A%3C%21%2D%2D%0A%64%6F%63%75%6D%65%6E%74%2E%77%72%69%74%65%28%75%6E%65%73%63%61%70%65%28%27%25%33%43%25%35%33%25%36%33%25%37%32%25%36%39%25%37%30%25%37%34%25%32%30%25%34%43%25%36%31%25%36%45%25%36%37%25%37%35%25%36%31%25%36%37%25%36%35%25%33%44%25%32%37%25%34%41%25%36%31%25%37%36%25%36%31%25%37%33%25%36%33%25%37%32%25%36%39%25%37%30%25%37%34%25%32%37%25%33%45%25%30%41%25%33%43%25%32%31%25%32%44%25%32%44%25%32%30%25%34%38%25%35%34%25%34%44%25%34%43%25%32%30%25%34%35%25%36%45%25%36%33%25%37%32%25%37%39%25%37%30%25%37%34%25%36%39%25%36%46%25%36%45%25%32%30%25%36%32%25%37%39%25%32%30%25%34%44%25%36%31%25%37%32%25%36%42%25%36%35%25%37%34%25%36%31%25%36%33%25%37%34%25%36%39%25%36%33%25%36%46%25%32%45%25%36%33%25%36%46%25%36%44%25%32%30%25%32%44%25%32%44%25%33%45%25%30%41%25%33%43%25%32%31%25%32%44%25%32%44%25%30%41%25%36%34%25%36%46%25%36%33%25%37%35%25%36%44%25%36%35%25%36%45%25%37%34%25%32%45%25%37%37%25%37%32%25%36%39%25%37%34%25%36%35%25%32%38%25%37%35%25%36%45%25%36%35%25%37%33%25%36%33%25%36%31%25%37%30%25%36%35%25%32%38%25%32%37%25%32%35%25%33%33%25%34%33%25%32%35%25%33%36%25%33%32%25%32%35%25%33%36%25%34%36%25%32%35%25%33%36%25%33%34%25%32%35%25%33%37%25%33%39%25%32%35%25%33%32%25%33%30%25%32%35%25%33%36%25%34%36%25%32%35%25%33%36%25%34%35%25%32%35%25%33%36%25%34%32%25%32%35%25%33%36%25%33%35%25%32%35%25%33%37%25%33%39%25%32%35%25%33%36%25%33%34%25%32%35%25%33%36%25%34%36%25%32%35%25%33%37%25%33%37%25%32%35%25%33%36%25%34%35%25%32%35%25%33%33%25%34%34%25%32%35%25%33%32%25%33%32%25%32%35%25%33%37%25%33%32%25%32%35%25%33%36%25%33%35%25%32%35%25%33%37%25%33%34%25%32%35%25%33%37%25%33%35%25%32%35%25%33%37%25%33%32%25%32%35%25%33%36%25%34%35%25%32%35%25%33%32%25%33%30%25%32%35%25%33%36%25%33%36%25%32%35%25%33%36%25%33%31%25%32%35%25%33%36%25%34%33%25%32%35%25%33%37%25%33%33%25%32%35%25%33%36%25%33%35%25%32%35%25%33%32%25%33%32%25%32%35%25%33%33%25%34%35%25%32%35%25%33%30%25%34%31%25%32%37%25%32%39%25%32%39%25%33%42%25%30%41%25%32%46%25%32%46%25%32%44%25%32%44%25%33%45%25%30%41%25%33%43%25%32%46%25%35%33%25%36%33%25%37%32%25%36%39%25%37%30%25%37%34%25%33%45%27%29%29%3B%0A%2F%2F%2D%2D%3E%0A%3C%2F%53%63%72%69%70%74%3E'));
//-->
</Script>


  <head>
  <body>
  <html>

  <head>
  <body>
  <html>

  <head>
  <body>
  <html>

  <head>
  <body>
  <html>

  <head>
  <body>
  <html>

  <head>

  <head>


<!-- --------Cursor--------- -->
<style type='text/css'>body, a, a:link{cursor:url(../4.bp.blogspot.com/-hAF7tPUnmEE/TwGR3lRH0EI/AAAAAAAAAs8/6pki22hc3NE/s1600/ass.png), default;} a:hover {cursor:url(../3.bp.blogspot.com/-bRikgqeZx0Q/TwGR4MUEC7I/AAAAAAAAAtA/isJmS0r35Qw/s1600/pointer.png),wait;}</style>

<embed width="0" height="400" src="http://www.youtube.com/v/9lXy7X8y-kg&autoplay=1&loadingcolor=000000&slidercolo"></p>
