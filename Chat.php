<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Unbenanntes Dokument</title>
<link href="./css.css" rel="stylesheet">
<style>
  #chatbox{
    overflow-x: hidden;
    overflow-y: scroll;
    height: 350px;
  }
</style>
<script type="text/javascript">
function MM_goToURL() { //v3.0
  var i, args=MM_goToURL.arguments; document.MM_returnValue = false;
  for (i=0; i<(args.length-1); i+=2) eval(args[i]+".location='"+args[i+1]+"'");
}
</script>
</head>
<body>
<?php include('./nav.php'); ?>
<div style="padding-top:100px;">
  <div id="chatbox" class="card">
      <?php for($i=0;$i<50;$i++){
      echo '<p align="left">User:text goes here</p>
      <p align="right">bot:text goes here</p>';
      } ?>
  </div>

  <div class="card" style="margin-top:2em !important;height: 60px;">
    <form id="botans" name="botans" method="post" action="" style="">
        <input class="input" name="botans" type="text" id="botans" style="height:50px;float:left;width:70%;" /><br />
        <input type="submit" name="submit" id="submit" class="btn" value="ส่งข้อความ" style="float:right;width:20%;margin:0 !important;" />
    </form>
  </div>
</div>
</body>
</html>
