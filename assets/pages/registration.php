<?php
$host = '127.0.0.1:3308';
$db   = 'созданная база';
$user = 'root';
$pass = '';
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$opt = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];
$pdo = new PDO($dsn, $user, $pass, $opt);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    $sql = "INSERT INTO users (username, password) VALUES (?, ?)";
    $stmt= $pdo->prepare($sql);
    $stmt->execute([$username, $password]);

    echo "Привет, $username!";
}
?>

<!DOCTYPE html>
<html>
<head>
    <style>
        body {font-family: Arial, Helvetica, sans-serif;}
        form {border: 3px solid #f1f1f1;}
    </style>
</head>
<body>

<h2>Форма регистрации</h2>

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
  <div class="container">
    <label for="username"><b>Имя пользователя</b></label>
    <input type="text" placeholder="Введите имя пользователя" name="username" required>

    <label for="password"><b>Пароль</b></label>
    <input type="password" placeholder="Введите пароль" name="password" required>

    <button type="submit">Зарегистрироваться</button>
  </div>
</form>

</body>
</html>



