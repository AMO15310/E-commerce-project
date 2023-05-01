<?php
// Connect to the database
$pdo = new PDO('mysql:host=localhost;dbname=my_database', 'username', 'password');

// Get the form data
$product_name = $_POST['product_name'];
$price = $_POST['product_price'];
$pi_sign = $_POST['pi_sign'];

// Validate the form data
if (!in_array($pi_sign, ['π', '𝜋', 'Π'])) {
  die('Invalid Pi sign');
}

// Add the item to the database
$stmt = $pdo->prepare('INSERT INTO cart (product_name, price, pi_sign) VALUES (?, ?, ?)');
$stmt->execute([$product_name, $product_price, $pi_sign]);

// Redirect the user back to the item page
header('Location: /item-description.php');
exit;
?>
