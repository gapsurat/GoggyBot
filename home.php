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

$colname_Recordset1 = "-1";
if (isset($_SESSION['ses_username'])) {
  $colname_Recordset1 = $_SESSION['ses_username'];
}
mysql_select_db($database_condb, $condb);
$query_Recordset1 = sprintf("SELECT * FROM user_id WHERE username = %s", GetSQLValueString($colname_Recordset1, "text"));
$Recordset1 = mysql_query($query_Recordset1, $condb) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);

session_start();
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Unbenanntes Dokument</title>
<script type="text/javascript">
function MM_goToURL() { //v3.0
  var i, args=MM_goToURL.arguments; document.MM_returnValue = false;
  for (i=0; i<(args.length-1); i+=2) eval(args[i]+".location='"+args[i+1]+"'");
}
</script>
</head>

<body>
<form id="form3" name="form3" method="post" action="">
  <p>&nbsp;</p>
  <table width="100%" border="0">
    <tr>
      <td width="1%">&nbsp;</td>
      <td width="7%" align="right">Point: </td>
      <td width="25%"><?php echo $row_Recordset1['point']; ?></td>
      <td width="27%" align="left"><?php echo $row_Recordset1['name']; ?></td>
      <td width="13%" align="center"><input name="play" type="button" id="play" onclick="MM_goToURL('parent','home.php');return document.MM_returnValue" value="แชทบอท" /></td>
      <td width="13%" align="center"><input name="score" type="button" id="score" onclick="MM_goToURL('parent','leaderboard.php');return document.MM_returnValue" value="กระดานคะแนน" /></td>
      <td width="14%" align="center"><input name="teach" type="button" id="teach" onclick="MM_goToURL('parent','teach.php');return document.MM_returnValue" value="สอนบอท" /></td>
    </tr>
  </table>
  <p>&nbsp;</p>
</form>
<p>&nbsp;</p>
<form id="form2" name="form2" method="post" action="">
  <table width="700" height="91" border="0" align="center">
    <tr>
      <td align="center"><label for="say"></label>
        <textarea name="say2" cols="115" rows="20" id="say">
        </textarea></td>
    </tr>
  </table>
  <p>&nbsp;</p>
</form>
<p>&nbsp;</p>
<form id="form1" name="form1" method="post" action="">
  &nbsp;
  &nbsp; 
  &nbsp; 
   <table width="1074" border="0" align="center">
    <tr>
      <td width="950" height="30" align="right"><label for="say"></label>
      <input name="say" type="text" id="say" size="119" /></td>
      <td width="114"><input type="submit" name="submit" id="submit" value="ส่งข้อความ" /></td>
    </tr>
  </table>
</form>
<p>&nbsp;</p>
</body>
</html>
<?php
mysql_free_result($Recordset1);
?>
