<?php

function redirect($url=''){
	if(!empty($url))
	echo '<script>location.href="http://localhost/Brownie-and-Downie/bndProj/' .$url. '"</script>';
}

?>
