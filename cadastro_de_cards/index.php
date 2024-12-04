<?php
include 'db.php';

$result = $conn->query("SELECT * FROM cards");
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="styles.css">
    <title>Cadastro de Cards</title>
</head>
<body>
    <h1>Lista de Cards</h1>
    <a href="create.php">Cadastrar Novo Card</a>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Raridade</th>
                <th>Descrição</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?= $row['id'] ?></td>
                    <td><?= $row['name'] ?></td>
                    <td><?= $row['rarity'] ?></td>
                    <td><?= $row['description'] ?></td>
                    <td>
                        <a href="update.php?id=<?= $row['id'] ?>">Editar</a>
                        <a href="delete.php?id=<?= $row['id'] ?>" onclick="return confirm('Tem certeza?')">Excluir</a>
                    </td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</body>
</html>
