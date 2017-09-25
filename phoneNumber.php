<?php
// number
$num = array("ZERO"=>2,"ONE"=>3,"TWO"=>4,"THREE"=>5,"FOUR"=>6,"FIVE"=>7,"SIX"=>8,"SEVEN"=>9,"EIGHT"=>0,"NINE"=>1);

//Count the number of letter
function statistics($str){
	$arr = array();
	for($int = 0;$int<strlen($str);$int++){
		$key = $str[$int];
		if($arr[$key]){
			$arr[$key]++;
		}else $arr[$key] = 1;
	}
	return $arr;
}

//Translate the number
function translate($sta){

	$arr = array();

	if($sta["Z"]){
		$arr[2] = $sta["Z"];
	} //get the number of 0 && translate to 2
	if($sta["W"]){
		$arr[4] = $sta["W"];
	} //get the number of 2 && translate to 4
	if($sta["X"]){
		$arr[8] = $sta["X"];
		$sta["S"] -= $sta["X"];
		$sta["I"] -= $sta["X"];
	} //get the number of 6 && translate to 8
	if($sta["G"]){
		$arr[0] = $sta["G"];
		$sta["H"] -= $sta["G"];
		$sta["I"] -= $sta["G"];
	} //get the number of 8 && translate to 0
	if($sta["U"]){
		$arr[6] = $sta["X"];
	} //get the number of 4 && translate to 6	
	if($sta["H"]){
		$arr[5] = $sta["H"];
	} //get the number of 3 && translate to 5
	if($sta["F"]){
		$arr[7] = $sta["F"];
		$sta["I"] -= $sta["F"];
	} //get the number of 5 && translate to 7
	if($sta["S"]){
		$arr[9] = $sta["S"];
		$sta["Z"] -= $sta["S"];
		$sta["N"] -= $sta["S"];
	} //get the number of 7 && translate to 9
	if($sta["I"]){
		$arr[1] = $sta["I"];
		$sta["N"] -= $sta["I"];
	} //get the number of 9 && translate to 1
	if($sta["N"]){
		$arr[3] = $sta["N"];
	} //get the number of 1 && translate to 3

	return $arr;
}

// get the string
fwrite(STDOUT,"Enter the string: ".PHP_EOL);
$str = trim(fgets(STDIN));	
$stas = translate(statistics($str));

$result = "";
for($count = 0;$count<10;$count++){
	if($stas[$count]>0){
		$counts = (string)$count;
		for($i = 0;$i<$stas[$count];$i++){
			$result .= $counts;
		}
	}
}

echo $result;
?>