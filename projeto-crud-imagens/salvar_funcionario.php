<?php
require_once 'includes/conexao.php';
require_once 'includes/cabecalho.php';

$msg = '';

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
            $msg = '<div class="sucesso">✅ Funcionário cadastrado com sucesso!</div>';
        } else {
            $msg = '<div class="erro">❌ Erro ao cadastrar funcionário!</div>';
        }
    } else {
        $msg = '<div class="erro">❌ Erro no upload da imagem.</div>';
    }
}
?>

<div class="container">
    <h1>Cadastro Funcionário</h1>

    <?= $msg ?>

    <form action="" method="post" enctype="multipart/form-data">
        <label for="nome">Nome:</label>
        <input type="text" id="nome" name="nome" required>

        <label for="cargo">Cargo:</label>
        <input type="text" id="cargo" name="cargo" required>

        <label for="foto">Imagem:</label>
        <input type="file" id="foto" name="foto" accept="image/*" required>

        <button type="submit">Cadastrar</button>
    </form>
</div>


<script>
  setTimeout(() => {
    const msg = document.querySelector('.sucesso, .erro');
    if (msg) msg.style.opacity = '0';
  }, 4000);
</script>
