<!DOCTYPE html>
<?php session_start(); ?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerenciador de tarefas PHP</title>
</head>



<body>
    <h1>Gerenciador de tarefas</h1>
    <form>
        <fieldset>
            <legend>Nova tarefa</legend>
            <label>
                Tarefa:
                <input type="text" name="nome" />

            </label>
            <input type="submit" value="cadastrar" />

        </fieldset>

    </form>
    <?php
    $lista_tarefas = array();
    if (isset($_GET["nome"])) {
        echo "Nome informado: " . $_GET["nome"];
        $lista_tarefas[] = $_GET["nome"];

    }

    ?>


    <table>
        <tr>
            <th>Tarefas</th>
        </tr>
        <?php foreach ($lista_tarefas as $tarefa)
        : ?>
            <tr>
                <td><?php echo $tarefa; ?></td>
            </tr>
        <?php endforeach; ?>


    </table>

</body>

</html>