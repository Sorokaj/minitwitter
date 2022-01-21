<?php

echo "   
</div>
				<div class=left_block>";
					if ($loggedin)
					{
					
						echo "<strong>".$user."</strong> | <a href='exit.php'>Выход</a>";
						
						
						{								
								$result3 = queryMysql("SELECT * FROM users WHERE user<>'$user'");																
								$num3 = mysql_num_rows($result3);	
								echo "<div class = 'menu'>";
								for ($i3=$num3-1;$i3>=0;$i3--) 
								{
									$author=mysql_result($result3,$i3,'user');	
									
									$result4 = queryMysql("SELECT * FROM twit WHERE author = '$author'");
									$twits = mysql_num_rows($result4);						
										if ($twits == 0 ){$twits = '';}									
					
									
									echo 
									"
									<p>										
										<li><a class = admin href='author.php?author=$author'>$author <div class = scolkogreen>$twits</div></a></li>
									</p>
									
									";	
								}
								echo "</div>";	
								
						}	
					}	
					else 
					{ 
						echo 
						"
							<form method='post' action='login.php'>$error
								<div class='fieldname'>
									Логин
								</div>
								<input type='text' maxlength='16' name='user' required/>
								<br>
								<div class='fieldname' required>
									Пароль
								</div>
								<input type='password' maxlength='16' name='pass'/>
								<br>
								<div class='fieldname'>
									&nbsp;
								</div>
								<input type='submit' value='ОК'/>
							</form>	
							<a href='registration.php'>Регистрация</a>	
								
						";			
					}
				echo 
				"
					</div>
				</div>
			<div class = 'footer'>
			
			</div>
		</div>
	</body>
</html>";
?>