<?php
require_once 'conexao.php';

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

$msg = '';
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_FILES["foto"])) {
    if ($_FILES["foto"]["error"] === 0) {
        $nome = $_POST['nome'];
        $cargo = $_POST['cargo'];
        $foto = redimensionar($_FILES['foto']['tmp_name'], 300, 400);

        $sql = 'INSERT INTO funcionarios (nome, cargo, foto) VALUES (:nome, :cargo, :foto)';

        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':cargo', $cargo);
        $stmt->bindParam(':foto', $foto, PDO::PARAM_LOB);

        if ($stmt->execute()) {
            $msg = 'Funcionário cadastrado com sucesso!';
        } else {
            $msg = 'Erro ao cadastrar funcionário!';
        }
    } else {
        $msg = 'Erro no upload da imagem.';
    }
} else {
    $msg = 'Acesso inválido.';
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8" />
    <title>Salvar Funcionário</title>
    <link rel="stylesheet" href="estilo.css" />
</head>
<body>
    <nav class="navbar">
        <ul>
            <li><a href="index.html">Início</a></li>
            <li><a href="cadastro_funcionario.php">Cadastro de novo funcionário</a></li>
            <li><a href="consulta_funcionario.php" class="ativo">Lista de Funcionários</a></li>
        </ul>
    </nav>

    <div class="container" style="text-align:center;">
        <h1><?php echo $msg; ?></h1>
        <a href="consulta_funcionario.php" class="botao-voltar">Voltar para Lista de Funcionários</a>
    </div>
</body>
</html>
