<?php
require_once 'conexao.php';

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["excluir_id"])) {
    $excluir_id = $_POST["excluir_id"];
    $sql_excluir = "DELETE FROM funcionarios WHERE id = :id";
    $stmt_excluir = $pdo->prepare($sql_excluir);
    $stmt_excluir->bindParam(":id", $excluir_id, PDO::PARAM_INT);
    $stmt_excluir->execute();
    header("Location: " . $_SERVER["PHP_SELF"]);
    exit();
}

$sql = "SELECT id, nome, cargo FROM funcionarios";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$funcionarios = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Consulta de Funcionários</title>
</head>
<body>
<h1>Consulta de Funcionários</h1>
<ul>
    <?php foreach ($funcionarios as $funcionario): ?>
        <li>
            <a href="visualizar_funcionario.php?id=<?= $funcionario['id'] ?>">
                <?= htmlspecialchars($funcionario['nome']) ?> (<?= htmlspecialchars($funcionario['cargo']) ?>)
            </a>
            <form method="POST" style="display:inline;">
                <input type="hidden" name="excluir_id" value="<?= $funcionario['id'] ?>">
                <button type="submit">Excluir</button>
            </form>
        </li>
    <?php endforeach; ?>
</ul>
</body>
</html>
