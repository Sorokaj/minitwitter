<?php
include_once "header.inc";

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
$result = queryMysql("SELECT * FROM users WHERE user='$a[2]'");
    $num_rows = mysql_num_rows($result);
    if ($num_rows>0)
{
   echo "Логин занят";
}
else
{
queryMysql("INSERT INTO $table VALUES($znach)");
echo "
      
      <div class=body>
	  Записи успешно добавлены
";

echo "</div>";
include_once "footer.inc";
echo "<a href=index.php>Вернуться на главную</a>";}