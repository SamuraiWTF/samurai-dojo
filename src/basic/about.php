<title>Samurai Dojo-Basic About Page</title>
<p align="center"><b>A Deliberately Vulnerable PHP Application
Implementing the OWASP Top 10</b></p>

<br>

<p>The Samurai Dojo-Basic application implements the
<a href="http://www.owasp.org/index.php/OWASP_Top_Ten_Project">OWASP Top 10</a> 
in PHP, and do it in such a way that it is easy to demonstrate common attacks to 
others. Many web app hobbyists and professionals used PHP, and 
it's pretty easy to pick up the basics of the language. The Dojo-Basic webpage 
is a set of relatively simple PHP scripts meant to illustrate the core concepts of the
<a href="http://www.owasp.org/index.php/OWASP_Top_Ten_Project">OWASP Top 10</a> 
vulnerabilities list. The primary purpose of this project is to demonstrate these
vulnerabilities for the sake of teaching core pentesting and secure coding concepts.</p>

<p>&nbsp;&nbsp;&nbsp; Here are the core goals of the Samurai Dojo-Basic project:</p>

<p>1. Make the code and examples simple to understand so as to get the point across of 
how a given vulnerability works. </p>

<p>2. Be geared in such a way that it's easy to update with new modules and 
hints.</p>

<p>3. Easy to install and run. Just run <i>vagrant up</i>.  This will create virtual machine that shares a drive with the host machine. When you are done, set up your hosts file as listed in the README.  Then connect to the web interface and reset the database. (You can also just use SamuraiWTF.)</p>

<p>Go to the <a href="http://www.owasp.org/index.php/OWASP_Top_Ten_Project">
OWASP Top 10</a> page to read about a vulnerability, then choose a vulnerable page from 
the <a htref="?page=vuln-list.php">Vuln List</a> link in the "Pentester Help" menu
on the left. Try to discover and exploit the vulnerability. You can also try playing
with the code and fix the vulnerabilities.  It can be very educational. Most of the 
scripts are vulnerable to more than just one of the OWASP Top 10, as you will see in 
the <a htref="?page=vuln-list.php">Vuln List</a> page.</p>

<p>It should go without saying that <u> <font color="#FF0000">you should NOT&nbsp; 
run this code on a production network</font></u>. Either run it on a 
private network, or restrict your web server software to only use the local 
loopback address.</p>
