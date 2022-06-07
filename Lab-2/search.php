<?php

function search($arr,$x){
	for($i=0; $i< sizeof($arr); $i++){
		if($arr[$i] == $x)
			return $i;
	}
	return -1;
}
	$arr = array(2, 3, 9, 8, 5, 6, 4, 5);
	echo "The following element is in index: ",search($arr,9);


?>