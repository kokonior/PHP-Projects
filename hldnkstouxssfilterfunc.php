function filterxss($data){

$filterxss = strip_tags(htmlspecialchars(htmlentities($data,ENT_QUOTES)));

return $filter;

}
  $message = 'developerlawak';
	$input = mysqli_real_escape_string(trim(filterxss($_POST['message'])));
