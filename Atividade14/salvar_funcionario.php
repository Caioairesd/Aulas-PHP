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
            echo 'Funcionário cadastrado com sucesso!';
        } else {
            echo 'Erro ao cadastrar funcionário!';
        }
    }
}
?>
<a href="consulta_funcionario.php">Listar Funcionários</a>
