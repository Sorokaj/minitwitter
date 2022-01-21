<?php
include_once "header.inc";

if ($loggedin)
{	
	echo "<h2></h2>";
	$result = queryMysql("SELECT * FROM twit WHERE author = '$user'");				
	
	{
		echo "<p><a class = admin href='dobavit_twit.php' class='admin_href'>Добавить твит</a></p>";
		$num = mysql_num_rows($result);	
			if($num>0){	
				for ($i=$num-1;$i>=0;$i--) 
				{   
					include "zapros_twit.inc";
					viz_function();				
					$n_twit = $num-1-$i;
					echo "
					<div class = submenu>						
					<a class = admin href='del_twit.php?id=$id' onClick=return window.confirm('При подтверждении произойдет переход на главную страницу сайта, перейти?')>удалить твит</a> 				
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