<?php
function pre_var_dump($data = '') {
	echo '<pre>';
	var_dump($data);
	echo '</pre>';
}



//pre_var_dump($_SERVER);
echo $_SERVER["REMOTE_ADDR"] ;

?>