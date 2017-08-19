<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_condb = "";
$database_condb = "goggybot";
$username_condb = "";
$password_condb = "bd8c31ba";
$condb = mysql_pconnect($hostname_condb, $username_condb, $password_condb) or trigger_error(mysql_error(),E_USER_ERROR); 
mysql_query("SET NAMES UTF8",$condb);	
?>
