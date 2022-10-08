<?php
// Dont remove this line if you are using this code!
// Respect!
//iamkunal9 HERE!
function random_strings($length_of_string)
{
 	// ABCDEFGHIJKLMNOPQRSTUVWXYZ
    // String of all alphanumeric character
    $str_result = '0123456789abcdefghijklmnopqrstuvwxyz';
 
    // Shuffle the $str_result and returns substring
    // of specified length
    return substr(str_shuffle($str_result),
                       0, $length_of_string);
}
$a = 0;
if (isset($_POST['url'])){


	$url = filter_var($_POST['url'], FILTER_SANITIZE_URL);

// Validate url
if (filter_var($url, FILTER_VALIDATE_URL) !== false) {
$a = 1;
} else {
echo "<script>alert('Invalid Url')</script>";
}
	
$dir = random_strings(4);
$url = $_POST['url'];
if( is_dir($dir) === false )
{
    mkdir($dir);
}
else{
	echo "<script>alert('Try Again!!')</script>";
}
$file = fopen($dir . '/index.html',"w");
$txt = "
<!DOCTYPE html>
<html>
<head>
	<meta charset='utf-8'>
	<title></title>
</head>
<body>

</body>
<script type='text/javascript'>location.href = '".$url."'</script>
</html>
";
fwrite($file, $txt);
fclose($file);
}
?>



<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	    <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="icon" type="image/x-icon" href="favicon.ico">
	<title>Url Shortner</title>
</head>
<style type="text/css">
	.form__group {
  position: relative;
  padding: 15px 0 0;
  margin-top: 10px;
  width: 80%;
}
	.form__group1 {
  position: relative;
  padding: 15px 0 0;
  margin-top: 10px;
  width: 50%;
}

.form__field {
  font-family: inherit;
  width: 100%;
  border: 0;
  border-bottom: 2px solid #9b9b9b;
  outline: 0;
  font-size: 1.3rem;
  color: black;
  padding: 7px 0;
  background: transparent;
  transition: border-color 0.2s;
}
.form__field::placeholder {
  color: transparent;
}
.form__field:placeholder-shown ~ .form__label {
  font-size: 1.3rem;
  cursor: text;
  top: 20px;
}

.form__label {
  position: absolute;
  top: 0;
  display: block;
  transition: 0.2s;
  font-size: 1rem;
  color: #9b9b9b;
}
.form__label1 {
  top: 0;
  display: block;
  transition: 0.2s;
  font-size: 1rem;
  color: #9b9b9b;
}

.form__field:focus {
  padding-bottom: 6px;
  font-weight: 700;
  border-width: 3px;
  border-image: linear-gradient(to right, #11998e, #38ef7d);
  border-image-slice: 1;
}
.form__field:focus ~ .form__label {
  position: absolute;
  top: 0;
  display: block;
  transition: 0.2s;
  font-size: 1rem;
  color: #11998e;
  font-weight: 700;
}

/* reset input */
.form__field:required, .form__field:invalid {
  box-shadow: none;
}

/* demo */
body {
  font-family: "Poppins", sans-serif;
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
  min-height: 100vh;
  font-size: 1.5rem;
  /*background-color: #222222;*/
  background-image: url("https://media.discordapp.net/attachments/994237473460854804/1007198005025321031/20220811_133426_0000.png");
  background-position: 50% 50%;

}

@import url('https://fonts.googleapis.com/css?family=Montserrat:600&display=swap');
span{
  position: relative;
  display: inline-flex;
  width: 180px;
  height: 55px;
  margin: 0 15px;
  perspective: 1000px;
}
span a{
  font-size: 19px;
  letter-spacing: 1px;
  transform-style: preserve-3d;
  transform: translateZ(-25px);
  transition: transform .25s;
  font-family: 'Montserrat', sans-serif;
  
}
span a:before,
span a:after{
  position: absolute;
  content: "COPY URL";
  height: 55px;
  width: 180px;
  display: flex;
  align-items: center;
  justify-content: center;
  border: 5px solid black;
  box-sizing: border-box;
  border-radius: 5px;
}
span a:before{
  color: #fff;
  background: #000;
  transform: rotateY(0deg) translateZ(25px);
}
span a:after{
  color: #000;
  transform: rotateX(90deg) translateZ(25px);
}
span a:hover{
  transform: translateZ(-25px) rotateX(-90deg);
}


</style>
<body>
<div class="form__group field">
	<form action="index.php" method="POST">
	<input type="url" class="form__field" placeholder="Url" name="url" id='url' required />
  	<label for="name" class="form__label">Url</label>
	</form>
	<div style="display: <?php if ($a == 0){echo 'none';} else{echo 'block';}?>">
		<br>
		<br>
		<label class="form__label1">Shorted Url</label>
		
<input type="url" class="form__field" placeholder="SUrl" value="<?php if ($a == 0){echo "";} else{echo 'https://kunalsharma.ml/'.$dir;} ?>" name="Surl" id='Surl' required /><br><br>
<span style="align:center;"><a href="javascript:copy()"></a></span>
	</div>
	
</div>
	<input type="hidden" value="https://linktr.ee/iamkunal9">
<script>
function copy(){
  var copyText = document.getElementById("Surl");
  copyText.select();
  copyText.setSelectionRange(0, 99999);
  navigator.clipboard.writeText(copyText.value);
}
</script>
<footer>
  <a href="https://github.com/iamkunal9"><svg align="left" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="
    position: absolute;
    /* align-content: baseline; */
    /* align-items: baseline; */
    bottom: 30px;
    left: 36px;
"><path d="M12 0c-6.626 0-12 5.373-12 12 0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23.957-.266 1.983-.399 3.003-.404 1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576 4.765-1.589 8.199-6.086 8.199-11.386 0-6.627-5.373-12-12-12z"></path></svg>
</a>
<a href="https://instagram.com/iamkunal9_">
<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="
    position: absolute;
    bottom: 30px;
    left: 65px;
"><path d="M14.829 6.302c-.738-.034-.96-.04-2.829-.04s-2.09.007-2.828.04c-1.899.087-2.783.986-2.87 2.87-.033.738-.041.959-.041 2.828s.008 2.09.041 2.829c.087 1.879.967 2.783 2.87 2.87.737.033.959.041 2.828.041 1.87 0 2.091-.007 2.829-.041 1.899-.086 2.782-.988 2.87-2.87.033-.738.04-.96.04-2.829s-.007-2.09-.04-2.828c-.088-1.883-.973-2.783-2.87-2.87zm-2.829 9.293c-1.985 0-3.595-1.609-3.595-3.595 0-1.985 1.61-3.594 3.595-3.594s3.595 1.609 3.595 3.594c0 1.985-1.61 3.595-3.595 3.595zm3.737-6.491c-.464 0-.84-.376-.84-.84 0-.464.376-.84.84-.84.464 0 .84.376.84.84 0 .463-.376.84-.84.84zm-1.404 2.896c0 1.289-1.045 2.333-2.333 2.333s-2.333-1.044-2.333-2.333c0-1.289 1.045-2.333 2.333-2.333s2.333 1.044 2.333 2.333zm-2.333-12c-6.627 0-12 5.373-12 12s5.373 12 12 12 12-5.373 12-12-5.373-12-12-12zm6.958 14.886c-.115 2.545-1.532 3.955-4.071 4.072-.747.034-.986.042-2.887.042s-2.139-.008-2.886-.042c-2.544-.117-3.955-1.529-4.072-4.072-.034-.746-.042-.985-.042-2.886 0-1.901.008-2.139.042-2.886.117-2.544 1.529-3.955 4.072-4.071.747-.035.985-.043 2.886-.043s2.14.008 2.887.043c2.545.117 3.957 1.532 4.071 4.071.034.747.042.985.042 2.886 0 1.901-.008 2.14-.042 2.886z" style="
    /* position: absolute; */
    /* bottom: 30px; */
"></path></svg></a>
<a href="https://www.linkedin.com/in/kunal-sharma-931b52226">
    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="
    position: absolute;
    bottom: 30px;
    left: 95;
"><path d="M12 0c-6.627 0-12 5.373-12 12s5.373 12 12 12 12-5.373 12-12-5.373-12-12-12zm-2 16h-2v-6h2v6zm-1-6.891c-.607 0-1.1-.496-1.1-1.109 0-.612.492-1.109 1.1-1.109s1.1.497 1.1 1.109c0 .613-.493 1.109-1.1 1.109zm8 6.891h-1.998v-2.861c0-1.881-2.002-1.722-2.002 0v2.861h-2v-6h2v1.093c.872-1.616 4-1.736 4 1.548v3.359z"></path></svg>
</a>
<svg role="img" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><title>Linktree</title><path d="M7.953 15.066c-.08.163-.08.324-.08.486.08.517.528.897 1.052.89h1.294v4.776c0 .486-.404.89-.89.89H6.577a.898.898 0 0 1-.889-.891v-4.774H.992c-.728 0-1.214-.729-.89-1.377l6.96-12.627a1.065 1.065 0 0 1 1.863 0l2.913 5.585-3.885 7.042zm15.945 0l-6.96-12.627a1.065 1.065 0 0 0-1.862 0l-2.995 5.586 3.885 7.04c.081.164.081.326.081.487-.08.517-.529.897-1.052.89h-1.296v4.776c.005.49.4.887.89.89h2.914a.9.9 0 0 0 .892-.89v-4.775h4.612c.73 0 1.214-.729.89-1.377Z"/></
</footer>
</body>

</html>


