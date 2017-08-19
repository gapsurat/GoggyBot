<?php require_once('Connections/condb.php'); ?>
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

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) {
	
  $insertSQL = sprintf("INSERT INTO user_id (username, password, name) VALUES (%s, %s, %s)",
                       GetSQLValueString($_POST['username'], "text"),
                       GetSQLValueString($_POST['password'], "text"),
                       GetSQLValueString($_POST['name'], "text"));

  mysql_select_db($database_condb, $condb);
 if( $Result1 = mysql_query($insertSQL, $condb)){
	 echo "<script>alert('สมัครสมาชิกสำเร็จ');</script>";
	 header("location:index.php");
 }else{
	 echo "<script>alert('สมัครสมาชิกล้มเหลว');</script>";
	 header("location:index.php");
 }
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
<link rel="stylesheet" href="css.css" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>สมัครสมาชิก</title>
</head>

<body>
<div id="header">
  <h1>สมัครสมาชิก</h1></div>
<div id="form" class="card">
	<form action="<?php echo $editFormAction; ?>" id="form1" name="form1" method="POST">
		<p style="margin-left:2rem;">ชื่อผู้ใช้</p>
		<input class="input" name="username" type="text" id="username6" size="20"  required="required" placeholder="ชื่อผู้ใช้"/>
		<p style="margin-left:2rem;">รหัสผ่าน</p>
		<input class="input" name="password" type="password" id="password" size="20" required="required" placeholder="รหัสผ่าน"/>
		<p style="margin-left:2rem;">ชื่อเล่น</p>
	    <input class="input" name="name" type="text" id="username" size="20"  required="required" placeholder="ชื่อเล่น"/>
	    <br>
	    <input class="btn" type="submit" name="login" id="login" value="สมัครสมาชิก" />
	  <input type="hidden" name="MM_insert" value="form1" />
	</form>
</div>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
</body>
</html>
