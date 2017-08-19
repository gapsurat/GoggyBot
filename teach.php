<?php require_once('Connections/condb.php'); ?>
<?php require_once('Connections/condb.php'); ?>
<?php require_once('Connections/condb.php');
session_start() ?>
<?php
if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  if (PHP_VERSION < 6) {
    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  }

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}
if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form2")) {
 	 $insertSQL = sprintf("INSERT INTO botprogram (botask, botans) VALUES (%s, %s)",
                       GetSQLValueString($_POST['botask'], "text"),
                       GetSQLValueString($_POST['botans'], "text"));	
  mysql_select_db($database_condb, $condb);
  if($Result1 = mysql_query($insertSQL, $condb) ){
	   echo "<script>alert('สอนบอทสำเร็จ');</script>";
	   mysql_query("update user_id set point = point-3 where username = '$id'");
 }else{
	 echo "<script>alert('สอนบอทล้มเหลว');</script>";
 }
  
}

$colname_Recordset1 = "-1";
if (isset($_SESSION['ses_username'])) {
  $colname_Recordset1 = $_SESSION['ses_username'];
}
mysql_select_db($database_condb, $condb);
$query_Recordset1 = sprintf("SELECT * FROM user_id WHERE username = %s", GetSQLValueString($colname_Recordset1, "text"));
$Recordset1 = mysql_query($query_Recordset1, $condb) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);

$colname_Recordset2 = "-1";
if (isset($_SESSION['ses_username'])) {
  $colname_Recordset2 = $_SESSION['ses_username'];
}
mysql_select_db($database_condb, $condb);
$query_Recordset2 = sprintf("SELECT point FROM user_id WHERE username = %s", GetSQLValueString($colname_Recordset2, "text"));
$Recordset2 = mysql_query($query_Recordset2, $condb) or die(mysql_error());
$row_Recordset2 = mysql_fetch_assoc($Recordset2);
$totalRows_Recordset2 = mysql_num_rows($Recordset2);

session_start();
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Unbenanntes Dokument</title>
<link href="./css.css" rel="stylesheet">
<script type="text/javascript">
function MM_goToURL() { //v3.0
  var i, args=MM_goToURL.arguments; document.MM_returnValue = false;
  for (i=0; i<(args.length-1); i+=2) eval(args[i]+".location='"+args[i+1]+"'");
}
</script>
</head>

<body>
<?php include('./nav.php'); ?>
<div style="padding:150px 0;">
<form id="form2" name="form2" class="card" method="POST" action="<?php echo $editFormAction; ?>">
	<h2>สอนบอท</h2>
	<p align="center">คำถาม</p>
    <input class="input" name="botask" type="text" id="botask" />
	<p align="center">คำตอบ</p>
    <input class="input" name="botans" type="text" id="botans" />
	<center>
    <input style="margin-top:30px;" class="btn" type="submit" name="submit" id="submit" value="สอนบอท" />
	</center>
  <input type="hidden" name="MM_insert" value="form2" />
</form>
</div>
<p>&nbsp;</p>
<p>&nbsp;</p>
</body>
</html>
<?php
mysql_free_result($Recordset1);

mysql_free_result($Recordset2);
?>
