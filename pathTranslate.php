<?php
	
	fwrite(STDOUT,"Enter the path: ".PHP_EOL);
	$path = trim(fgets(STDIN));
	$pathArray = explode("/",$path);
	array_splice($pathArray,0,1);
	$count = 0;
	while($pathArray[$count]){
		echo $pathArray[$count].PHP_EOL;
		cut($pathArray,$count);
		foreach ($pathArray as $path) {
		echo "/".$path;
	}
		echo PHP_EOL;
	}

function cut(&$pathDetails,&$num){
		$path = $pathDetails[$num];
		switch ($path) {
			case '.':
				array_splice($pathDetails,$num,1);
				break;

			/*case '':
				array_splice($pathDetails,$count,1);
				break;
*/
			case '..':
				if($num == 0){
				die('Wrong path');
				}else{
				$num--;
				array_splice($pathDetails,$num,2);
				}
				break;
				
			default:
				$num++;
		}
	}
	/*foreach ($pathArray as $path) {
		echo "/".$path;
	}*/
?>