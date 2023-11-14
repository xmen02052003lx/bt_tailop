<?php
function addItem($itemName) {
    global $conn;

    $itemName = $conn->real_escape_string($itemName);

    $sql = "INSERT INTO items (name) VALUES ('$itemName')";
    $conn->query($sql);
}
function getItems($offset, $itemsPerPage) {
    global $conn;

    $sql = "SELECT id, name FROM items LIMIT $offset, $itemsPerPage";
    $result = $conn->query($sql);

    $items = [];
    while ($row = $result->fetch_assoc()) {
        $items[] = $row;
    }

    return $items;
}

function getTotalItems() {
    global $conn;

    $sql = "SELECT COUNT(id) AS total FROM items";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();

    return $row['total'];
}

function searchItems($keyword, $offset, $itemsPerPage) {
    global $conn;

    $keyword = $conn->real_escape_string($keyword);

    $sql = "SELECT id, name FROM items WHERE name LIKE '%$keyword%' LIMIT $offset, $itemsPerPage";
    $result = $conn->query($sql);

    $items = [];
    while ($row = $result->fetch_assoc()) {
        $items[] = $row;
    }

    return $items;
}

function getTotalSearchItems($keyword) {
    global $conn;

    $keyword = $conn->real_escape_string($keyword);

    $sql = "SELECT COUNT(id) AS total FROM items WHERE name LIKE '%$keyword%'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();

    return $row['total'];
}
?>
