
<?php
	if(array_key_exists('submit',$_POST )){
		/*foreach ($_POST['day'] as $select) {
			echo "$select";
		}*/
		print_r($_POST['day']);
		echo(count($_POST['day']));
	}

?>