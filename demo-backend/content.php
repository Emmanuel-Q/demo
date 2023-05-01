<?php
// Retrieve page content from database
$pageId = 1; 
$sql = "SELECT * FROM " . TABLE_PAGES . " WHERE id = $pageId";
$stmt = $conn->prepare($sql);
//$stmt->bind_param('i', $pageId);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $pageData = $result->fetch_assoc();
} else {
    die("Page not found");
}