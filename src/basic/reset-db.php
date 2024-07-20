<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">
<html>
<head>
<link rel="shortcut icon" href="favicon.ico" type="image/x-icon" /> 
</head>
<body>
Setting up the DBs.

<?php
include 'config.inc';

echo("<br>Dropping database...");
$conn = new mysqli($dbhost, $dbuser, $dbpass) or die('Error connecting to mysql');
$conn->query("DROP DATABASE IF EXISTS $dbname");
echo mysqli_error($conn);

echo("<br>Creating database...");
$conn->query("CREATE DATABASE $dbname");
echo mysqli_error($conn);

echo("<br>Creating blogs table...");
include 'opendb.inc';
$query = 'CREATE TABLE blogs_table( '.
		 'cid INT NOT NULL AUTO_INCREMENT, '.
         'blogger_name TEXT, '.
         'comment TEXT, '.
		 'date DATETIME, '.
		 'PRIMARY KEY(cid))';	
$result = $conn->query($query);
echo mysqli_error($conn );

echo("<br>Creating accounts table...");
$query = 'CREATE TABLE accounts( '.
         'cid INT NOT NULL AUTO_INCREMENT, '.
         'username TEXT, '.
         'password TEXT, '.
         'mysignature TEXT, '.
         'first_name TEXT, '.
         'last_name TEXT, '.
         'department TEXT, '.
         'hire_date DATE, '.
         'PRIMARY KEY(cid))';
$result = $conn->query($query);
echo mysqli_error($conn );

echo("<br>Creating hitlog table...");
$query = 'CREATE TABLE hitlog( '.
		 'cid INT NOT NULL AUTO_INCREMENT, '.
         'hostname TEXT, '.
         'ip TEXT, '.
		 'browser TEXT, '.
		 'referer TEXT, '.
		 'date DATETIME, '.
		 'PRIMARY KEY(cid))';		 
$result = $conn->query($query);
echo mysqli_error($conn );

echo("<br>Populating accounts table...");
$query = "INSERT INTO accounts (username, password, mysignature, first_name, last_name, department, hire_date) VALUES
    ('admin', 'Flynn', 'Monkey!!!', 'Admin', 'User', 'IT', '2018-01-01'),
    ('adrian', 'somepassword', 'Ironclad security is my specialty!', 'Adrian', 'Steelforge', 'Marketing', '2019-05-20'),
    ('john', 'monkey', 'Defending the cyber hills since 2010', 'John', 'Peaks', 'Sales', '2020-03-15'),
    ('ed', 'pentest', 'SANStastic adventures in security!', 'Ed', 'Scriptorium', 'Training', '2021-07-01'),
    ('justin', 'hawk', 'Soaring through ICS security', 'Justin', 'Falconer', 'Training', '2022-02-14'),
    ('micwg', 'cim', 'Maple-flavored client-side security, eh?', 'Mic', 'Northguard', 'Engineering', '2019-11-30'),
    ('jasong', 'pentest', 'Extending security one suite at a time', 'Jason', 'Ideasmith', 'Engineering', '2020-09-22'),
    ('kevin', 'force42', 'May the security be with you, always', 'Kevin', 'Skyguard', 'Management', '2015-05-04')";
//echo $query;
$result = $conn->query($query);
echo mysqli_error($conn );

echo("<br>Populating blogs table...");
$query ="INSERT INTO `blogs_table` (`cid`, `blogger_name`, `comment`, `date`) VALUES
    (1, 'adrian', 'Well, I''ve been working on this for a bit. Welcome to my crappy blog software. :)', '2009-03-01 22:26:12'),
    (2, 'adrian', 'Looks like I got a lot more work to do. Fun, Fun, Fun!!!', '2009-03-01 22:26:54'),
    (3, 'anonymous', 'An anonymous blog? Huh? ', '2009-03-01 22:27:11'),
    (4, 'ed', 'I love me some Netcat!!!', '2009-03-01 22:27:48'),
    (5, 'john', 'Listen to Pauldotcom!', '2009-03-01 22:29:04'),
    (6, 'john', 'Why give users the ability to get to the unfiltered Internet? It''s just asking for trouble. ', '2009-03-01 22:29:49'),
    (7, 'john', 'Chocolate is GOOD!!!', '2009-03-01 22:30:06'),
    (8, 'admin', 'Fear me, for I am ROOT!', '2009-03-01 22:31:13'),
    (9, 'ed', 'Hack the planet!', '2024-07-19 10:15:00'),
    (10, 'justin', 'Remember: it''s not a bug, it''s an undocumented feature.', '2024-07-19 11:30:00'),
    (11, 'micwg', 'Just spent 3 hours debugging. It was DNS. It''s always DNS!', '2024-07-19 14:45:00'),
    (12, 'jasong', 'Did you hear about the Olympic size swimming pool on the roof?', '2024-07-19 16:20:00'),
    (13, 'adrian', 'I''m not arguing, I''m just explaining why I''m right.', '2024-07-19 18:00:00'),
    (14, 'john', 'There are 10 types of people in this world: those who understand binary and those who don''t.', '2024-07-19 20:30:00'),
    (15, 'micwg', 'I''m not antisocial, I just like my space... 127.0.0.1 is where the heart is.', '2024-07-20 09:15:00'),
    (16, 'justin', 'Keep calm and sudo on!', '2024-07-20 11:45:00'),
    (17, 'ed', 'I don''t always test my code, but when I do, I do it in production.', '2024-07-20 14:00:00'),
    (18, 'jasong', 'Life is short, use Python.', '2024-07-20 16:30:00'),
    (19, 'kevin', 'Just found a way to bypass the firewall. Don''t tell the admin!', '2024-07-21 09:15:00'),
    (20, 'kevin', 'Pro tip: \"P@ssw0rd\" is not a strong password, no matter how many times you use it.', '2024-07-21 11:30:00'),
    (21, 'kevin', 'Today''s goal: Stay away from the cookie jar. And by cookie jar, I mean other people''s session cookies.', '2024-07-21 14:45:00'),
    (22, 'kevin', 'Remember, kids: SQL injection is like adding hot sauce. A little goes a long way, but too much and you''ll regret it.', '2024-07-22 10:00:00'),
    (23, 'kevin', 'Breaking news: I found a security flaw in our coffee machine. It''s now brewing espresso for everyone. You''re welcome.', '2024-07-22 16:45:00')";
//echo $query;
$result = $conn->query($query);
echo mysqli_error($conn );


echo "<p>If you see no errors above, it should be done. <a href=\"index.php\">Continue back to the frontpage.</a>";
?>
</body>
</html>
