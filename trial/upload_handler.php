<?php
		
		$fileName=$_FILES['image']['name'];
		$fileSize=$_FILES['image']['size'];
		$fileTmpLoc=$_FILES['image']['tmp_name'];
		
			
		$allowed_ext=array('jpg','jpeg','png','gif');
		$image_ext=strtolower(end(explode('.',$image_name)));
		
		
		
?>