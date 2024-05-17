<?php
include_once("formguest.php");

?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Гостевая книга</title>
<link rel="stylesheet" href="../css/main.css">
</head>
<body>
<h3>Гостевая книга</h3>
<form method="post">
<input type="text" name="name" placeholder="Ваше имя" required>
<input type="email" name="email" placeholder="Ваш email" required>
<textarea name="message" placeholder="Ваше сообщение" required></textarea>
<button type="submit">Отправить</button>
</form>
<h2>Сообщения:</h2>
    <?php foreach ($messages as $message): ?>
        <p>
            <strong><?php echo htmlspecialchars($message['name']); ?></strong><br>
            <?php echo htmlspecialchars($message['email']); ?><br>
            <?php echo nl2br(htmlspecialchars($message['message'])); ?>
        </p>
    <?php endforeach; ?>
</body>
</html>