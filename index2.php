<?php
include 'config.php';
include 'functions.php';

$itemsPerPage = 5;
$currentPage = isset($_GET['page']) ? intval($_GET['page']) : 1;
$offset = ($currentPage - 1) * $itemsPerPage;

// Handle search
$searchKeyword = isset($_GET['search']) ? $_GET['search'] : '';
if (!empty($searchKeyword)) {
    $items = searchItems($searchKeyword, $offset, $itemsPerPage);
    $totalItems = getTotalSearchItems($searchKeyword);
} else {
    $items = getItems($offset, $itemsPerPage);
    $totalItems = getTotalItems();
}

$totalPages = ceil($totalItems / $itemsPerPage);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Pagination and Search Example</title>
</head>
<body>
    <h2>Items</h2>

    <!-- Search Form -->
    <form action="" method="get">
        <label for="search">Search:</label>
        <input type="text" id="search" name="search" value="<?= htmlspecialchars($searchKeyword) ?>">
        <button type="submit">Search</button>
    </form>

    <!-- Display Items -->
    <ul>
        <?php foreach ($items as $item): ?>
            <li><?= $item['id'] ?> - <?= $item['name'] ?></li>
        <?php endforeach; ?>
    </ul>

    <!-- Pagination Links -->
    <div class='pagination'>
        <?php for ($i = 1; $i <= $totalPages; $i++): ?>
            <a href='?page=<?= $i ?>&search=<?= urlencode($searchKeyword) ?>'><?= $i ?></a>
        <?php endfor; ?>
    </div>
</body>
</html>
