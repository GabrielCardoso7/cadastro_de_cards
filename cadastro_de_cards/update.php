<?php
include 'db.php';

$id = $_GET['id'];
$card = $conn->query("SELECT * FROM cards WHERE id = $id")->fetch_assoc();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $rarity = $_POST['rarity'];
    $description = $_POST['description'];

    $stmt = $conn->prepare("UPDATE cards SET name = ?, rarity = ?, description = ? WHERE id = ?");
    $stmt->bind_param("sssi", $name, $rarity, $description, $id);
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
    <title>Editar Card</title>
</head>
<body>
    <h1>Editar Card</h1>
    <form method="POST">
        <label>Nome:</label>
        <input type="text" name="name" value="<?= $card['name'] ?>" required>
        <label>Raridade:</label>
        <input type="text" name="rarity" value="<?= $card['rarity'] ?>" required>
        <label>Descrição:</label>
        <textarea name="description" required><?= $card['description'] ?></textarea>
        <button type="submit">Salvar Alterações</button>
    </form>
    <a href="index.php">Voltar</a>
</body>
</html>
