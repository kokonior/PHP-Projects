
<!doctype html><html><head><meta charset="gb2312"> 
  <title>Hacked By MR.PRINS</title> 
   
   
  <meta name="title" content="You System Have Been Down!"> 
  <meta name="keywords" content="Hacked By MR.PRINS"> 
  <meta name="description" content="MR.PRINS Was Here! Your Site Security Is Too Low. So, I Hacked It. Upgrade Your Security Level."> 
  <meta name="author" content="INDONESIAN PREDATOR"> 
  <meta name="viewport" content="width=device-width, initial-scale=0.53"> 
  <meta property="og:description" content="Patch Your Bug!."> 
  <meta property="og:title" content="This site hacked by MR.PRINS"> 
  <meta property="og:image" content="https://nathanprinsley-files.prinsh.com/data-1/images/NathanPrinsley-NoFace.png">
  <link rel="icon" href="https://nathanprinsley-files.prinsh.com/data-1/images/NathanPrinsley-NoFace.png">
  
  
  <link rel="stylesheet" href="https://nathanprinsley-files.prinsh.com/data-1/css/deface(03-01).css"/>
</head> 
 <body> 
  <div class="stars"> 
   <center> 
    <h1>BLACKHAT-DARKNET</h1> 
   </center> 
  </div> 
  <br> 
  <div class="twinkling"> 
   <center> 
    <br> 
    <br> 
    <br> 
    <br> 
    <br> 
    <img src="https://nathanprinsley-files.prinsh.com/data-1/images/NathanPrinsley-AnonymousLogo.png" width="250"> 
    <style> img{ animation-name: rotate ; animation-duration: 6s; animation-play-state: running; animation-timing-function: linear; animation-iteration-count: infinite; } @keyframes rotate{ 10% {transform:rotateY(36deg)} 20% {transform:rotateY(72deg)} 30% {transform:rotateY(108deg)} 40% {transform:rotateY(144deg)} 50% {transform:rotateY(180deg)} 60% {transform:rotateY(216deg)} 70% {transform:rotateY(252deg)} 80% {transform:rotateY(288deg)} 90% {transform:rotateY(324deg)} 100% {transform:rotateY(360deg)} } 
    </style> 
    <br> 
    <br> 
    <center> 
     <h1 class="t3x"> <font color="lime" style="text-shadow: 0 0 20px blue, 0 0 5px red, 0 0 7px red, 0 0 45px red; font-weight:bold: red;font-size:50px"> HACKED BY MR.PRINS </font> </h1> 
     <br> 
    </center> 
    <div class="container"> 
     <div class="text"></div> 
    </div> 
    <br> 
    <br> 
    <br> 
    <font face="Sarpanch" color="white" size"10" class="message"> Who Am I? prins@programmer.net </font> 
    <br> 
    <br>
    <br>
     <marquee behavior="scroll" direction="left" scrollamount="90" scrolldelay="40" width="100%"> 
      <br> 
      <font color="red" size="4">___________________________________________________________</font> 
     </marquee> 
     <div style="text-shadow: 0px 0px 10px green;"> 
      <span style="color: orange;"> <font face="transformers" size="4"><b>Greetzs To : </b></font><b> </b></span> 
      <b> 
       <marquee scrollamount="5" direction="left" width="70%"> 
        <font face="Play" color="red" class="cn"> MR.PRINS <font color="cyan">|<font color="lime">Nathan Prinsley</font><font color="cyan">|</font> </font> deface.prinsh.com <font color="cyan">|</font> Prinsh <font color="cyan"> | </font> Anonymous <font color="cyan">|</font> BlackHat <font color="cyan"> | </font> DarkNet <font color="cyan">|
       </marquee> </b> 
     </div><b> <script type="text/rocketscript">/*<![CDATA[*/new TypingText(document.getElementById("message"), 90, function(i){ var ar= new Array("_", " ", "_", " "); return "" +ar[i.length % ar.length]; });//Type out examples:TypingText.runAll();/*]]>*/</script> 
      <marquee behavior="scroll" direction="right" scrollamount="90" scrolldelay="40" width="100%"> 
       <font color="red" size="4">___________________________________________________________</font> 
      </marquee> </b></font> 
   </center> 
   <font face="Sarpanch" color="white" size"10" class="message"><b><font face="Sarpanch" color="white" size"10" class="message"><font face="Play"><font color="cyan"> </font></font></font></b></font> 
  </div> 
  <font face="Sarpanch" color="white" size"10" class="message"><b><font face="Sarpanch" color="white" size"10" class="message"><font face="Play"><font color="cyan"> 
       <div class="clouds"> 
       </div>
       <audio src="https://nathanprinsley-files.prinsh.com/data-1/mp3/horizon.mp3" loop="1" autoplay="1"></audio> </font></font></font> </b></font> 
 
<script type="text/javascript" id="dcoder_script">class TextScramble {
  constructor(el) {
    this.el = el
    this.chars = '!@#$%^&*()_-=+{}:"|<>?,./;'
    this.update = this.update.bind(this)
  }
  setText(newText) {
    const oldText = this.el.innerText
    const length = Math.max(oldText.length, newText.length)
    const promise = new Promise((resolve) => this.resolve = resolve)
    this.queue = []
    for (let i = 0; i < length; i++) {
      const from = oldText[i] || ''
      const to = newText[i] || ''
      const start = Math.floor(Math.random() * 40)
      const end = start + Math.floor(Math.random() * 40)
      this.queue.push({ from, to, start, end })
    }
    cancelAnimationFrame(this.frameRequest)
    this.frame = 0
    this.update()
    return promise
  }
  update() {
    let output = ''
    let complete = 0
    for (let i = 0, n = this.queue.length; i < n; i++) {
      let { from, to, start, end, char } = this.queue[i]
      if (this.frame >= end) {
        complete++
        output += to
      } else if (this.frame >= start) {
        if (!char || Math.random() < 0.28) {
          char = this.randomChar()
          this.queue[i].char = char
        }
        output += `<span class="dud">${char}</span>`
      } else {
        output += from
      }
    }
    this.el.innerHTML = output
    if (complete === this.queue.length) {
      this.resolve()
    } else {
      this.frameRequest = requestAnimationFrame(this.update)
      this.frame++
    }
  }
  randomChar() {
    return this.chars[Math.floor(Math.random() * this.chars.length)]
  }
}

const phrases = [
  'Your site security is vulnerable.',
  'I hacked your site simple.',
  'Upgrade your security.',
  'But it is true that every security has a vulnerable point.',
  'Good bye, pray for me...!'
]

const el = document.querySelector('.text')
const fx = new TextScramble(el)

let counter = 0
const next = () => {
  fx.setText(phrases[counter]).then(() => {
    setTimeout(next, 1500)
  })
  counter = (counter + 1) % phrases.length
}

next()

'use strict';

var app = {

  init: function () {
    app.container = document.createElement('div');
    app.container.className = 'animation-container';
    document.body.appendChild(app.container);
    window.setInterval(app.add, 100);
  },

  add: function () {
    var element = document.createElement('span');
    app.container.appendChild(element);
    app.animate(element);
  },

  animate: function (element) {
    var character = app.chars[Math.floor(Math.random() * app.chars.length)];
    var duration = Math.floor(Math.random() * 15) + 1;
    var offset = Math.floor(Math.random() * (50 - duration * 2)) + 3;
    var size = 10 + (15 - duration);
    element.style.cssText = 'right:'+offset+'vw; font-size:'+size+'px;animation-duration:'+duration+'s';
    element.innerHTML = character;
    window.setTimeout(app.remove, duration * 1000, element);
  },

  remove: function (element) {
    element.parentNode.removeChild(element);
  },

};

document.addEventListener('DOMContentLoaded', app.init);</script>
<script defer src="https://static.cloudflareinsights.com/beacon.min.js/v652eace1692a40cfa3763df669d7439c1639079717194" integrity="sha512-Gi7xpJR8tSkrpF7aordPZQlW2DLtzUlZcumS8dMQjwDHEnw9I7ZLyiOj/6tZStRBGtGgN6ceN6cMH8z7etPGlw==" data-cf-beacon='{"rayId":"758d34cf395087b1","version":"2022.8.1","r":1,"token":"af76a0f2ef2c4842bd3334f3c2936a9f","si":100}' crossorigin="anonymous"></script>
</body></html>
