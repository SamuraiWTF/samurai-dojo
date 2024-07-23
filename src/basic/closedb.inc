<?php
// closedb.inc

function db_close($conn) {
    global $db_type;

    if ($db_type === 'mysql') {
        $conn->close();
    } else {
        $conn->close();
        unset($conn);
    }
}

// Close the database connection
db_close($conn);
?>