<?php
session_start();
if (!isset($_SESSION['user'])) {
    header('Location: login.php');
    exit;
}
$user = $_SESSION['user'];
echo "<h1>Welcome, {$user['name']} ({$user['role']})</h1>";
echo '<a href="logout.php">Logout</a>';
