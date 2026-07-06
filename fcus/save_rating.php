<?php
// save_rating.php
require 'uheader.php';
session_start();

// Check login
if (!isset($_SESSION['cus_id'])) {
    header('Location: login.php');
    exit;
}

if (isset($_POST['a_id'], $_POST['rating'])) {
    $cus_id = (int)$_SESSION['cus_id'];
    $a_id   = (int)$_POST['a_id'];
    $rating = (int)$_POST['rating'];

    // Simple validation: only 1–5 allowed
    if ($rating >= 1 && $rating <= 5) {
        $sql = "UPDATE appointment 
                SET rating = ? 
                WHERE a_id = ? AND cus_id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("iii", $rating, $a_id, $cus_id);
        $stmt->execute();
    }
}

// Redirect back to history page
header('Location: invoice.php');
exit;
