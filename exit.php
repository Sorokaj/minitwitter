<?php 
include_once 'header.inc';

if (isset($_SESSION['user']))
{
    destroySession();	
	echo '<script>window.location.href = "index.php";</script>';	
}    


include_once "footer.inc";		  

?>


