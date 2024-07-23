<?php
// opendb.inc

function db_connect() {
    global $db_type, $dbhost, $dbuser, $dbpass, $dbname;

    if ($db_type === 'mysql') {
        $conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
    } else {
        $conn = new SQLite3('/var/www/html/db/' . $dbname . '.sqlite');
    }

    return $conn;
}

function db_query($conn, $query) {
    global $db_type;

    if ($db_type === 'mysql') {
            $result = $conn->query($query);
            if (!$result) {
                die("Query failed: " . $conn->error . '<p><b>SQL Statement:</b>' . $query);
            }
        } else {
            $result = $conn->query($query);
            if (!$result) {
                die("Query failed: " . $conn->lastErrorMsg() . '<p><b>SQL Statement:</b>' . $query);
            }
        }

    return $result;
}

function db_num_rows($result) {
    global $db_type;

    if ($db_type === 'mysql') {
        return $result->num_rows;
    } else {
        $count = 0;
        $res = $result;
        while ($res->fetchArray()) {
            $count++;
        }
        $res->reset();
        return $count;
    }
}

function db_fetch_assoc($result) {
    global $db_type;

    if ($db_type === 'mysql') {
        return $result->fetch_assoc();
    } else {
        return $result->fetchArray(SQLITE3_ASSOC);
    }
}

function db_escape_string($conn, $string) {
    global $db_type;

    if ($db_type === 'mysql') {
        return $conn->real_escape_string($string);
    } else {
        return SQLite3::escapeString($string);
    }
}

// Establish the database connection
$conn = db_connect();
?>