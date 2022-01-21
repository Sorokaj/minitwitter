<?php
session_start();
include_once 'functions.inc';
/*$data=Date("Y-m-d H:i:s");*/
$userstr = ' (Guest)';
if (isset($_SESSION['user']))
{
    $user = $_SESSION['user'];
	$role = $_SESSION['role'];
	$id_user = $_SESSION['id'];
    $loggedin = TRUE;
    $userstr  = " ($user)";
}
else $loggedin = FALSE;
echo "
<html>
	<head>
		<meta charset='utf8'>
		<title>
			Личный кабинет
		</title>
		<link rel='stylesheet' href='stylesheet/styles.css'>	
		<script type='text/javascript' src='ckeditor/ckeditor.js'></script>
	</head>
	<body>
		<div class='wrap'>
		<div class = 'menu'>";
			
		if ($loggedin)
			
			{		
						$result = queryMysql("SELECT * FROM twit WHERE author = '$user'");
						$new = mysql_num_rows($result);						
						if ($new == 0 ){$new = '';}						
				echo "
						<li><a href='index.php'>Мои твиты <div class = scolkogreen>$new</div></a></li>						
					";
					
			}		
				echo "</div>";
 


echo "
	<div class = 'content_wrap clear'>
		<div class = 'content'> ";


?>