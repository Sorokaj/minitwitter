<?php // Example 21-7: login.php
include_once 'header.inc';
$error = $user = $pass = $role = "";

if (isset($_POST['user']))
{
    $user = sanitizeString($_POST['user']);
    $pass = sanitizeString($_POST['pass']);
    
    if ($user == "" || $pass == "")
    {
        $error = "Не все поля заполнены<br />";
    }
    else
    {
		$result = queryMysql("SELECT user,pass,role,id FROM users WHERE user='$user' AND pass='$pass'");		
		$num = mysql_num_rows($result);		
        if ($num == 0)        
        {
            $error = "<span class='error'>Неверный логин или пароль </span><br /><br />";
        }
        else
        {
			$role=mysql_result($result,0,'role');							
			$id=mysql_result($result,0,'id');							
            $_SESSION['user'] = $user;
            $_SESSION['pass'] = $pass;
			$_SESSION['role'] = $role;
			$_SESSION['id'] = $id;            
		echo("<script>location.href='index.php'</script>");
            die();
        }
    }
}


include_once "footer.inc";
?>


