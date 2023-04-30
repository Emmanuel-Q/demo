<?php
require_once 'config.php';

// Define database table names
define('TABLE_PAGES', 'pages');
define('TABLE_CHANGES', 'changes');

// Retrieve page content from database
$pageId = 1;
$sql = "SELECT * FROM " . TABLE_PAGES . " WHERE id = " . $pageId;
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $pageData = $result->fetch_assoc();
} else {
    die("Page not found");
}

// Update page content in database
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $newContent = $_POST['content']; // Replace with the name of your form field

    // Insert new change record
    $sql = "INSERT INTO " . TABLE_CHANGES . " (page_id, content) VALUES ($pageId, '$newContent')";
    $conn->query($sql);

    // Update page content
    $sql = "UPDATE " . TABLE_PAGES . " SET content = '$newContent' WHERE id = $pageId";
    $conn->query($sql);

    // Redirect to page
    header('Location: /');
    exit;
}

// Display page content
echo $pageData['content'];




// Modified Code
require_once 'config.php';

// Define database table names
define('TABLE_PAGES', 'pages');
define('TABLE_CHANGES', 'changes');

// Retrieve page content from database
$pageId = 1; 
$sql = "SELECT * FROM " . TABLE_PAGES . " WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param('i', $pageId);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $pageData = $result->fetch_assoc();
} else {
    die("Page not found");
}

// Update page content in database
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // $newContent = $_POST['content']; 
    $navbar_brand = $_POST['navbar_brand'];
    $nav_item = $_POST['nav_item'];
    $header_h1 = $_POST['header_h1'];
    $page_title = $_POST['page_title'];
    $header_paragraph =$_POST['header_paragraph'];
    $header_gs = $_POST['header_gs'];
    $header_lm = $_POST['header_lm'];
    $feature1_h2 = $_POST['feature1_h2'];
    $feature1_paragraph = $_POST['feature1_paragraph'];
    $feature1_CTA = $_POST['feature1_CTA'];
    $feature2_h2 = $_POST['feature2_h2'];
    $feature2_paragraph = $_POST['feature2_paragraph'];
    $feature2_CTA = $_POST['feature2_CTA'];
    $feature3_h2 = $_POST['feature3_h2'];
    $feature3_paragraph = $_POST['feature3_paragraph'];
    $feature3_CTA = $_POST['feature3_CTA'];
    $testimonial_h2 = $_POST['testimonial_h2'];
    $testimonial_paragraph = $_POST['testimonial_paragraph'];
    $testimonial1_paragraph = $_POST['testimonial1_paragraph'];
    $testimonial1_name = $_POST['testimonial1_name'];
    $testimonial2_paragraph = $_POST['testimonial2_paragraph'];
    $testimonial2_name = $_POST['testimonial2_name'];
    $contact_h2 = $_POST['contact_h2'];
    $contact_paragraph = $_POST['contact_paragraph'];
    $contact_name = $_POST['contact_name'];
    $contact_email = $_POST['contact_email'];
    $contact_phone = $_POST['contact_phone'];
    $contact_message = $_POST['contact_message'];
    $contact_btn = $_POST['contact_btn'];
    $footer_paragraph = $_POST['footer_paragraph'];

    // Insert new change record
    $sql = "INSERT INTO " . TABLE_CHANGES . " (page_id, page_title, navbar_brand, nav_item, header_h1, header_paragraph,
    header_gs, header_lm, feature1_h2, feature1_paragraph, feature1_CTA, feature2_h2, feature2_paragraph, feature2_CTA, feature3_h2,
    feature3_paragraph, feature3_CTA, testimonial_h2, testimonial_paragraph, testimonial1_paragraph, testimonial1_name, testimonial2_paragraph,
    testimonial2_name, contact_h2, contact_paragraph, contact_name, contact_email, contact_phone, contact_message, contact_btn, footer_paragraph) VALUES (?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('is', $pageId, $newContent);
    $stmt->execute();

    // Update page content
    $sql = "UPDATE " . TABLE_PAGES . " SET content = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('si', $newContent, $pageId);
    $stmt->execute();

    // Redirect to page
    header('Location: /');
    exit;
}

// Display page content
echo $pageData['content'];



