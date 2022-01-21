<?php
include_once "header.inc";
echo 
"
	<div id=text>
";
$date=date('Y-m-d');$time= date('H:i');
if ("$loggedin")
{				
	echo 
	"
		<p>Тип работы</p>	
<div class='registration'>		
		<form action='dobavit.php' method='post'>						
			<table>								
				<tr>
					<td>
						Загололовок
					</td>
					<td>
						<input name='6' type='input' required>
					</td>
				</tr>
				<tr>
					<td>Текст</td>
					<td><textarea name='7'></textarea></td>
				</tr>
			</table>	
			<input type='hidden' name='1' value=''>
			<input type='hidden' name='2' value='$user'>
			<input type='hidden' name='3' value=''>
			<input type='hidden' name='4' value='$date'>
			<input type='hidden' name='5' value='$time'>
			<input type='hidden' name='table' value='twit'>
			<input type='hidden' name='kolichestvo_par' value='7'>				
			<input type='hidden' name='obr_addr' value='index.php'>
			</br>				
			<input type = 'submit' name = 'dob' value = 'Создать'>	
		</form>
</div>		
	</div>	
";
}	
else 
{
	echo "Вы не можете просматривать данную страницу";
}


include_once "footer.inc";