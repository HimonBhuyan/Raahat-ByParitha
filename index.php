<?php

require_once __DIR__ . '/vendor/autoload.php';

use eftec\bladeone\BladeOne;

// Ensure cache directory exists and is writable
$cacheDir = __DIR__ . '/cache';
if (!is_dir($cacheDir)) {
    mkdir($cacheDir, 0777, true);
}

$viewsDir = __DIR__ . '/views';
$blade = new BladeOne($viewsDir, $cacheDir, BladeOne::MODE_DEBUG);

// Determine base URL dynamically
$scriptDir = str_replace('\\', '/', dirname($_SERVER['SCRIPT_NAME'] ?? ''));
$baseUrl = rtrim($scriptDir, '/');
if ($baseUrl === '/' || $baseUrl === '\\') {
    $baseUrl = '';
}

// Load data repositories
$products = require __DIR__ . '/data/products.php';
$atelierData = require __DIR__ . '/data/ateliers.php';
$brand = $atelierData['brand'];
$ateliers = $atelierData['ateliers'];
$faqs = $atelierData['faqs'];

// Determine current page
$page = $_GET['page'] ?? 'home';
$allowedPages = ['home', 'collections', 'bespoke', 'atelier', 'contact', 'product'];

// AJAX appointment handler
$requestMethod = $_SERVER['REQUEST_METHOD'] ?? 'GET';
if ($requestMethod === 'POST' && isset($_GET['action']) && $_GET['action'] === 'book_appointment') {
    header('Content-Type: application/json');
    
    $name = trim($_POST['name'] ?? '');
    $phone = trim($_POST['phone'] ?? '');
    $city = trim($_POST['city'] ?? 'Chennai');
    $occasion = trim($_POST['occasion'] ?? 'Wedding & Groom Wardrobe');
    $date = trim($_POST['date'] ?? date('Y-m-d', strtotime('+3 days')));
    $notes = trim($_POST['notes'] ?? 'Interested in bespoke consultation.');
    $sourceProduct = trim($_POST['product'] ?? '');

    if (empty($name) || empty($phone)) {
        echo json_encode(['success' => false, 'message' => 'Please provide your full name and phone number.']);
        exit;
    }

    // Format WhatsApp message
    $waText = "✨ *Raahat ByParitha — VIP Consultation Request* ✨\n\n"
            . "• *Client Name:* " . $name . "\n"
            . "• *Contact:* " . $phone . "\n"
            . "• *Preferred Atelier:* " . $city . "\n"
            . "• *Occasion / Silhouette:* " . $occasion . "\n"
            . "• *Preferred Date:* " . $date . "\n";
    if (!empty($sourceProduct)) {
        $waText .= "• *Referenced Couture:* " . $sourceProduct . "\n";
    }
    if (!empty($notes)) {
        $waText .= "• *Notes:* " . $notes . "\n";
    }
    $waText .= "\n_Submitted via Raahat ByParitha Digital Atelier_";

    $waUrl = "https://wa.me/" . $brand['whatsapp'] . "?text=" . rawurlencode($waText);

    echo json_encode([
        'success' => true,
        'message' => 'Your private appointment request has been prepared. Creative Director Pari Agarwal\'s concierge desk will connect with you.',
        'whatsapp_url' => $waUrl
    ]);
    exit;
}

// Single product view
$selectedProduct = null;
if ($page === 'product' && isset($_GET['id'])) {
    $productId = $_GET['id'];
    foreach ($products as $p) {
        if ($p['id'] === $productId) {
            $selectedProduct = $p;
            break;
        }
    }
    if (!$selectedProduct) {
        $page = 'collections';
    }
}

if (!in_array($page, $allowedPages)) {
    $page = 'home';
}

// View parameters
$viewData = [
    'baseUrl' => $baseUrl,
    'currentPage' => $page,
    'brand' => $brand,
    'products' => $products,
    'ateliers' => $ateliers,
    'faqs' => $faqs,
    'selectedProduct' => $selectedProduct
];

try {
    echo $blade->run("pages.{$page}", $viewData);
} catch (\Throwable $e) {
    http_response_code(500);
    echo '<div style="background:#0a0e17; color:#fff; padding:40px; font-family:sans-serif; text-align:center;">';
    echo '<h2 style="color:#d4af37;">Raahat ByParitha Atelier — Template Compilation Error</h2>';
    echo '<p style="color:#ff8888;">' . htmlspecialchars($e->getMessage()) . '</p>';
    echo '<pre style="text-align:left; background:#141926; padding:20px; border-radius:8px; overflow:auto;">' . htmlspecialchars($e->getTraceAsString()) . '</pre>';
    echo '</div>';
}
