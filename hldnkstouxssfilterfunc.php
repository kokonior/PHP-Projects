function filterxss($data){

$filterxss = strip_tags(htmlspecialchars(htmlentities($data,ENT_QUOTES)));

return $filter;

}
$message = '<script>alert(1)</script>'; // contoh serangan xss
	$input = mysqli_real_escape_string(trim(filterxss($_POST['message'])));


