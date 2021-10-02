function filterxss($data){

$filterxss = strip_tags(htmlspecialchars(htmlentities($data,ENT_QUOTES)));

return $filter;

}

	$input1 = mysqli_real_escape_string(trim(filterxss($_POST['input'])));
