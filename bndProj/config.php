<?php

function redirect($url=''){
	if(!empty($url))
	echo '<script>location.href="bndProj/'. .$url.'"</script>';
}

?>
