<?php
require_once 'includes/conexao.php';
require_once 'includes/cabecalho.php';

// Buscar todos os funcionários
$sql = "SELECT id, nome, cargo, foto FROM funcionarios";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$funcionarios = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Lista de Funcionários</title>
    <link rel="stylesheet" href="estilo.css">
</head>

<body>
    <div class="lista-funcionarios">
        <h1>Lista de Funcionários</h1>
        <?php if ($funcionarios): ?>
            <table border="1" cellpadding="10">
                <tr>
                    <th>Foto</th>
                    <th>Nome</th>
                    <th>Cargo</th>
                    <th>Ações</th>
                </tr>
                <?php foreach ($funcionarios as $funcionario): ?>
                    <tr>
                        <td>
                            <img src="data:image/jpeg;base64,<?= base64_encode($funcionario['foto']) ?>" alt="Foto"
                                 style="max-width:100px;">
                        </td>
                        <td><?= htmlspecialchars($funcionario['nome']) ?></td>
                        <td><?= htmlspecialchars($funcionario['cargo']) ?></td>
                        <td>
                            <a href="visualizar.php?id=<?= $funcionario['id'] ?>">Visualizar</a> |
                            <a href="atualizar.php?id=<?= $funcionario['id'] ?>">Atualizar</a> |
                            <form method="POST" action="" style="display:inline;">
                                <input type="hidden" name="excluir_id" value="<?= $funcionario['id'] ?>">
                                <button type="submit" onclick="return confirm('Tem certeza que deseja excluir?')">Excluir</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>
        <?php else: ?>
            <p>Nenhum funcionário cadastrado.</p>
        <?php endif; ?>
    </div>
</body>

</html>
