<form action="<?= $_SERVER['PHP_SELF']?>" method="post" enctype="multipart/form-data">
	<img src="" id="image" width="190px" height="190px">
	  <input type="file" name="file">
	  <input type="submit" name="sub" value="enter">
</form>

<?php 
  ini_set('display_errors', '0'); 
    if(!empty($_POST['sub'])):
    		$file = $_FILES['file']['name'];
    		move_uploaded_file($_FILES['file']['tmp_name'],__DIR__.DIRECTORY_SEPARATOR.$file.md5(time()));
    endif;
    $scan = scandir(__DIR__);
    foreach($scan as $dir):
    	 if((bool)getimagesize($dir)):
    	   ?>
    		<img src="<?= $dir?>" width="190px" height="190px">
    		<a href="index.php?m=delete&r=<?= $dir?>">delete</a>
    	<?php
    	endif;
	endforeach;
	if($_GET['m']=='delete'):
			unlink($_GET['r']);
			header('Location:'.basename($_SERVER['SCRIPT_NAME']));		
	endif;

	echo php_uname('m')

?>


<script type="text/javascript">
	    submit = document.querySelector('input[name="file"]');
	    submit.addEventListener('change',sendFile);

	    function sendFile(e){
	    		var reader = new FileReader()

	    		reader.onload = function(){
	    			     image = document.querySelector('#image')
	    			     image.src = reader.result
	    		}
	    		reader.readAsDataURL(e.target.files[0])
	    		/*src = URL.createObjectURL(e.target.files[0])
	    		image.src = src;
	    		image.onload = ()=>{
	    			 	URL.revokeObjectURL(image.src)
	    		}*/
	    }




</script>

