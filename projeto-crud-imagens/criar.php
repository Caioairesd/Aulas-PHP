<?php
require_once 'includes/conexao.php';
require_once 'includes/cabecalho.php';

$msg = '';

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_FILES["foto"])) {
    if ($_FILES["foto"]["error"] === 0) {
        $nome = $_POST['nome'];
        $cargo = $_POST['cargo'];
        $foto = file_get_contents($_FILES['foto']['tmp_name']); // imagem original

        $sql = 'INSERT INTO funcionarios (nome, cargo, foto) VALUES (:nome, :cargo, :foto)';
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':cargo', $cargo);
        $stmt->bindParam(':foto', $foto, PDO::PARAM_LOB);

        if ($stmt->execute()) {
            $msg = '<div class="sucesso">✅ Funcionário cadastrado com sucesso!</div>';
        } else {
            $msg = '<div class="erro">❌ Erro ao cadastrar funcionário!</span></div>';
        }
    } else {
        $msg = '<div class="erro">❌ Erro no upload da imagem.</span></div>';
    }
}
?>

<div class="pagina-wrapper">
    <div class="container">
        <div class="titulo">
            <h1>Cadastrar Funcionário</h1>
        </div>
        <?= $msg ?>

        <form method="post" enctype="multipart/form-data">
            <label for="nome">Nome:</label>
            <input type="text" id="nome" name="nome" required>

            <label for="cargo">Cargo:</label>
            <input type="text" id="cargo" name="cargo" required>

            <label for="foto">Imagem:</label>
            <input type="file" id="foto" name="foto" accept="image/*" required>

            <button type="submit">Cadastrar</button>
        </form>
    </div>
</div>

<script>
    setTimeout(() => {
        const msg = document.querySelector('.sucesso, .erro');
        if (msg) {
            msg.style.transition = 'opacity 0.5s ease';
            msg.style.opacity = '0';
            setTimeout(() => {
                msg.style.display = 'none';
            }, 500); // espera a transição terminar
        }
    }, 4000);
</script>


<?php require_once 'includes/rodape.php'; ?>