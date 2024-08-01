<div class="page-title"><h2>Hacker text files of old</h2></div>

TTake the time to read some of these great old school hacker text files. Just choose one form the list and submit.

<?php
echo "<form method=\"POST\" action=\"" .$_SERVER['SCRIPT_NAME'] . "?" . $_SERVER['QUERY_STRING'] . "\">";
?>
	<p><select size="1" name="text_file_name">
	<option value="http://dojo-basic.wtf/readingroom/atms">An Overview of ATMs and Information on the Encoding System
	</option>
	<option selected value="http://dojo-basic.wtf/readingroom/auditool.txt">Intrusion Detection in Computers by Victor H. Marshall (January 29, 1991)
	</option>
	<option value="http://dojo-basic.wtf/readingroom/backdoor.txt">How to Hold Onto UNIX Root Once You Have It
	</option>
	<option value="http://dojo-basic.wtf/readingroom/hack1.hac">The Basics of Hacking, by the Knights of Shadow (Intro)
	</option>
	<option value="http://dojo-basic.wtf/readingroom/hacking101.hac">HACKING 101 - By Johnny Rotten - Course #1 - Hacking, Telenet, Life
	</option>
	</select></p>
	<p><input type="submit" value="Submit" name="B1"></p>
</form>
<pre>
<?php
// Grab inputs
$textfilename=$_REQUEST["text_file_name"];

if ($textfilename != "") {
    // echo "Attempting to open file: $textfilename<br>";

    // Check if it's a full URL or just a filename
    if (strpos($textfilename, 'http://') !== 0 && strpos($textfilename, 'https://') !== 0) {
        $textfilename = "http://" . $_SERVER['HTTP_HOST'] . "/readingroom/" . $textfilename;
    }

    // echo "Full URL: $textfilename<br>";

    // Use cURL to fetch the content
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $textfilename);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
    curl_setopt($ch, CURLOPT_TIMEOUT, 5); // 5 seconds timeout

    $content = curl_exec($ch);

    if ($content !== false) {
        echo "<pre>" . htmlspecialchars($content) . "</pre>";
    } else {
        echo "Failed to load the file. Error: " . curl_error($ch) . "<br>";
        echo "Error number: " . curl_errno($ch) . "<br>";

        // Additional debugging information
        echo "Server IP: " . $_SERVER['SERVER_ADDR'] . "<br>";
        echo "Server Name: " . $_SERVER['SERVER_NAME'] . "<br>";
        echo "HTTP Host: " . $_SERVER['HTTP_HOST'] . "<br>";
    }

    curl_close($ch);
} else {
    echo "No filename provided.<br>";
}
?>
</pre>
For other great old school hacking texts, check out <a href="http://www.textfiles.com/">http://www.textfiles.com/</a>.<p>
<?php
// Begin hints section
if ($_COOKIE["showhints"]==1) {
	echo '<p><span style="background-color: #FFFF00">
	<b>For Malicious File Execution/Insecure Direct Object Reference:</b>
	Hum, looks like I\'m grabbing files from another site. Could we use this as 
	a proxy? Tip: Try the Tamper Data FireFox plugin or maybe Paros Proxy.
	</span>'; 
}
// End hints section
?>
