<?php
$area;
$perimeter;

function area($length, $width){
	return $area=$length*$width;
}
function perimeter($length, $width){
	return $perimeter=2*($length+$width);
}
	echo ('The area of rectangle is: ').area(6,7).'/r./n';
	echo ('The perimeter of rectangle is: ').perimeter(2,9);
?>