<?php
include_once "header.inc";
if ($loggedin and $role=Администратор){

echo "<div id=text>";
		if (isset($_GET['id'])) $id = $_GET['id']; 
		else $id="";		
		queryMysql("DELETE FROM twit WHERE id=$id");			
		queryMysql("DELETE FROM comments WHERE id_twit=$id");
		echo '<script>window.location.href = "index.php";</script>';
echo "</div>";
}
include_once "footer.inc";

?>