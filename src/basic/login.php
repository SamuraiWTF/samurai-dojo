<center><h2><b>Login</b></h2></center><p>
If you do not have an account, <a href="?page=register.php">Register</a><p>
<?php
if ($failedloginflag==1) {
	echo '<h1><font color="#ff0000">Bad user name or password!</font></h1>';
}

$tag = isset($_GET['tag']) ? $_GET['tag'] : 'basic';
$query_string = $_SERVER['QUERY_STRING'];
$action_tag = $tag;
if (preg_match('/\b\w+\b/', $tag, $matches)) {
    $action_tag = $matches[0];
}
$action_url = $_SERVER['SCRIPT_NAME'] . "?" . $query_string . "&tag=" . $action_tag;

?>
<form method="POST" action="<?php echo $action_url; ?>">
    <input type="hidden" name="tag" value="<?php echo htmlspecialchars_decode($tag, ENT_IGNORE); ?>" />
	<p>Enter your username and password:</p>
	<p>Name:<br><input type="text" name="user_name" size="20"></p>
	<p>Password:<br><input type="password" name="password" size="20"></p>
	<p><input type="submit" value="Submit" name="Submit_button"></p>
</form>
<?php
//  The real login happens at the head of header.php, the stuff below is mostly filler.
?>
<?php
// Begin hints section
if ($_COOKIE["showhints"]==1) {
	echo '<p><span style="background-color: #FFFF00">
	<b>For SSL Injection:</b>The old "\' or 1=1 -- " is a classic, but there are others. Check out who 
	you are logged in as after you do the injection. 
	<br><br>
	<b>For Session and Authentication:</b>As for playing with sessions, try a 
	<a href="https://addons.mozilla.org/en-US/firefox/addon/4510">cookie editor</a> 
	to change your UID.
	<br><br>
	<b>For Insecure Authentication:</b>Try sniffing the traffic with Wireshark, Cain, Dsniff or Ettercap.	
	</span>'; 
}
// End hints section
?>

