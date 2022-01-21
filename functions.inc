<?php 
header('Content-Type: text/html; charset= utf-8');
$dbhost  = 'localhost';    // Unlikely to require changing
$dbname  = 'srv53037_forum';       // Modify these...
$dbuser  = 'srv53037_ht60849';   // ...variables according
$dbpass  = 'Mi39HNYc';   // ...to your installation
$appname = "Электронный документооборот"; // ...and preference
$site = 'localhost/ais2';
mysql_connect($dbhost, $dbuser, $dbpass) or die(mysql_error());
mysql_query("SET NAMES 'utf8';"); 
mysql_query("SET CHARACTER SET 'utf8';"); 
mysql_query("SET SESSION collation_connection = 'utf8_general_ci';"); 
mysql_select_db($dbname) or die(mysql_error());

function createTable($name, $query)
{
    queryMysql("CREATE TABLE IF NOT EXISTS $name($query)");
    echo "Table '$name' created or already exists.<br />";
}

function queryMysql($query)
{
    $result = mysql_query($query) or die(mysql_error());
	 return $result;
}

function destroySession()
{
    $_SESSION=array();
	
    session_destroy();
}

function sanitizeString($var)
{
    $var = strip_tags($var);
    $var = htmlentities($var);
    $var = stripslashes($var);
    return mysql_real_escape_string($var);
}

function function_show_zacaz($file_include)
{
	global $id, $file, $ispolnitel, $dop_info, $fname, $type_work, $srok, $time, $stranic, $cena,$syst_chek, $ish_unik, $procent_unik,$new_message, $name, $redact;
	$new_message='';
	echo "<div class=anons>
			<a class = admin href='ispolnitel.php?ispolnitel=$ispolnitel'>$ispolnitel</a> <br>
			<h3>$name</h3>
			";
			
			include "$file_include";	
			if ($dop_info!='')
					{
						echo "
							<h3>Примечание</h3>
							<div class = dop_info>$dop_info</div>";	
					}
			
						$result_message = queryMysql("SELECT * FROM comments WHERE id_twit = '$id'");	
			
						$num_message = mysql_num_rows($result_message);	
						if($num_message>0)
						{
							$new_message=$num_message;
						}	
			
}

function viz_function()
{	
	function_show_zacaz('rerait_table.inc');					
}

echo 
	"
		<script>
		  function ajaxRequest()
		  {
			try // Браузер не относится к семейству IE?
			{   // Да
				var request = new XMLHttpRequest()
			}
			catch(e1)
			{
				try // Это IE 6+?
				{   // Да
					request = new ActiveXObject('Msxml2.XMLHTTP')
				}
				catch(e2)
				{
					try // Это IE 5?
					{   // Да
						request = new ActiveXObject('Microsoft.XMLHTTP')
					}
					catch(e3) // Данный браузер не поддерживает AJAX
					{
						request = false
					}
				}
			}
			return request
		  }
		</script>		
		
		<script>
			
			/**
            * Функция Скрывает/Показывает блок 
            * @author ox2.ru дизайн студия
            **/
            function show(element_id) {
                //Если элемент с id-шником element_id существует
                if (document.getElementById(element_id)) { 
                    //Записываем ссылку на элемент в переменную obj
                    var obj = document.getElementById(element_id); 
                    //Если css-свойство display не block, то: 
                    if (obj.style.display != 'block') { 
                        obj.style.display = 'block'; //Показываем элемент
                    }                    
                }
                //Если элемент с id-шником element_id не найден, то выводим сообщение
                else alert('Элемент с id: ' + element_id + ' не найден!'); 
            }
			
			function show_class(element_class,n) {
				elements = document.getElementsByClassName(element_class);
                for (var i=0;i<elements.length;i++)
				{
					if (i!=n)
					{
						elements[i].style.display = 'none';
					}	
				}
                elements[n].style.display = 'block'; 
				
                                        
                }
            function hide_class(element_class,n) {
				elements = document.getElementsByClassName(element_class);
                
                elements[n].style.display = 'none'; 
				
                                        
                }   
			
			function hide(element_id) {
                //Если элемент с id-шником element_id существует
                if (document.getElementById(element_id)) { 
                    //Записываем ссылку на элемент в переменную obj
                    var obj = document.getElementById(element_id); 
                    //Если css-свойство display не block, то: 
                    obj.style.display = 'none'; //Скрываем элемент
                }
                //Если элемент с id-шником element_id не найден, то выводим сообщение
                else alert('Элемент с id: ' + element_id + ' не найден!'); 
            }   
		</script>
	";

function function_message () {
	global $id, $n_twit, $user;
	$i_sobesednik = -1;
	
	echo 
	"
				<div class = 'message_form'>
					<a href='javascript:void(0)' onclick = hide_class('message_form','$n_twit')><div class = close></div></a>
					";	
						
							$result_message = queryMysql("SELECT * FROM comments WHERE id_twit = '$id'");	
							$komy_message = "всем";	
						
						$num_message = mysql_num_rows($result_message);	
						if($num_message>0)
						{	
							
							for ($i_m=0;$i_m<$num_message;$i_m++) 
							{  
							
								$message=mysql_result($result_message,$i_m,'soderjimoe');	
								$data_message=mysql_result($result_message,$i_m,'date');
								$time_message=mysql_result($result_message,$i_m,'time');
								$user_message=mysql_result($result_message,$i_m,'user');
								$komy_message_vivod=mysql_result($result_message,$i_m,'komy');
								
								if ($user_message == $user) 
								{			
									
									echo "<div class = user_comment>
										
										<div class = header_message><div class = 'data_message'>Дата: $data_message $time_message </div> <div class = 'author_message'>Автор сообщения : $user_message </div></div>
										<div class = message>$message </div>
						
										
									</div>";
								}
								else
								{
								$i_sobesednik = $i_sobesednik+1;
								echo "
									<div class = sobesednik_comment>
										
										<div class = header_message><div class = 'data_message'>Дата: $data_message $time_message </div> <div class = 'author_message'>Автор сообщения: $user_message </div></div>
										<div class = message>$message </div>
										
									</div>";
									if ($komy == "$user")
									{	
										echo
										
										" <a href='javascript:void(0)' onclick = show_class('hide',$i_sobesednik)>ответить</a><br>
										<div class = 'hide'>
											<form action='dobavit.php' method='post'>
											<input name='1' type='hidden' value=''>		
											<input name='2' type='hidden' value='$data_message'>		
											<input name='3' type='hidden' value='$time_message'></br>
											<input name='4' type='hidden' value='$user'>
											<input name='5' type='hidden' value='$id'>
											<textarea name='6'></textarea>	 		  
											<input name='7' type='hidden' value='$user_message'>
											
											<input type='hidden' name='table' value='comments'>
											<input type='hidden' name='kolichestvo_par' value='7'>
											</br>
											<input type = 'submit' name = 'dob' value = 'Ответить'>	
											</form>
										</div>	
										";
									}
								}	
							}
						}	
					$data_message=Date("Y-m-d");
					$time_message=Date("H:i:s");
					echo 
					
					"	
							<form action='dobavit.php' method='post'>
							<input name='1' type='hidden' value=''>		
							<input name='2' type='hidden' value='$data_message'>		
							<input name='3' type='hidden' value='$time_message'></br>
							<input name='4' type='hidden' value='$user'>
							<input name='5' type='hidden' value='$id'>
							<textarea name='6'></textarea>	 		  
							<input name='7' type='hidden' value='$komy_message'>							
							<input type='hidden' name='table' value='comments'>
							<input type='hidden' name='kolichestvo_par' value='7'>
							</br>
							<input type = 'submit' name = 'dob' value = 'Добавить'>	
							</form>
							
							
					</div>";
}
	
?>