<?php
// File untuk menyimpan jumlah pengunjung
$counter_file = 'visitor-count.txt';

// Fungsi untuk mendapatkan jumlah pengunjung
function getVisitorCount() {
    global $counter_file;
    if (file_exists($counter_file)) {
        $count = (int)file_get_contents($counter_file);
        return $count;
    }
    return 0;
}

// Fungsi untuk menambah jumlah pengunjung
function incrementVisitorCount() {
    global $counter_file;
    $count = getVisitorCount() + 1;
    file_put_contents($counter_file, $count);
    return $count;
}

// Handle AJAX request
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action'])) {
    header('Content-Type: application/json');
    
    if ($_POST['action'] === 'get') {
        echo json_encode(['count' => getVisitorCount()]);
    } elseif ($_POST['action'] === 'increment') {
        $new_count = incrementVisitorCount();
        echo json_encode(['count' => $new_count]);
    }
    exit;
}
?>
