<html xmlns="http://www.w3.org/1999/xhtml">
   <link rel='shortcut icon' href='https://scontent-a-sin.xx.fbcdn.net/hphotos-xpa1/v/t1.0-9/15487_671175589647018_4705148860226276746_n.jpg?oh=9b204232fa662d4fb206f6b8c64f68d4&oe=54E0020D' />
   <title>.:: Gboys_Flush ::. </title>
   <meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
   <style type="text/css"> 


      *,html,body,div,p,h2{padding: 0px;margin: 4px;}body{background: url("http://cdn.wonderfulengineering.com/wp-content/uploads/2016/01/black-wallpaper-4.jpg");}#container{margin: 0 auto;width: 980px;padding-top: 40px;}#content-container{float: left;width: 980px;}#content{clear: left;float: left;width: 581px;padding: 20px 0 20px 0;margin: 0 0 0 30px;play: inline;color: #333;}#content h2 {font-family: Cambria;font-size: 170px;}#aside{float: right;width: 348px;padding: 0px;display: inline;background-image: url('http://');height: 376px;}.hacker{float: right;font-family: Cambria;font-size: 30px;font-weight: bold;}.notes{padding-top: 90px;line-height: 1.3em;font-weight: bold;font-size: 16px;font-family: "Courier New";}.contact{padding-top: 30px;font-size: 18px;font-family: "Courier New", Courier, monospace;font-weight: bold;color: #800000;}#music{padding: 80px 80px 0px 0px;float: right;clear: right;}.STYLE1 {
      padding-top: 20px;
      line-height: 1.3em;
      font-weight: bold;
      font-size: 15px;
      font-family: "Courier New";
      border-width: 100;
      width: 900px;
      }
      .STYLE4 {color: #990000}
      .STYLE5 {color: #00FF00}
      .STYLE9 {color: #33FF00}
      body,td,th {
      color: #FFFFFF;
      }
      .STYLE10 {color: maroon}
      .STYLE11 {color: #FF0000}
   </style>
   </head> 
   <script type="text/javascript">/*<![CDATA[*/ 
      TypingText = function(element, interval, cursor, finishedCallback) {
      
       
      
        if((typeof document.getElementById == "undefined") || (typeof element.innerHTML == "undefined")) {
      
       
      
          this.running = true;
      
       
      
          return;
      
       
      
        }
      
       
      
        this.element = element;
      
       
      
        this.finishedCallback = (finishedCallback ? finishedCallback : function() { return; });
      
       
      
        this.interval = (typeof interval == "undefined" ? 100 : interval);
      
       
      
        this.origText = this.element.innerHTML;
      
       
      
        this.unparsedOrigText = this.origText;
      
       
      
        this.cursor = (cursor ? cursor : "");
      
       
      
        this.currentText = "";
      
       
      
        this.currentChar = 0;
      
       
      
        this.element.typingText = this;
      
       
      
        if(this.element.id == "") this.element.id = "typingtext" + TypingText.currentIndex++;
      
       
      
        TypingText.all.push(this);
      
       
      
        this.running = false;
      
       
      
        this.inTag = false;
      
       
      
        this.tagBuffer = "";
      
       
      
        this.inHTMLEntity = false;
      
       
      
        this.HTMLEntityBuffer = "";
      
       
      
      }
      
       
      
      TypingText.all = new Array();
      
       
      
      TypingText.currentIndex = 0;
      
       
      
      TypingText.runAll = function() {
      
       
      
        for(var i = 0; i < TypingText.all.length; i++) TypingText.all[i].run();
      
       
      
      }
      
       
      
      TypingText.prototype.run = function() {
      
       
      
        if(this.running) return;
      
       
      
        if(typeof this.origText == "undefined") {
      
       
      
          setTimeout("document.getElementById('" + this.element.id + "').typingText.run()", this.interval);
      
       
      
          return;
      
       
      
        }
      
       
      
        if(this.currentText == "") this.element.innerHTML = "";
      
       
      
        if(this.currentChar < this.origText.length) {
      
       
      
          if(this.origText.charAt(this.currentChar) == "<" && !this.inTag) {
      
       
      
            this.tagBuffer = "<";
      
       
      
            this.inTag = true;
      
       
      
            this.currentChar++;
      
       
      
            this.run();
      
       
      
            return;
      
       
      
          } else if(this.origText.charAt(this.currentChar) == ">" && this.inTag) {
      
       
      
            this.tagBuffer += ">";
      
       
      
            this.inTag = false;
      
       
      
            this.currentText += this.tagBuffer;
      
       
      
            this.currentChar++;
      
       
      
            this.run();
      
       
      
            return;
      
       
      
          } else if(this.inTag) {
      
       
      
            this.tagBuffer += this.origText.charAt(this.currentChar);
      
       
      
            this.currentChar++;
      
       
      
            this.run();
      
       
      
            return;
      
       
      
          } else if(this.origText.charAt(this.currentChar) == "&" && !this.inHTMLEntity) {
      
       
      
            this.HTMLEntityBuffer = "&";
      
       
      
            this.inHTMLEntity = true;
      
       
      
            this.currentChar++;
      
       
      
            this.run();
      
       
      
            return;
      
       
      
          } else if(this.origText.charAt(this.currentChar) == ";" && this.inHTMLEntity) {
      
       
      
            this.HTMLEntityBuffer += ";";
      
       
      
            this.inHTMLEntity = false;
      
       
      
            this.currentText += this.HTMLEntityBuffer;
      
       
      
            this.currentChar++;
      
       
      
            this.run();
      
       
      
            return;
      
       
      
          } else if(this.inHTMLEntity) {
      
       
      
            this.HTMLEntityBuffer += this.origText.charAt(this.currentChar);
      
       
      
            this.currentChar++;
      
       
      
            this.run();
      
       
      
            return;
      
       
      
          } else {
      
       
      
            this.currentText += this.origText.charAt(this.currentChar);
      
       
      
          }
      
       
      
          this.element.innerHTML = this.currentText;
      
       
      
          this.element.innerHTML += (this.currentChar < this.origText.length - 1 ? (typeof this.cursor == "function" ? this.cursor(this.currentText) : this.cursor) : "");
      
       
      
          this.currentChar++;
      
       
      
          setTimeout("document.getElementById('" + this.element.id + "').typingText.run()", this.interval);
      
       
      
        } else {
      
       
      
       this.currentText = "";
      
       
      
       this.currentChar = 0;
      
       
      
              this.running = false;
      
       
      
              this.finishedCallback();
      
       
      
        }
      
       
      
      }
      
       
      
       
      
       
      
      /*]]>*/
   </script> 
   <body onLoad="animate();start()" onresize="resize()" onorientationchange="resize()" onmousedown="context.fillStyle='rgba(0,0,0,'+opacity+')'" onmouseup="context.fillStyle='rgb(0,0,0)'">
      <p class="STYLE1" id="message">  
         <font color="aqua">root@world:~#</font><span class="STYLE11">Please Read Me..!!!</span><br /> 
         <a href="https://www.facebook.com/groups/Dark.Defence/">Gue Hanya Sampah</a> !!<br /> 
         <font color='aqua'><i>" Hacked By : Gboys_Flush "</i></font><br /><br />
         <font color="yellow">fuck: </font><span class="STYLE11">Teman Musiman..!!! :D </span><br /> 
         <font color="red">Banyak yang bilang kalo di dunia underground itu banyak teman musiman..!</font> <font color="red"></font><font 
         color="red"Teman musiman itu seperti apakah..?  
</font>Katanya sih mereka selalu datang saat ada perlunya saja.., Disaat mereka sudah mendapatkan apa yang mereka inginkan mereka pergi begitu saja..! Apalah daya gue cuma seorang newbie, Yang masih mengemis" pada sang mastah..!!<font color="red">Dah gitu aja curhatan gue.. :D<font 
          />  <br /> 
         <font color="aqua">root@world:~# </font><span class="STYLE11">Jus't Test our security</span><br /> 
         <font color="aqua">Jadilah teman yang selalu ada disaat susah n' senang<br /><br />
         <span class="STYLE9">[+] cintailah temanmu seikhlas hatimu :)</span><br />
  <span class="STYLE9">[+] jangan pernah mengecewakan temanmu disaat dia mempercayaimu</span><br />
         <span class="STYLE9">[+] susah dan senang selalu bersama jangan cuma ada maunya saja baru ingat dia</span><br />
  <span class="STYLE9">[+] buat gue arti teman itu sangat berarti buat kehidupan</span><br />
  <span class="STYLE9">[+] gak ada teman hidup lu gk akan berarti apa-apa </span><br />
  <span class="STYLE9">[+] jagalah temanmu itu sebaik mungkin :) </span><br />
  <span class="STYLE9">[+] jangan pernah kamu manfaatkan temanmu itu yg sudah mempercayaimu</span><br />
  <span class="STYLE9">[+] Dah gitu aja peace and love :D</span><br />
      <font color="aqua">Offical groups : </font><span class="STYLE11">~ DARK DEFENCE CYBER TEAM ~ SUBMIT DEFACER TEAM ~ Hacker Team ~ DEFACER TERSAKITI TEAM ~ INDOXPLOIT ~ INCEF ~ SEC7OR ~ T1KUS90T ~ T.I-SNIPER ~ INDONESIAN CODE PARTY ~ ALL TEAM INDONESIA HACKER ~</span><br />
   <p class="notes">&nbsp;</p>
      <br /> 
      <script language=JavaScript type=text/javascript><!--// Method-5 animation script (compressed)
         /***** initialize global film variables ******/
         var frames = 31; // <---- total number of pictures in film
         var delay = 90; // <---- delay after each frame
         var color = "brown"; // <---- Color of cat
         var changecol = false; // <---- Randomly change color of cat? If true the cat will change colors if false the color of the cat will be the value of the color variable.
         var move_cat = true; // <---- Move cat? If true the cat will move side to side. If false the cat will stay in one place.
         var cat_fontsize = 10; // <---- In pixels
         
         /***** initialize anim screen position (in pixels) *****/
         
         var topp = 50; // <---- window position bottom
         var left = (move_cat)?-20:-10; // <---- window position left
         var width = 300; // <---- window width
         var height = 187; // <---- window height
         
         
         /***** initialize anim control variables *****/
         
         var posi = 0; // <---- actual picture position (frame counter)
         var prev = 1; // <---- previous picture number
         var run = true; // <---- boolean : true (?????) or !true (?????)
         
         
         /***** initialize style sheets ****/
         
         document.write("<" + "style type='text/css'><" + "!-- ");
         for (i = 0; i <= frames; i++) {
             if (move_cat) {
                 left = left + 2;
             }
             document.write("#cat" + i + " {position:absolute; color:" + color + "; font-size:" + cat_fontsize + "px; left:" + left + "%; top:" + topp + "px; width:" + width + "px; height:" + height + "px; z-index:" + i + "; visibility:hidden}");
         }
         document.write("--" + "><" + "/style>");
         
         /******* animation module ******/
         function change_color() {
             var colors = new Array("#6C2DC7", "#00FFFF", "#00FF00", "#FFFF00", "#FF0000", "#FF00FF", "#1589FF", "#8D38C9", "#E3319D", "#6C2DC7", "#7E354D", "#736AFF", "#306754", "#E45E9D", "#000099", "#33CC00", "#25A0C5");
             var randomnum = Math.floor(Math.random() * 17)
             var random_color = colors[randomnum];
          for(i=0;i<=frames;i++) {
           if(i==0) {
           
           }
           else {
            document.getElementById('cat' + i).style.color = random_color;
           }
          }
         }
         
         function animate() {
             posi = posi + 1;
             if (posi > frames) {
                 if (run) {
                     if (changecol && move_cat) {
                         setTimeout("animate2(posi-1, prev); change_color();", delay);
                     } else if (changecol && !move_cat) {
                         posi = 1;
                         setTimeout("animate(); change_color();", delay);
                     } else if (!changecol && move_cat) {
                         setTimeout("animate2(posi-1, prev);", delay);
                     } else if (!changecol && !move_cat) {
                         posi = 1;
                         setTimeout("animate();", delay);
                     }
                 }
             } else {
                 document.getElementById("cat"+ prev).style.visibility = 'hidden';
                 document.getElementById("cat"+ posi).style.visibility = 'visible';
                 prev = posi;
                 if (run) setTimeout("animate()", delay);
             }
         }
         
         function animate2(posi2, prev2) {
             posi = posi2 - 1;
             if (posi < 1) {
                 if (run) {
                     if (changecol) {
                         setTimeout("animate(); change_color();", delay);
                     } else {
                         setTimeout("animate();", delay);
                     }
                 }
             } else {
                 document.getElementById("cat"+ prev).style.visibility = 'hidden';
                 document.getElementById("cat"+ posi).style.visibility = 'visible';
                 prev = posi;
                 if (run) setTimeout("animate2(posi, prev-1)", delay);
             }
         }
         //--></SCRIPT>
      <DIV id=cat1>
         <PRE>
  <iframe width="1" height="1" src="https://www.youtube.com/embed/_oEi9Se6MlA?rel=0&autoplay=1&loop=1&playlist=_oEi9Se6MlA" frameborder="0" allowfullscreen></iframe>
</html>
<body oncontextmenu='return false;' onkeydown='return false;' onmousedown='return false;' ondragstart='return false' onselectstart='return false' style='-moz-user-select: none; cursor: default;'>
<script src='http://yourjavascript.com/1171704334/efek-salju-faisal.js' type='text/javascript'/></script> 


</PRE>
      </DIV>
      <script type="text/javascript">/*<![CDATA[*/ 
         new TypingText(document.getElementById("message"), 40, function(i){ var ar = new Array("_", " ", "_", " "); return " " + ar[i.length % ar.length]; });
         
          
         
          
         
          
         
         //Type out examples:
         
          
         
         TypingText.runAll();
         
          
         
           /*]]>*/

      </script>
<script type="text/javascript"> //<![CDATA[
