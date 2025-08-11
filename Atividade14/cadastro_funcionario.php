<?php
require_once 'conexao.php';

$msg = '';
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_FILES["foto"])) {
    if ($_FILES["foto"]["error"] === 0) {
        function redimensionar($imagem, $largura, $altura)
        {
            list($larguraOriginal, $alturaOriginal) = getimagesize($imagem);
            $nova_imagem = imagecreatetruecolor($largura, $altura);
            $imagemOriginal = imagecreatefromjpeg($imagem);
            imagecopyresampled($nova_imagem, $imagemOriginal, 0, 0, 0, 0, $largura, $altura, $larguraOriginal, $alturaOriginal);
            ob_start();
            imagejpeg($nova_imagem);
            $dadosImagem = ob_get_clean();
            imagedestroy($nova_imagem);
            imagedestroy($imagemOriginal);
            return $dadosImagem;
        }

        $nome = $_POST['nome'];
        $cargo = $_POST['cargo'];
        $foto = redimensionar($_FILES['foto']['tmp_name'], 300, 400);

        $sql = 'INSERT INTO funcionarios (nome, cargo, foto) VALUES (:nome, :cargo, :foto)';
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':cargo', $cargo);
        $stmt->bindParam(':foto', $foto, PDO::PARAM_LOB);

        if ($stmt->execute()) {
            $msg = '<span class="sucesso">Funcionário cadastrado com sucesso!</span>';
        } else {
            $msg = '<span class="erro">Erro ao cadastrar funcionário!</span>';
        }
    } else {
        $msg = '<span class="erro">Erro no upload da imagem.</span>';
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8" />
    <title>Cadastro Funcionário</title>
    <link rel="stylesheet" href="estilo.css" />
    <style>
        .sucesso {
            color: green;
            font-weight: bold;
            margin-bottom: 15px;
            display: block;
            text-align: center;
        }

        .erro {
            color: red;
            font-weight: bold;
            margin-bottom: 15px;
            display: block;
            text-align: center;
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
        <h1>Cadastro Funcionário</h1>

        <?php if ($msg): ?>
            <?= $msg ?>
        <?php endif; ?>

        <form action="cadastro_funcionario.php" method="post" enctype="multipart/form-data">
            <label for="nome">Nome: </label>
            <input type="text" id="nome" name="nome" required>

            <label for="cargo">Cargo:</label>
            <input type="text" id="cargo" name="cargo" required>

            <label for="foto">Imagem:</label>
            <input type="file" id="foto" name="foto" accept="image/*" required>

            <div class="butoes">
                <button type="submit">Cadastrar</button>
            </div>
        </form>
    </div>
</body>

</html>