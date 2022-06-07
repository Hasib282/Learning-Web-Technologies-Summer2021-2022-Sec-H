<?php

function vat($amount){
	return $vat=$amount*15/100;

}
echo ('The vat is : ').vat(160);

?>