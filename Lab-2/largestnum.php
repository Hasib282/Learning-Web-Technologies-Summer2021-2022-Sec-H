<?php 

$num1=20;
$num2=5;
$num3=29;
if($num1>$num2 && $num1>$num3){
	echo ('Largest number is ').$num1;
}
else if($num2>$num1 && $num2>$num3){
	echo ('Largest number is ').$num2;
}
else 
	echo ('Largest number is ').$num3;

?>