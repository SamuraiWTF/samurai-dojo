<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">
<html>
<head>
<link rel="shortcut icon" href="favicon.ico" type="image/x-icon" /> 
</head>
<body>
Setting up the DBs.

<?php
include 'config.inc';

// Function to execute queries and handle errors for both MySQL and SQLite
function execute_query($conn, $query) {
    if ($GLOBALS['db_type'] === 'mysql') {
        $result = $conn->query($query);
        echo mysqli_error($conn);
    } else {
        $result = $conn->exec($query);
        echo $conn->lastErrorMsg();
    }
    return $result;
}

if ($db_type === 'mysql') {
    echo("<br>Connecting to MySQL...");
    $conn = new mysqli($dbhost, $dbuser, $dbpass) or die('Error connecting to mysql');

    echo("<br>Dropping database...");
    execute_query($conn, "DROP DATABASE IF EXISTS $dbname");

    echo("<br>Creating database...");
    execute_query($conn, "CREATE DATABASE $dbname");

    $conn->select_db($dbname);
} else {
    echo("<br>Setting up SQLite...");

        $db_file = '/var/www/html/db/' . $dbname . '.sqlite';

        // Delete the existing database file if it exists
        if (file_exists($db_file)) {
            echo("<br>Removing existing SQLite database...");
            unlink($db_file);
        }

        echo("<br>Creating new SQLite database...");
        $conn = new SQLite3($db_file);
}

echo("<br>Creating blogs table...");
$query = 'CREATE TABLE blogs_table( '.
         'cid INTEGER PRIMARY KEY ' . ($db_type === 'mysql' ? 'AUTO_INCREMENT' : 'AUTOINCREMENT') . ', '.
         'blogger_name TEXT, '.
         'comment TEXT, '.
         'date DATETIME)';
execute_query($conn, $query);

echo("<br>Creating accounts table...");
$query = 'CREATE TABLE accounts( '.
         'cid INTEGER PRIMARY KEY ' . ($db_type === 'mysql' ? 'AUTO_INCREMENT' : 'AUTOINCREMENT') . ', '.
         'username TEXT, '.
         'password TEXT, '.
         'mysignature TEXT, '.
         'first_name TEXT, '.
         'last_name TEXT, '.
         'department TEXT, '.
         'hire_date DATE)';
execute_query($conn, $query);

echo("<br>Creating hitlog table...");
$query = 'CREATE TABLE hitlog( '.
         'cid INTEGER PRIMARY KEY ' . ($db_type === 'mysql' ? 'AUTO_INCREMENT' : 'AUTOINCREMENT') . ', '.
         'hostname TEXT, '.
         'ip TEXT, '.
         'browser TEXT, '.
         'referer TEXT, '.
         'date DATETIME)';
execute_query($conn, $query);

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
execute_query($conn, $query);

echo("<br>Populating blogs table...");
$query ="INSERT INTO `blogs_table` (`blogger_name`, `comment`, `date`) VALUES
    ('adrian', 'Well, I''ve been working on this for a bit. Welcome to my crappy blog software. :)', '2009-03-01 22:26:12'),
    ('adrian', 'Looks like I got a lot more work to do. Fun, Fun, Fun!!!', '2009-03-01 22:26:54'),
    ('anonymous', 'An anonymous blog? Huh? ', '2009-03-01 22:27:11'),
    ('ed', 'I love me some Netcat!!!', '2009-03-01 22:27:48'),
    ('john', 'Listen to Pauldotcom!', '2009-03-01 22:29:04'),
    ('john', 'Why give users the ability to get to the unfiltered Internet? It''s just asking for trouble. ', '2009-03-01 22:29:49'),
    ('john', 'Chocolate is GOOD!!!', '2009-03-01 22:30:06'),
    ('admin', 'Fear me, for I am ROOT!', '2009-03-01 22:31:13'),
    ('ed', 'Hack the planet!', '2024-07-19 10:15:00'),
    ('justin', 'Remember: it''s not a bug, it''s an undocumented feature.', '2024-07-19 11:30:00'),
    ('micwg', 'Just spent 3 hours debugging. It was DNS. It''s always DNS!', '2024-07-19 14:45:00'),
    ('jasong', 'Did you hear about the Olympic size swimming pool on the roof?', '2024-07-19 16:20:00'),
    ('adrian', 'I''m not arguing, I''m just explaining why I''m right.', '2024-07-19 18:00:00'),
    ('john', 'There are 10 types of people in this world: those who understand binary and those who don''t.', '2024-07-19 20:30:00'),
    ('micwg', 'I''m not antisocial, I just like my space... 127.0.0.1 is where the heart is.', '2024-07-20 09:15:00'),
    ('justin', 'Keep calm and sudo on!', '2024-07-20 11:45:00'),
    ('ed', 'I don''t always test my code, but when I do, I do it in production.', '2024-07-20 14:00:00'),
    ('jasong', 'Life is short, use Python.', '2024-07-20 16:30:00'),
    ('kevin', 'Just found a way to bypass the firewall. Don''t tell the admin!', '2024-07-21 09:15:00'),
    ('kevin', 'Pro tip: \"P@ssw0rd\" is not a strong password, no matter how many times you use it.', '2024-07-21 11:30:00'),
    ('kevin', 'Today''s goal: Stay away from the cookie jar. And by cookie jar, I mean other people''s session cookies.', '2024-07-21 14:45:00'),
    ('kevin', 'Remember, kids: SQL injection is like adding hot sauce. A little goes a long way, but too much and you''ll regret it.', '2024-07-22 10:00:00'),
    ('kevin', 'Breaking news: I found a security flaw in our coffee machine. It''s now brewing espresso for everyone. You''re welcome.', '2024-07-22 16:45:00')";
execute_query($conn, $query);

if ($db_type === 'mysql') {
    $conn->close();
} else {
    $conn->close();
    unset($conn);
}

echo "<p>If you see no errors above, it should be done. <a href=\"index.php\">Continue back to the frontpage.</a>";
?>
</body>
</html>