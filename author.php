<?php
include_once "header.inc";

if ($loggedin)
{	
if (isset($_GET['author'])) $author = $_GET['author']; 
	else $author = "";
	echo "<h2></h2>";
	$result = queryMysql("SELECT * FROM twit WHERE author = '$author'");				
	
	{
		echo "<p>Твиты пользователя $author</p>";
		$num = mysql_num_rows($result);	
			if($num>0){	
				for ($i=$num-1;$i>=0;$i--) 
				{   
					include "zapros_twit.inc";
					viz_function();				
					$n_twit = $num-1-$i;
					echo "
					<div class = submenu>											 				
					<a href='javascript:void(0)' onclick = show_class('message_form','$n_twit')>сообщения <div class = scolkoyellow>$new_message</div></a><br>
					</div>";					
					function_message();		
					echo "<div></div>
				</div>";	
				}
			}
	}
		
}
include_once "footer.inc";