<?php
	header('Content-type: application/pdf');
	header('filename='.$fname);                
	readfile($pfname);  

?>

