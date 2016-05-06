<?php 

$hostname = "localhost"; 
$username = "root"; //root 
$password = ""; 
$dbname = 'social_network'; 
$tablname = $tabl_name;//'Spr_Stud'; 
// Створити з'єднання 
$link = mysql_pconnect($hostname,$username,$password); 
if (!$link) 
{echo "Unable to connect to database! <br>"; exit;} 
else 
{ 
// echo "З'єднання з БД-их успішне! <br>"; 
} 

// Вибрати базу даних, якщо нема то створити нову 
$isOk=mysql_select_db($dbname,$link); 
if (!$isOk) 
{ 
echo "Не можу вибрати базу даних $dbname! <br>"; 
exit; 
} 
?>