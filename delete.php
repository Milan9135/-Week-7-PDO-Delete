<?php

$host = "localhost:3307";
$username = "root";
$password = "";
$database = "winkel1";

try {
    $conn = new PDO("mysql:host=$host;dbname=$database", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected, ";
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}

if (isset($_GET['knopje'])) {

    $product_code = $_GET['product_code'];
    $sql = ("DELETE FROM producten WHERE product_code = ?");

    $stmt = $conn->prepare($sql);
    $stmt->execute([$product_code]);

    echo "deleted row $product_code";
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Title</title>
</head>
<body>
    <form method="GET">
        <input type="text" name="product_code" placeholder="product_code">
        <p>input new product_code or confirm deletion</p>
        <input type="submit" name="knopje">
    </form>
</body>
</html>