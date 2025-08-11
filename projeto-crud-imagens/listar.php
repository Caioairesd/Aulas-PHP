<?php
require_once 'includes/conexao.php';
require_once 'includes/cabecalho.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['excluir_id'])) {
    $id = $_POST['excluir_id'];

    $sql = 'DELETE FROM funcionarios WHERE id = :id';
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);

    if ($stmt->execute()) {
        $msg = '<div class="mensagem-exclusao">✅ Funcionário excluído com sucesso!</div>';
    } else {
        $msg = '<div class="mensagem-exclusao erro">❌ Erro ao excluir funcionário.</div>';
    }
}

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

        <?php if (isset($msg)) echo $msg; ?>

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
                    <img src="data:image/jpeg;base64,<?= base64_encode($funcionario['foto']) ?>" alt="Foto" style="max-width:100px;">
                </td>
                <td><?= htmlspecialchars($funcionario['nome']) ?></td>
                <td><?= htmlspecialchars($funcionario['cargo']) ?></td>
                <td>
                    <a href="visualizar.php?id=<?= $funcionario['id'] ?>">Visualizar</a> |
                    <a href="atualizar.php?id=<?= $funcionario['id'] ?>">Editar</a> |
                    <form method="post" style="display:inline;" onsubmit="return confirm('Tem certeza que deseja excluir?')">
                        <input type="hidden" name="excluir_id" value="<?= $funcionario['id'] ?>">
                        <button type="submit">Excluir</button>
                    </form>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php else: ?>
            <p>Nenhum funcionário cadastrado.</p>
        <?php endif; ?>
    </div>

    <script>
        setTimeout(() => {
            const msg = document.querySelector('.mensagem-exclusao');
            if (msg) {
                msg.style.transition = 'opacity 0.5s ease';
                msg.style.opacity = '0';
                setTimeout(() => msg.remove(), 500);
            }
        }, 3000);
    </script>

    <?php require_once 'includes/rodape.php'; ?>
</body>
</html>
