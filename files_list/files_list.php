<?php

/*

Description:

Display files list using the below array. The "result.png" represents how the list should look. Recreate it as close as possible.

File name should be striped if it's too long.
File extension should always be visible after the file name.
File size should always be visible after the file extension.
Hover should display default BROWSER tooltip with full file name.

Tips:
- words with same characters count won't have the same length: iiiii is shorter than wwwww.
- files extensions have different number of characters: 7z, html.
- take longer look at the provided PNG file. It really should look as close as possible.
- CSS is really powerful.
- look at this exercise as a part of a larger dynamic application. Don’t create code that only “works”. Try to use best practices.

*/

$files = array(
	array(
		'name' => 'Detailed Brief - www.mysite.com.pdf',
		'size' => '1.4MB',
	),
	array(
		'name' => 'Pure WordPress theme.zip',
		'size' => '735.9KB',
	),
	array(
		'name' => 'Logotype.jpg',
		'size' => '94.7KB',
	),
);

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Files list</title>
	<style>
		.box{padding:10px;}
		.overflow{float: left; white-space: nowrap;max-width:150px;overflow: hidden;text-overflow: ellipsis;font-size: 1.2em;color:#797979;}
		.exten{float: left; margin:0 3px 0 0;font-size: 1.2em;color:#797979;}
		.size{float: left;font-size: 1em;color:#4eabe5;}
	</style>
</head>
<body>
<div class="box">
<?php
$size = count($files);
for($i=0;$i<$size;$i++){
$fName = $files[$i]['name'];
$name = substr($fName, 0, strrpos($fName, "."));
$exten = explode(".", $fName);
$extenSize = count($exten);
$ilkropek = substr_count($fName, ".");
	echo '<div class="overflow" title="'.$fName.'">'.$name.'</div><div class="exten">.'.$exten[$extenSize-1].'</div><div class="size"> ('.$files[$i]['size'].')</div><br><br>';
}
?>
</div>
</body>
</html>
