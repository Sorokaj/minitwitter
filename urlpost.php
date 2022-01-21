<?php // urlpost.php
  include_once 'header.inc';
  if (isset($_POST['user']))
  {
    $user   = sanitizeString($_POST['user']);
    $result = queryMysql("SELECT * FROM users WHERE user='$user'");
    $num_rows = mysql_num_rows($result);
    if ($num_rows>0)
      echo  "<span class='taken'>&nbsp;&#x2718; " .
            "Логин занят</span>";
    else
      echo "<span class='available'>&nbsp;&#x2714; " .
           "Логин $user свободен</span>";
  }
?>