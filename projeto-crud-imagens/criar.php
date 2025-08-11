<?php
require_once 'includes/cabecalho.php';

$msg = '';
if (isset($_GET['sucesso']) && $_GET['sucesso'] == 1) {
    $msg = '<div class="sucesso">✅ Funcionário cadastrado com sucesso!</div>';
}
?>

<div class="pagina-wrapper">
    <div class="container">
        <h1>Cadastro Funcionário</h1>

        <?= $msg ?>

        <form action="salvar_funcionario.php" method="post" enctype="multipart/form-data">
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
        const msg = document.querySelector('.sucesso');
        if (msg) msg.style.opacity = '0';
    }, 4000);
</script>


<?php require_once 'rodape.php'; ?>