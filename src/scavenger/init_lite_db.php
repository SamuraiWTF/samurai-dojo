<?php
$sqlite_db = '/var/www/html/db/scavenger.sqlite';
$db = new SQLite3($sqlite_db);

// Create table
$db->exec("CREATE TABLE IF NOT EXISTS partners_data (
  partner_id INTEGER PRIMARY KEY AUTOINCREMENT,
  username TEXT,
  password TEXT
)");

// Insert initial data
$db->exec("INSERT OR IGNORE INTO partners_data (username, password) VALUES
('kevin', 'brenna'),
('justin', 'meeas'),
('key13', 'ed265bc903a5a097f61d3ec064d96d2e'),
('key', 'boomerang')");

echo "Database initialized successfully.";
$db->close();
?>