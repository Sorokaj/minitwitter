<?php
include_once "header.inc";
if ($loggedin){	
    
	if (isset($_POST['table'])) $table = $_POST['table']; 
	else $table = "";
	if (isset($_POST['kolichestvo_par'])) $kolichestvo_par = $_POST['kolichestvo_par']; 
	else $kolichestvo_par = "";	
	$znach="";
	for ($i=1;$i<=$kolichestvo_par;$i++)
	{
		if (isset($_POST["$i"])) $a[$i] = $_POST["$i"]; 
		else $a[$i] = "";		
		if ($i<$kolichestvo_par) 
		{
				$znach.="'$a[$i]', ";					
		}
		else 
		{				
				$znach.="'$a[$i]'";	
		}
	}
echo "INSERT INTO $table VALUES($znach)";
queryMysql("INSERT INTO $table VALUES($znach)");
echo "
      
      <div class=body>
	  Записи успешно добавлены
";
if (isset($_POST['mail'])) 
	{
	
		if ($a[2]=="Выбрать автора")
		{
			$result_email = queryMysql("SELECT email FROM users  WHERE role='Автор'");			
			$num_email = mysql_num_rows($result_email);	/*количество авторов*/ 	
			for ($i=0;$i<$num_email;$i++)
				   {
					   $from_address = "From: plagiatynet.ru@yandex.ru\n";
					   $email=mysql_result($result_email,$i);
						mail ("$email", "В системе появились новые заказы", "http://plagiatynet.ru/rerait/", $from_address);
				   }		   	   
		}
		else
		
		{
			$result_email = queryMysql("SELECT email FROM users  WHERE role='Автор' AND user='$a[2]'");
			$from_address = "From: plagiatynet.ru@yandex.ru\n";
					   $email=mysql_result($result_email,0);					   
						mail ("$email", "В системе появились новые заказы", "http://plagiatynet.ru/rerait/", $from_address);
		}	
		$result_message = queryMysql("SELECT ispolnitel FROM zakaz WHERE id = '$a[5]'");
		$ispolnitel_zakaza=mysql_result($result_message,0);
		if ($a[7]=="всем" AND $ispolnitel_zakaza=="Выбрать автора")
		{
			$result_email = queryMysql("SELECT email FROM users  WHERE role='Автор'");			
			$num_email = mysql_num_rows($result_email);	/*количество авторов*/ 	
			for ($i=0;$i<$num_email;$i++)
				   {
					   $from_address = "From: plagiatynet.ru@yandex.ru\n";
					   $email=mysql_result($result_email,$i);
						mail ("$email", "Новое сообщение по заказу $a[5]", "http://plagiatynet.ru/rerait/", $from_address);
				   }		   	   
		}
		else
		
		{
			$result_email = queryMysql("SELECT email FROM users  WHERE role='Автор' AND user='$ispolnitel_zakaza'");
			$from_address = "From: plagiatynet.ru@yandex.ru\n";
					   $email=mysql_result($result_email,0);					   
						mail ("$email", "Новое сообщение по заказу $a[5]", "http://plagiatynet.ru/rerait/", $from_address);
		}				
	}
}
echo "</div>";
include_once "footer.inc";
if (isset($_POST['obr_addr']))  
{
	$obr_addr=$_POST["obr_addr"];
	echo "<script>window.location.href = '$obr_addr';</script>";
}
else echo "<script>history.go(-1)</script>";