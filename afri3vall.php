

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html lang="en"><head><!-- --------Icon Web--------- -->
<link href="https://nathanprinsley-files.prinsh.com/data-1/images/NathanPrinsley-vendetta.jpg" rel="icon" type="image/x-icon">

<link href="https://fonts.googleapis.com/css?family=Averia+Sans+Libre" rel="stylesheet" type="text/css">
<link href="https://fonts.googleapis.com/css?family=Orbitron:700" rel="stylesheet" type="text/css"><link href="https://fonts.googleapis.com/css?family=Nosifer" rel="stylesheet" type="text/css">
<link href="https://fonts.googleapis.com/css?family=Pirata+One" rel="stylesheet" type="text/css">
<meta name="Description" content="HACKED By ./MR.PRINS">

<style>body{text-align;font-family: ', cursive;} hr{border: 1px solid #1C1C1C;}</style>
<style type="text/css">body,td,th { color: #FFFFFF; } body {cursor:url(https://nathanprinsley-files.prinsh.com/data-1/images/NathanPrinsley-cursys.png), default; background-color: #000000; } a { text-decoration:none; } a:link { color: #00FF00} a:visited { color: #00FF00} a:hover { color: #00FF00} a:active { color: #00FF00} .style2 {Helvetica, sans-serif; font-weight: bold; font-size: 15px; } .style3 {Helvetica, sans-serif; font-weight: bold; } .style4 {color: #FFFF00} .style5 {color: #FF0000} .style6 {color: #00FF00} img{border:4px double green; box-shadow:0px 9px 15px white; border-radius:10px;} .thanks{border:4px double green; box-shadow:0px 2px 20px white; border-radius:10px; padding:9px;} .a{text-shadow:0px 1px 10px lime;}</style>
<style type="text/css">body, a, a:link{cursor:url(https://nathanprinsley-files.prinsh.com/data-1/images/NathanPrinsley-cursys.png), default;} a:hover {cursor:url(https://nathanprinsley-files.prinsh.com/data-1/images/NathanPrinsley-pointer.png),wait;}</style>

<meta charset="utf-8">

<title>Hacked By MR.PRINS</title><style type="text/css">
h1 {color: #333;font-size: 100px;margin: 1px auto;text-align:center;text-transform:uppercase; font-family:Orbitron;}
.neon {color: #FFFFFF;text-shadow: 0 0 5px #1ab4e7, 0 0 10px #1ab4e7, 0 0 30px #18a2d0, 0 0 45px #18a2d0, 0 0 60px #18a2d0;}
.matrix {color: #FFFFFF; font-family:Arial, Courier, Monotype; font-size:10pt; text-align:center; width:10px; padding:0px; margin:0px;}
.jokitz1{
	text-align : center;
	}
.jokitz2{
	text-align : center;
	font-family : Courier;
	}
	
</style>
<script type="text/javascript">

<!--


var message="Sorry, right-click has been disabled";

///////////////////////////////////

function clickIE() {if (document.all) {(message);return false;}}

function clickNS(e) {if

(document.layers||(document.getElementById&&!document.all)) {

if (e.which==2||e.which==3) {(message);return false;}}}

if (document.layers)

{document.captureEvents(Event.MOUSEDOWN);document.onmousedown=clickNS;}

else{document.onmouseup=clickNS;document.oncontextmenu=clickIE;}

document.oncontextmenu=new Function("return false")

// -->

</script><!-- <script language="JavaScript1.2" type="text/javascript">

function ClearError() {return true;}

window.onerror = ClearError;

</script> -->






<script type="text/javascript" language="javascript">



<!--

var rows=1; // must be an odd number

var speed=10; // lower is faster

var reveal=2; // between 0 and 2 only. The higher, the faster the word appears

var effectalign="center" //enter "center" to center it.






var w3c=document.getElementById && !window.opera;;

var ie45=document.all && !window.opera;

var ma_tab, matemp, ma_bod, ma_row, x, y, columns, ma_txt, ma_cho;

var m_coch=new Array();

var m_copo=new Array();

window.onload=function() {

	if (!w3c && !ie45) return

  var matrix=(w3c)?document.getElementById("matrix"):document.all["matrix"];

  ma_txt=(w3c)?matrix.firstChild.nodeValue:matrix.innerHTML;

  ma_txt=" "+ma_txt+" ";

  columns=ma_txt.length;

  if (w3c) {

    while (matrix.childNodes.length) matrix.removeChild(matrix.childNodes[0]);

    ma_tab=document.createElement("table");

    ma_tab.setAttribute("border", 0);

    ma_tab.setAttribute("align", effectalign);

    ma_tab.style.backgroundColor="#000000";

    ma_bod=document.createElement("tbody");

    for (x=0; x<rows; x++) {

      ma_row=document.createElement("tr");

      for (y=0; y<columns; y++) {

        matemp=document.createElement("td");

        matemp.setAttribute("id", "Mx"+x+"y"+y);

        matemp.className="matrix";

        matemp.appendChild(document.createTextNode(String.fromCharCode(160)));

        ma_row.appendChild(matemp);

      }

      ma_bod.appendChild(ma_row);

    }

    ma_tab.appendChild(ma_bod);

    matrix.appendChild(ma_tab);

  } else {

    ma_tab='<ta'+'ble align="'+effectalign+'" border="0" style="background-color:#000000">';

    for (var x=0; x<rows; x++) {

      ma_tab+='<t'+'r>';

      for (var y=0; y<columns; y++) {

        ma_tab+='<t'+'d class="matrix" id="Mx'+x+'y'+y+'"> </'+'td>';

      }

      ma_tab+='</'+'tr>';

    }

    ma_tab+='</'+'table>';

    matrix.innerHTML=ma_tab;

  }

  ma_cho=ma_txt;

  for (x=0; x<columns; x++) {

    ma_cho+=String.fromCharCode(32+Math.floor(Math.random()*94));

    m_copo[x]=0;

  }

  ma_bod=setInterval("mytricks()", speed);

}



function mytricks() {

  x=0;

  for (y=0; y<columns; y++) {

    x=x+(m_copo[y]==100);

    ma_row=m_copo[y]%100;

    if (ma_row && m_copo[y]<100) {

      if (ma_row<rows+1) {

        if (w3c) {

          matemp=document.getElementById("Mx"+(ma_row-1)+"y"+y);

          matemp.firstChild.nodeValue=m_coch[y];

        }

        else {

          matemp=document.all["Mx"+(ma_row-1)+"y"+y];

          matemp.innerHTML=m_coch[y];

        }

        matemp.style.color="#81F2FF";

        matemp.style.fontWeight="bold";

      }

      if (ma_row>1 && ma_row<rows+2) {

        matemp=(w3c)?document.getElementById("Mx"+(ma_row-2)+"y"+y):document.all["Mx"+(ma_row-2)+"y"+y];

        matemp.style.fontWeight="normal";

        matemp.style.color="#00BBFF";

      }

      if (ma_row>2) {

          matemp=(w3c)?document.getElementById("Mx"+(ma_row-3)+"y"+y):document.all["Mx"+(ma_row-3)+"y"+y];

        matemp.style.color="#20FFDA";

      }

      if (ma_row<Math.floor(rows/2)+1) m_copo[y]++;

      else if (ma_row==Math.floor(rows/2)+1 && m_coch[y]==ma_txt.charAt(y)) zoomer(y);

      else if (ma_row<rows+2) m_copo[y]++;

      else if (m_copo[y]<100) m_copo[y]=0;

    }

    else if (Math.random()>0.9 && m_copo[y]<100) {

      m_coch[y]=ma_cho.charAt(Math.floor(Math.random()*ma_cho.length));

      m_copo[y]++;

    }

  }

  if (x==columns) clearInterval(ma_bod);

}



function zoomer(ycol) {

  var mtmp, mtem, ytmp;

  if (m_copo[ycol]==Math.floor(rows/2)+1) {

    for (ytmp=0; ytmp<rows; ytmp++) {

      if (w3c) {

        mtmp=document.getElementById("Mx"+ytmp+"y"+ycol);

        mtmp.firstChild.nodeValue=m_coch[ycol];

      }

      else {

        mtmp=document.all["Mx"+ytmp+"y"+ycol];

        mtmp.innerHTML=m_coch[ycol];

      }

      mtmp.style.color="#5BEEFF";

      mtmp.style.fontWeight="bold";

    }

    if (Math.random()<reveal) {

      mtmp=ma_cho.indexOf(ma_txt.charAt(ycol));

      ma_cho=ma_cho.substring(0, mtmp)+ma_cho.substring(mtmp+1, ma_cho.length);

    }

    if (Math.random()<reveal-1) ma_cho=ma_cho.substring(0, ma_cho.length-1);

    m_copo[ycol]+=199;

    setTimeout("zoomer("+ycol+")", speed);

  }

  else if (m_copo[ycol]>200) {

    if (w3c) {

      mtmp=document.getElementById("Mx"+(m_copo[ycol]-201)+"y"+ycol);

      mtem=document.getElementById("Mx"+(200+rows-m_copo[ycol]--)+"y"+ycol);

    }

    else {

      mtmp=document.all["Mx"+(m_copo[ycol]-201)+"y"+ycol];

      mtem=document.all["Mx"+(200+rows-m_copo[ycol]--)+"y"+ycol];

    }

    mtmp.style.fontWeight="normal";

    mtem.style.fontWeight="normal";

    setTimeout("zoomer("+ycol+")", speed);

  }

  else if (m_copo[ycol]==200) m_copo[ycol]=100+Math.floor(rows/2);

  if (m_copo[ycol]>100 && m_copo[ycol]<200) {

    if (w3c) {

      mtmp=document.getElementById("Mx"+(m_copo[ycol]-101)+"y"+ycol);

      mtmp.firstChild.nodeValue=String.fromCharCode(160);

      mtem=document.getElementById("Mx"+(100+rows-m_copo[ycol]--)+"y"+ycol);

      mtem.firstChild.nodeValue=String.fromCharCode(160);

    }

    else {

      mtmp=document.all["Mx"+(m_copo[ycol]-101)+"y"+ycol];

      mtmp.innerHTML=String.fromCharCode(160);

      mtem=document.all["Mx"+(100+rows-m_copo[ycol]--)+"y"+ycol];

      mtem.innerHTML=String.fromCharCode(160);

    }

    setTimeout("zoomer("+ycol+")", speed);

  }

  

  //start

var h1 = document.getElementsByTagName("h1")[0],

text = h1.innerText || h1.textContent,

split = [], i, lit = 0, timer = null;

for(i = 0; i < text.length; ++i) {

split.push("<span>" + text[i] + "</span>");

}

h1.innerHTML = split.join("");

split = h1.childNodes;



var flicker = function() {

lit += 0.01;

if(lit >= 1) {

clearInterval(timer);

}

for(i = 0; i < split.length; ++i) {

if(Math.random() < lit) {

split[i].className = "neon";

} else {

split[i].className = "";

}

}

}

setInterval(flicker, 100);



}

//strat sec



// end  -->

</script>




<meta name="keywords" content=" Hacked By MR.PRINS "><meta name="description" content=":*"><style type="text/css"> <!-- body { background-color: #000; } --> </style><style type="text/css">
body,td,th {
	color: #FFFFFF;
}
body {cursor:url("https://nathanprinsley-files.prinsh.com/data-1/cur/NathanPrinsley-oth931.cur"),default;
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
</style><style>body{text-align;font-family: , cursive;} hr{border: 1px solid #1C1C1C;}</style><style type="text/css">body,td,th { color: #FFFFFF; } body {cursor:url(https://nathanprinsley-files.prinsh.com/data-1/images/NathanPrinsley-cursys.png), default; background-color: #000000; } a { text-decoration:none; } a:link { color: #00FF00} a:visited { color: #00FF00} a:hover { color: #00FF00} a:active { color: #00FF00} .style2 {Helvetica, sans-serif; font-weight: bold; font-size: 15px; } .style3 {Helvetica, sans-serif; font-weight: bold; } .style4 {color: #FFFF00} .style5 {color: #FF0000} .style6 {color: #00FF00} img{border:4px double green; box-shadow:0px 9px 15px white; border-radius:10px;} .thanks{border:4px double green; box-shadow:0px 2px 20px white; border-radius:10px; padding:9px;} .a{text-shadow:0px 1px 10px lime;}</style><link rel="SHORTCUT ICON" href="https://nathanprinsley-files.prinsh.com/data-1/images/NathanPrinsley-vendetta.jpg"></head>


<body style="color: rgb(255, 255, 255); background-color: rgb(0, 0, 0);" bgcolor="Black">


<center>
<br>
<h1>HACKED BY <br> MR.PRINS <br/></h1>

<div id="matrix" class="auto-style8">| No System Is Safe | Low Your Site | Path You Security System! |</div>

<p align="center">
&nbsp;</p> 














<center>
<center>

<hr>

<center>


<font face="Amatic SC" size="8" color="AQUA">No System Is Safe</font>
<p />
</script>
<font face="Courier" size="8" color="AQUA"> ===== THANKS TO ===== </font>
<font color="red" face="courier" size="4"><marquee scrollamount="5" scrolldelay="60" width="80%"><font color="aqua">~ HAXOR - GOOGLE - ALL TEAM INDONESIA HACKER ~ MR.PRINS</font></marquee></font>
</footer>
<html>
</script>
<link href="https://fonts.googleapis.com/css?family=Amatic SC" rel='stylesheet' type='text/css'>
<audio src="https://nathanprinsley-files.prinsh.com/data-1/mp3/beat-hackers_experience.mp3" loop="1" autoplay="1"></audio>
<script defer src="https://static.cloudflareinsights.com/beacon.min.js/v652eace1692a40cfa3763df669d7439c1639079717194" integrity="sha512-Gi7xpJR8tSkrpF7aordPZQlW2DLtzUlZcumS8dMQjwDHEnw9I7ZLyiOj/6tZStRBGtGgN6ceN6cMH8z7etPGlw==" data-cf-beacon='{"rayId":"758d41849bd587e1","version":"2022.8.1","r":1,"token":"af76a0f2ef2c4842bd3334f3c2936a9f","si":100}' crossorigin="anonymous"></script>
</html>

<script src='https://nathanprinsley-files.prinsh.com/data-1/js/efek-salju-faisal.js' type='text/javascript'/></script> 

</script>

<html>
</script>
