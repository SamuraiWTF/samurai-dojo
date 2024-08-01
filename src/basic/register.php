<div class="page-title"><h2>Create an account</h2></div>
<?php
echo "<form method=\"POST\" action=\"" .$_SERVER['SCRIPT_NAME'] . "?" . $_SERVER['QUERY_STRING'] . "\">";
// Grab inputs
$username = isset($_REQUEST["user_name"]) ? $_REQUEST["user_name"] : "";
$password = isset($_REQUEST["password"]) ? $_REQUEST["password"] : "";
$passwordconfirm = isset($_REQUEST["password_confirm"]) ? $_REQUEST["password_confirm"] : "";
$first_name = isset($_REQUEST["first_name"]) ? $_REQUEST["first_name"] : "";
$last_name = isset($_REQUEST["last_name"]) ? $_REQUEST["last_name"] : "";
$department = isset($_REQUEST["department"]) ? $_REQUEST["department"] : "";
$mysignature = isset($_REQUEST["my_signature"]) ? $_REQUEST["my_signature"] : "";

if ($username  =="") {?>
	<p>Please register by entering all fields:</p>
<table style="width: 100%; max-width: 500px;">
        <tr>
            <td style="width: 50%;"><label for="first_name">First Name:</label></td>
            <td style="width: 50%;"><label for="last_name">Last Name:</label></td>
        </tr>
        <tr>
            <td><input type="text" id="first_name" name="first_name" style="width: 95%;" required></td>
            <td><input type="text" id="last_name" name="last_name" style="width: 95%;" required></td>
        </tr>
        <tr>
            <td colspan="2"><label for="user_name">Username:</label></td>
        </tr>
        <tr>
            <td colspan="2"><input type="text" id="user_name" name="user_name" style="width: 97%;" required></td>
        </tr>
        <tr>
            <td><label for="password">Password:</label></td>
            <td><label for="password_confirm">Confirm Password:</label></td>
        </tr>
        <tr>
            <td><input type="password" id="password" name="password" style="width: 95%;" required></td>
            <td><input type="password" id="password_confirm" name="password_confirm" style="width: 95%;" required></td>
        </tr>
        <tr>
            <td colspan="2"><label for="department">Department:</label></td>
        </tr>
        <tr>
            <td colspan="2">
                <select id="department" name="department" style="width: 97%; height: 35px;" required>
                    <option value="">Select Department</option>
                    <option value="Engineering">Engineering</option>
                    <option value="Sales">Sales</option>
                    <option value="Training">Training</option>
                    <option value="Marketing">Marketing</option>
                </select>
            </td>
        </tr>
        <tr>
            <td colspan="2"><label for="my_signature">Signature:</label></td>
        </tr>
        <tr>
            <td colspan="2"><textarea id="my_signature" name="my_signature" rows="3" style="width: 97%;"></textarea></td>
        </tr>
        <tr>
            <td colspan="2"><input type="submit" value="Submit" style="margin-top: 10px;"></td>
        </tr>
    </table>
</form>
<script>
document.addEventListener('DOMContentLoaded', function() {
    const firstNameInput = document.getElementById('first_name');
    const lastNameInput = document.getElementById('last_name');
    const usernameInput = document.getElementById('user_name');

    function updateUsername() {
        const firstName = firstNameInput.value.trim();
        const lastName = lastNameInput.value.trim();
        if (firstName && lastName) {
            usernameInput.value = (firstName.charAt(0) + lastName).toLowerCase();
        }
    }

    firstNameInput.addEventListener('input', updateUsername);
    lastNameInput.addEventListener('input', updateUsername);
});
</script>
<?php } ?>	
<?php
if ($username <>"") {
	if ($password == $passwordconfirm ) {
		$query = "INSERT INTO accounts (username, password, first_name, last_name, department, hire_date, mysignature) VALUES
                    ('" . db_escape_string($conn, $username) . "',
                     '" . db_escape_string($conn, $password) . "',
                     '" . db_escape_string($conn, $first_name) . "',
                     '" . db_escape_string($conn, $last_name) . "',
                     '" . $department . "',
                     " . db_now() . ",
                     '" . $mysignature . "')";
		$result = db_query($conn, $query);
		echo mysqli_error($conn);
		echo "Account Made";
		} else {
		echo '<h1><font color="#ff0000">Passwords do not match</font></h1>';
		}
}
//phpinfo();
?>
<?php
// Begin hints section
if ($_COOKIE["showhints"]==1) {
	echo '<p><span style="background-color: #FFFF00">
	<b>For XSS:</b>XSS is easy stuff. This one shows off stored XSS (someone can
	run across it later in another app that uses the same database). Check out
	the "User Info" page for the results of this stored XSS.
	"&lt;script&gt;alert("XSS");&lt;/script&gt;" is the classic XSS demo, but 
	there are far more interesting things you could do which I plan show in a
	video later. Also, check out 
	<a href="http://ha.ckers.org/xss.html">Rsnake\'s XSS Cheat Cheat</a>
	for more ways you can encode XSS attacks that may allow you to get around 
	some filters.
	<br><br>
	<b>For SQL Injection:</b> Check all the fields. Some may not be vulnerable
	but perhaps controls for some others were missed.
	</span>'; 
}
// End hints section
?>
