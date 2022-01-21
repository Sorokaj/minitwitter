<html><head><title>Установка таблиц баз данных</title></head><body>

<h3>Установка...</h3>

<?php 
$data=date('Y-m-d');
include_once 'functions.inc';

createTable('twit', 
            'id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
			author	VARCHAR(32),
			file VARCHAR(4096),			            
			date DATE,	
			time VARCHAR(32),			
			name VARCHAR(4096),						
			text VARCHAR(4096)');		

createTable('comments', 
            'id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,			
			date DATE,
			time VARCHAR(32),
			user VARCHAR(32),
			id_twit INT,
			soderjimoe text,
			komy VARCHAR(32)');					
			
createTable('users',
            'id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
			user VARCHAR(32),
            pass VARCHAR(32),
			email VARCHAR(50) NOT NULL,
			reg_date DATE NOT NULL,
			name_user VARCHAR(32) NOT NULL,
			lastname VARCHAR(32) NOT NULL,			
			role VARCHAR(32)');
			
queryMysql("INSERT INTO users VALUES('NULL','admin', '1', 'mail@yandex.ru', $data, 'Иван', 'Иванов', 'Администратор')");	
?>

<br />...done.
</body></html>
