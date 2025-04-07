<?php
session_start();
require 'autoload.php';

use App\Admin;
use App\RegularUser;
use App\AuthService;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $auth = new AuthService();
    $user = $_POST['role'] === 'admin' ? new Admin('', '', '') : new RegularUser('', '', '');
    if ($auth->authenticate($user, $_POST['email'], $_POST['password'])) {
        header('Location: dashboard.php');
        exit;
    } else {
        echo "Login failed.";
    }
}
?>
<form method="post">
    <input name="email" placeholder="Email" required>
    <input name="password" type="password" placeholder="Password" required>
    <select name="role">
        <option value="admin">Admin</option>
        <option value="regular">Regular</option>
    </select>
    <button type="submit">Login</button>
</form>
