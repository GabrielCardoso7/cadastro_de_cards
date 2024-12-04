<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $rarity = $_POST['rarity'];
    $description = $_POST['description'];

    $stmt = $conn->prepare("INSERT INTO cards (name, rarity, description) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $name, $rarity, $description);
    $stmt->execute();

    header("Location: index.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="styles.css">
    <title>Adicionar Card</title>
</head>
<body>
    <h1>Adicionar Novo Card</h1>
    <form method="POST">
        <label>Nome:</label>
        <input type="text" name="name" required>
        <label>Raridade:</label>
        <input type="text" name="rarity" required>
        <label>Descrição:</label>
        <textarea name="description" required></textarea>
        <button type="submit">Salvar</button>
    </form>
    <a href="index.php">Voltar</a>
</body>
</html>
