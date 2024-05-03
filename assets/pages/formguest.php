<?php
$host = 'localhost'; 
$db = 'созданная база'; 
$user = 'root'; 
$pass = 'root';  
$charset = 'utf8mb4';


$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
];

try {
    $pdo = new PDO($dsn, $user, $pass, $options);
} catch (\PDOException $e) {
    throw new \PDOException($e->getMessage(), (int)$e->getCode());
}

// Проверка на отправку формы
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    // Добавление данных в базу
    $sql = "INSERT INTO messages (name, email, message) VALUES (?, ?, ?)";
    $stmt= $pdo->prepare($sql);
    $stmt->execute([$name, $email, $message]);
}

// Получение данных из базы
$stmt = $pdo->query("SELECT name, email, message FROM messages");
$messages = $stmt->fetchAll();
