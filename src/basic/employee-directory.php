<div class="page-title"><h2>Employee Directory</h2></div>

<?php
// Function to get employees (now using accounts table and filtering out admin)
function getEmployees($sortColumn = "last_name", $sortDirection = "DESC") {
    global $conn;
    $sortOrder = $sortColumn . " " . $sortDirection;

    // Prepare the query with a placeholder for the ORDER BY clause
    $query = "SELECT cid, username, first_name, last_name, department, hire_date
              FROM accounts
              WHERE username != 'admin'
              ORDER BY " . $sortOrder;

    // Execute the query
    $result = db_query($conn, $query);

    // Check for errors without exposing the query
    if (!$result) {
        error_log("SQL Error: " . $conn->error);
        return [];
    }

    $employees = [];
    while ($row = db_fetch_assoc($result)) {
        $employees[] = $row;
    }
    return $employees;
}

// Handle the sort order from user input
$sortColumn = isset($_GET['sort']) ? $_GET['sort'] : 'last_name';
$sortDirection = isset($_GET['direction']) && $_GET['direction'] === 'DESC' ? 'DESC' : 'ASC';

// Get employees based on sort order
$employees = getEmployees($sortColumn, $sortDirection);

// Function to generate sort URL
function getSortUrl($column) {
    global $sortColumn, $sortDirection;
    $newDirection = ($column === $sortColumn && $sortDirection === 'ASC') ? 'DESC' : 'ASC';
    return "?page=employee-directory.php&sort=" . $column . "&direction=" . $newDirection;
}
?>

<div class="table-responsive">
    <table class="employee-table">
        <thead>
            <tr>
                <th><a href="<?php echo getSortUrl('last_name'); ?>">Name <span class="sort-indicator"><?php echo ($sortColumn === 'last_name') ? ($sortDirection === 'ASC' ? '▲' : '▼') : ''; ?></span></a></th>
                <th><a href="<?php echo getSortUrl('department'); ?>">Department <span class="sort-indicator"><?php echo ($sortColumn === 'department') ? ($sortDirection === 'ASC' ? '▲' : '▼') : ''; ?></span></a></th>
                <th><a href="<?php echo getSortUrl('hire_date'); ?>">Hire Date <span class="sort-indicator"><?php echo ($sortColumn === 'hire_date') ? ($sortDirection === 'ASC' ? '▲' : '▼') : ''; ?></span></a></th>
                <th>Blog</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($employees as $employee): ?>
            <tr>
                <td><?php echo htmlspecialchars($employee['first_name'] . ' ' . $employee['last_name']); ?></td>
                <td><?php echo htmlspecialchars($employee['department']); ?></td>
                <td><?php echo htmlspecialchars($employee['hire_date']); ?></td>
                <td><a href="?page=view-someones-blog.php&show_only_user=<?php echo urlencode($employee['username']); ?>">View Blog</a></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?php
// Hint section
if ($_COOKIE["showhints"] == 1) {
    echo '<p><span style="background-color: #FFFF00">
    <b>Blind SQL Injection Hint:</b> The sort parameter in the URL is vulnerable to blind SQL injection.
    Try manipulating the ORDER BY clause to extract information.
    Example: ?page=employee-directory.php&sort=(CASE WHEN (SELECT SUBSTRING(password,1,1) FROM accounts WHERE username=\'admin\')=\'F\' THEN last_name ELSE first_name END)&direction=ASC
    Observe how the order changes based on your condition.
    </span></p>';
}
?>