<?php session_start() ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <?php
        /*if (
        isset($_GET['nome_jogo']) && isset($_GET["desc_jogo"]) && isset($_GET["cat_jogo"])
        && isset($_GET["preco"]) && isset($_GET["data_lancamento"])
        && isset($_GET["plataforma"]) && isset($_GET["capa_jogo"]) && isset($_GET["link_trailer"]) && isset($_GET["obs_adicionais"])
    ) {

        echo "<H1>INFORMAÇÕES DE PRODUTO </H1>";

        echo "Nome do jogo: " . $_GET['nome_jogo'];
        echo "<br>";
        echo "Descrição do jogo: " . $_GET['desc_jogo'];
        echo "<br>";
        echo "Categoria do jogo:" . $_GET['cat_jogo'];
        echo "<br>";
        echo "Preço: " . $_GET['preco'];
        echo "<br>";
        echo "Data de lançamento: " . $_GET['data_lancamento'];
        echo "<br>";
        echo "Plataforma: " . $_GET['plataforma'];
        echo "<br>";
        echo "Capa de jogo: " . $_GET['capa_jogo'];
        echo "<br>";
        echo "Link do trailer" . $_GET['link_trailer'];
        echo "<br>";
        echo "Observações: " . $_GET['obs_adicionais'];

    }*/
    

    $form_jogo = array();
    if (
        isset($_GET["nome_jogo"]) && isset($_GET["desc_jogo"]) && isset($_GET["cat_jogo"])
        && isset($_GET["preco"]) && isset($_GET["data_lancamento"])
        && isset($_GET["plataforma"]) && isset($_GET["capa_jogo"]) && isset($_GET["link_trailer"]) && isset($_GET["obs_adicionais"])
    ) {
        $_SESSION['form_jogo'][] = $_GET["nome_jogo"];
        $_SESSION['form_jogo'][] = $_GET["desc_jogo"];
        $_SESSION['form_jogo'][] = $_GET["cat_jogo"];
        $_SESSION['form_jogo'][] = $_GET["preco"];
        $_SESSION['form_jogo'][] = $_GET["data_lancamento"];
        $_SESSION['form_jogo'][] = $_GET["plataforma"];
        $_SESSION['form_jogo'][] = $_GET["capa_jogo"];
        $_SESSION['form_jogo'][] = $_GET["link_trailer"];
        $_SESSION['form_jogo'][] = $_GET["obs_adicionais"];


    }

    $form_jogo = array();
    if (isset($_SESSION['form_jogo'])) {

        $form_jogo = $_SESSION['form_jogo'];


    }




    ?>
    <center>
        <table>
            <tr>
                <th>
                    <h1>Formulario</h1>
                </th>
            </tr>
            <?php foreach ($form_jogo as $echo_jogo)
            : ?>
                <tr>
                    <td><?php echo $echo_jogo; ?></td>
                </tr>
            <?php endforeach; ?>


        </table>
    </center>





</body>

</html>