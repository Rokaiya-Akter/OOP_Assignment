<?php
require 'autoload.php';
use App\DB;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $db = DB::connect();
    $stmt = $db->prepare("INSERT INTO users (name, email, password, role) VALUES (?, ?, ?, ?)");
    $hashed = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $stmt->execute([$_POST['name'], $_POST['email'], $hashed, $_POST['role']]);
    echo "User registered successfully!";
}
?>
<form method="post">
    <input name="name" placeholder="Name" required>
    <input name="email" placeholder="Email" required>
    <input name="password" type="password" placeholder="Password" required>
    <select name="role">
        <option value="admin">Admin</option>
        <option value="regular">Regular</option>
    </select>
    <button type="submit">Register</button>
</form>
