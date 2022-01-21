<?php 
include_once 'header.inc';
$data=Date("Y-m-d H:i:s");
echo 
"
	<div class='registration'>
		<form action='dob_reg.php' method='POST'>
			<table>
				<input name='1' type='hidden' value=''>		
				<tr>
					<td>
						Логин:(*)
					</td>
					<td>
						<input name='2' type='text' size='20' required onBlur='checkUser(this)'><span id='login'></span>
					</td>
					
				</tr>
				<tr>
					<td>
						Пароль:(*)
					</td>
					<td>
						<input name='3' type='password' size='20' maxlength='20' required>
					</td>
				</tr>
				<tr>
					<td>
						Подтверждения пароля:(*)
					</td>
					<td>
						<input name='3' type='password' size='20' maxlength='20' required>
					</td>
				</tr>
				<tr>
					<td>
						E-mail:(*)
					</td>
					<td>
						<input name='4' type='text' size='20' required>
					</td>
				</tr>
				<tr>
					<td>
						Имя:
					</td>
					<td>
						<input name='6' type='text' size='20'>
					</td>
				</tr>
				<tr>
					<td>
						Фамилия:
					</td>
					<td>
						<input name='7' type='text' size='20'>
					</td>
				</tr>
				<tr>
					<td>
					</td>
					<input name='5' type='hidden' value='$data'>		
					<input name='8' type='hidden' value='Автор'>		
					<input type='hidden' name='table' value='users'>
					<input type='hidden' name='kolichestvo_par' value='8'>
					<td colspan='2'>
					
						
						
						<input type='submit' value='Зарегистроваться...' name='submit' >
					</td>
				</tr>
			</table>  
			<br>
		</form>
	</div>
";
include_once "footer.inc";		  
echo
	"
	<script>
		
		function checkUser(user)
		{		
		
		  if (user.value == '')
		  {
		  
			O('login').innerHTML = ''
			return
		  }

		  params  = 'user=' + user.value	
		  
			  request = new ajaxRequest()
			
			  request.open('POST', 'urlpost.php', true)
			  request.setRequestHeader('Content-type',
			  'application/x-www-form-urlencoded')
			  request.setRequestHeader('Content-length', params.length)
			  request.setRequestHeader('Connection', 'close')
				
			  request.onreadystatechange = function()
			  {
				if (this.readyState == 4)
				{
				  if (this.status == 200)
				  {
					if (this.responseText != null)
					{
				
					document.getElementById('login').innerHTML =	this.responseText
					  
					}
					else alert('Ajax error: No data received')
				  }
				  else alert( 'Ajax error: ' + this.statusText)
				}
			  }
			  
			  request.send(params)
		}  
	</script>";

?>