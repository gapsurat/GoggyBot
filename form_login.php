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
?>
<?php
// *** Validate request to login to this site.
if (!isset($_SESSION)) {
  session_start();
}

$loginFormAction = $_SERVER['PHP_SELF'];
if (isset($_GET['accesscheck'])) {
  $_SESSION['PrevUrl'] = $_GET['accesscheck'];
}

if (isset($_POST['username'])) {
  $loginUsername=$_POST['username'];
  $password=$_POST['password'];
  $MM_fldUserAuthorization = "";
  $MM_redirectLoginSuccess = "home.php";
  $MM_redirectLoginFailed = "form_login.php";
  $MM_redirecttoReferrer = false;
  mysql_select_db($database_condb, $condb);
  
  $LoginRS__query=sprintf("SELECT username, password FROM user_id WHERE username=%s AND password=%s",
    GetSQLValueString($loginUsername, "text"), GetSQLValueString($password, "text")); 
   
  $LoginRS = mysql_query($LoginRS__query, $condb) or die(mysql_error());
  $loginFoundUser = mysql_num_rows($LoginRS);
  if ($loginFoundUser) {
     $loginStrGroup = "";
    
	if (PHP_VERSION >= 5.1) {session_regenerate_id(true);} else {session_regenerate_id();}
    //declare two session variables and assign them
    $_SESSION['MM_Username'] = $loginUsername;
    $_SESSION['MM_UserGroup'] = $loginStrGroup;	      

    if (isset($_SESSION['PrevUrl']) && false) {
      $MM_redirectLoginSuccess = $_SESSION['PrevUrl'];	
    }
    header("Location: " . $MM_redirectLoginSuccess );
  }
  else {
    header("Location: ". $MM_redirectLoginFailed );
  }
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
<style type="text/css">
body {
	background-color: #F4F4F4;
}
</style>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>form_login</title>
</head>

<body>
<form id="form1" name="form1" method="POST" action="<?php echo $loginFormAction; ?>">
  <table width="700" border="0" align="center">
    <tr>
      <td bgcolor="#CCCCCC"><table width="700" border="0" align="center">
        <tr>
          <td colspan="2" align="center" valign="middle" bgcolor="#999999"><p>เข้าสู่ระบบ</p></td>
        </tr>
        <tr>
          <td align="right" bgcolor="#CCCCCC">&nbsp;</td>
          <td bgcolor="#CCCCCC">&nbsp;</td>
        </tr>
        <tr>
          <td width="165" align="right" bgcolor="#CCCCCC">ชื่อผู้ใช้งาน</td>
          <td width="525" bgcolor="#CCCCCC"><label for="username6"></label>
            <input name="username" type="text" id="username6" size="20"  required="required" placeholder="โปรดระบุ"/></td>
        </tr>
        <tr>
          <td bgcolor="#CCCCCC">&nbsp;</td>
          <td bgcolor="#CCCCCC">&nbsp;</td>
        </tr>
        <tr>
          <td align="right" bgcolor="#CCCCCC">พาสเวิร์ด</td>
          <td bgcolor="#CCCCCC"><label for="password"></label>
            <input name="password" type="password" id="password" size="20" required="required" placeholder="โปรดระบุ"/></td>
        </tr>
        <tr>
          <td bgcolor="#CCCCCC">&nbsp;</td>
          <td bgcolor="#CCCCCC">&nbsp;</td>
        </tr>
        <tr>
          <td align="right" bgcolor="#CCCCCC">&nbsp;</td>
          <td bgcolor="#CCCCCC">&nbsp;</td>
        </tr>
        <tr>
          <td align="right" bgcolor="#CCCCCC">&nbsp;</td>
          <td bgcolor="#CCCCCC"><input type="submit" name="login" id="login" value="เข้าสู่ระบบ" /></td>
        </tr>
      </table></td>
    </tr>
  </table>
</form>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
</body>
</html>