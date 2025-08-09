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
    <meta charset="UTF-8" />
    <title>Consulta de Funcionários</title>
    <link rel="stylesheet" href="estilo.css" />
    <style>
        ul.funcionarios {
            list-style: none;
            padding-left: 0;
        }

        ul.funcionarios li {
            background: #fff;
            margin-bottom: 10px;
            padding: 10px 15px;
            border-radius: 5px;
            box-shadow: 0 0 3px rgba(0, 0, 0, 0.1);
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        ul.funcionarios li a {
            color: #333;
            text-decoration: none;
            font-weight: bold;
        }

        ul.funcionarios li a:hover {
            text-decoration: underline;
            color: #4CAF50;
        }

        form.excluir {
            margin: 0;
        }

        form.excluir button {
            background-color: #f44336;
            border: none;
            color: white;
            padding: 6px 12px;
            border-radius: 4px;
            cursor: pointer;
            font-size: 14px;
        }

        form.excluir button:hover {
            background-color: #d32f2f;
        }
    </style>
</head>

<body>
    <nav class="navbar">
        <ul>
        <li><a href="index.html">Início</a></li>
            <li><a href="cadastro_funcionario.php">Cadastro de novo funcionário</a></li>
            <li><a href="consulta_funcionario.php" class="ativo">Lista de Funcionários</a></li>
        </ul>
    </nav>

    <div class="container">
        <h1>Consulta de Funcionários</h1>
        <?php if (count($funcionarios) === 0): ?>
            <p>Nenhum funcionário cadastrado.</p>
        <?php else: ?>
            <ul class="funcionarios">
                <?php foreach ($funcionarios as $funcionario): ?>
                    <li>
                        <a href="visualizar_funcionario.php?id=<?= htmlspecialchars($funcionario['id']) ?>">
                            <?= htmlspecialchars($funcionario['nome']) ?> (<?= htmlspecialchars($funcionario['cargo']) ?>)
                        </a>
                        <form method="POST" class="excluir"
                            onsubmit="return confirm('Confirma a exclusão deste funcionário?');">
                            <input type="hidden" name="excluir_id" value="<?= htmlspecialchars($funcionario['id']) ?>">
                            <button type="submit">Excluir</button>
                        </form>
                    </li>
                <?php endforeach; ?>
            </ul>
        <?php endif; ?>
    </div>
</body>

</html>