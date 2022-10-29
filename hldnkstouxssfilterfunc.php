function filterxss($data){

    $filterxss = strip_slashes(strip_tags(htmlentities($data,ENT_QUOTES)));
    return $filterxss;
    }
	$message = '<script>alert(1)</script>'; // contoh serangan xss
	$input = filterxss($_POST['message']);
	echo $input;
		
		

