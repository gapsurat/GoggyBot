<div id="nav" style="margin-bottom:100px;">
	<form id="form3" name="form3" method="post" action="">
		<ul class="navbar">
			<li class="logo">GoggyBot</li>
			<li class="nav-info" style="padding: 0.5em 1em;"><?php echo $row_Recordset1['name']; ?></li>
			<li class="nav-info" style="padding: 0.5em 1em;">Point: <?php echo $row_Recordset1['point']; ?></li>
			<li><input class="nav-btn" name="play" type="button" id="play" onclick="MM_goToURL('parent','home.php');return document.MM_returnValue" value="แชทบอท" /></li>
			<li><input class="nav-btn" name="score" type="button" id="score" onclick="MM_goToURL('parent','leaderboard.php');return document.MM_returnValue" value="กระดานคะแนน" /></li>
			<li><input class="nav-btn" name="teach" type="button" id="teach" onclick="MM_goToURL('parent','teach.php');return document.MM_returnValue" value="สอนบอท" /></li>
			<li><input class="nav-btn" name="teach" type="button" id="teach" onclick="MM_goToURL('parent','logout.php');return document.MM_returnValue" value="ออกจากระบบ" /></li>
		</ul>
	</form>
</div>	