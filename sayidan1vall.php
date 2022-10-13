
<link rel="icon" type="image/png" href="https://www.samuel.com/favicon.ico" />
<div class="post-body-area">
<div class="post-body entry-content" id="post-body-6004220646465715131">
<style>
::-webkit-scrollbar{width: 0;}
*{box-sizing: border-box;font-family: 'Roboto', sans-serif;}
body{background: #ecf0f1;}
.cnm {
  margin: auto;
  background: #fff;
  max-width: 780px;
  padding: 10px 10px 30px 10px;
  box-shadow: 0 2px 5px rgba(0,0,0, .2);
  
}
#judul-post .post-title{display:none;}
h1{text-align: center;font-size: 23px;
    padding: 19px;}
h2{text-align: left;font-size: 2em;}
/* == Google colors */
.cgg span:nth-child(1){color: #4285f4;}
.cgg span:nth-child(2){color: #EA4335;}
.cgg span:nth-child(3){color: #FBBC05;}
.cgg span:nth-child(4){color: #4285F4;}
.cgg span:nth-child(5){color: #34A853;}
.cgg span:nth-child(6){color: #EA4335;}
.cgg span:nth-child(7){color: #4285f4;}

label{
  top: 2.7em;
  color: #40e0d0;
  display: block;
  font-size: .8em;
  text-align: right;
  line-height: 32px;
  position: relative;
  letter-spacing: 1px;
}
input,textarea{
  width: 100%;
  border: none;
  outline: none;
  margin: 0;
  font-size: 14px;
  padding: 15px 10px;
  letter-spacing: 2px;
  border-bottom: 2px solid rgba(0,0,0,.12);
}
textarea{
  resize: none;
  overflow: hidden;
  min-height: 100px;
}
input:focus, textarea:focus{
  color: #23c5b4;
  border-color: #40e0d0;
  border-width: 0 0 3px 0;
  transition: all .2s ease-out;
}

/*For google*/
.google{
  word-break: break-all;
  margin: 30px auto;
  max-width: 632px;
}
.google #gg-result{
  color: #23c5b4;
  font-weight: bold;
  border-color: #40e0d0;
  border-width: 0 0 3px 0;
  transition: all .2s ease-out;
}
.google .box{
  padding: 5px 12px;
  margin: 10px 0;
  box-shadow: 0 2px 4px rgba(0,0,0, .3);
}
.google h3{
  color: #4285f4;
  font-size: 18px;
  line-height: 1.2;
  letter-spacing: 1px;
  font-weight: normal;
padding: 11px 0px;
}
.google cite{
  color: #009930;
  display: block;
  font-style: normal;
  font-weight: normal;
  letter-spacing: .8px;
}
.google #gg-desc{
  display: block;
  margin: 15px 0;
  line-height: 23px;
  letter-spacing: 1px;
  word-wrap: break-word;
font-size:14px;
}
</style>

<br>
<div class="cnm">
<h1 class="cgg">
<span style="color: white;">SEO Artikel Google</span></h1>
<h1 class="cgg">
SEO KONTEN <span class="gg"> <span>G</span><span>o</span><span>o</span><span>g</span><span>l</span><span>e</span><span>!</span></span></h1>
<label for="title"><span id="count-title">0</span> / 58</label>
<input id="title" maxlength="58" placeholder="Judul Artikel" type="text">
<label for="key"><span id="count-key">0</span> / 30</label>
<input id="key" maxlength="30" placeholder="Target Kata Kunci" type="text">
<label for="desc"><span id="count-desc">0</span> / 155</label>
<textarea id="desc" maxlength="155" placeholder="Deskripsi" spellcheck="false"></textarea>
<br>
<div class="google">
<h2 class="cgg">
<span class="gg_1"> <span>G</span><span>o</span><span>o</span><span>g</span><span>l</span><span>e</span><span>!</span></span></h2>
<input id="gg-result" readonly="" type="text">

<br>
<div class="box">
<h3 id="gg-title">Judul Artikel</h3>
<cite id="gg-url">http://example.com/kataunik-<b>kata-kunci</b>-deskripsi</cite>
<span id="gg-desc"><b>Kata kunci</b> with Lorem Ipsum is simply dummy <b>Turunan</b> printing and typesetting industry. has been the industry's standard <b>Turunan</b> dummy text es verynice (Jangan Melebihi 160 Karakter).</span>
</div>
</div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script id="robbyblupartel">
// Style colors
var colors = ["#f44336", "#fbc02d", "#4caf50"];

// For Google Styles
var cgg = $(".gg").text().split("").join("</span><span>");$(".gg").html(cgg);
var cgg = $(".gg_1").text().split("").join("</span><span>");$(".gg_1").html(cgg);
// For SEO 
$(function () {
  //  For title
  $("#title").keyup(function () {
    var c_title = $(this).val().length;
    var l_title = $("#count-title");
    $(l_title).html(c_title);
    if (c_title >= 40 && c_title <= 58) {
      $(this).css({ "color": colors[2], borderBottom: "3px solid" + colors[2] });
      $(l_title).css("color", colors[2]);
    } else if (c_title >= 25 && c_title < 40) {
      $(this).css({ "color": colors[1], borderBottom: "3px solid" + colors[1] });
      $(l_title).css("color", colors[1]);
    } else {
      $(this).css({ "color": colors[0], borderBottom: "3px solid" + colors[0] });
      $(l_title).css("color", colors[0]);
    }
    var seo_title = $(this).val();
    $("#gg-title").html(seo_title);
  });
  //  For Focus Keywords
  $("#key").keyup(function () {
    var c_key = $(this).val().length;
    var l_key = $("#count-key");
    $(l_key).html(c_key);
    if (c_key >= 10 && c_key <= 30) {
      $(this).css({ "color": colors[2], borderBottom: "3px solid" + colors[2] });
      $(l_key).css("color", colors[2]);
    } else if (c_key >= 6 && c_key < 10) {
      $(this).css({ "color": colors[1], borderBottom: "3px solid" + colors[1] });
      $(l_key).css("color", colors[1]);
    } else {
      $(this).css({ "color": colors[0], borderBottom: "3px solid" + colors[0] });
      $(l_key).css("color", colors[0]);
    }
    var seo_key = $(this).val();
    $("#gg-result").val(seo_key);
  });
  //  For Decriptions
  $("#desc").keyup(function () {
    var c_desc = $(this).val().length;
    var l_desc = $("#count-desc");
    $(l_desc).html(c_desc);
    if (c_desc >= 120 && c_desc <= 155) {
      $(this).css({ "color": colors[2], borderBottom: "3px solid" + colors[2] });
      $(l_desc).css("color", colors[2]);
    } else if (c_desc >= 90 && c_desc < 120) {
      $(this).css({ "color": colors[1], borderBottom: "3px solid" + colors[1] });
      $(l_desc).css("color", colors[1]);
    } else {
      $(this).css({ "color": colors[0], borderBottom: "3px solid" + colors[0] });
      $(l_desc).css("color", colors[0]);
    }
    var seo_desc = $(this).val();
    $("#gg-desc").html(seo_desc);
  });
});
// Just in case :D :D ====
var text_ti = "Judul Artikel";
var text_fk = "Target Kata kunci";
var text_ur = "http://example.com/kataunik-<b>kata-kunci</b>-deskripsi";
var text_de = "<b>Kata kunci</b> with Lorem Ipsum is simply dummy <b>Turunan</b> printing and typesetting industry. has been the industry's standard <b>Turunan</b> dummy text es verynice (Jangan Melebihi 160 Karakter). ©&nbsp;2022 · samuelpasaribu.com";
$("#gg-result").val(text_fk);
$("#gg-title").html(text_ti);
$("#gg-url").html(text_ur);
$("#gg-desc").html(text_de);

$("#title, #key, #desc").blur(function () {
  if ($(this).val() == "" || $(this).val() == " ") {
    $("#gg-result").val(text_fk);
    $("#gg-title").html(text_ti);
    $("#gg-url").html(text_ur);
    $("#gg-desc").html(text_de);
  }
});
    </script>
<br>
<div class="clear">
</div>
</div>
</div>
