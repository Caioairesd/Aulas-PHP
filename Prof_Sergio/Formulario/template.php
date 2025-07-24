<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
        </fieldset>
        <fieldset>
            <label>
                Descrição (Opcional):
                <textarea name="descricao"></textarea>

            </label>
        </fieldset>
        <fieldset>
            <label>
                Prazo (opcional):
                <input type="text" name="prazo" />

            </label>


        </fieldset>
        <fieldset>
            <legend>Prioridade</legend>
            <label>
                <input type="radio" name="prioridade" value="baixa" checked />
                Baixa
                <input type="radio" name="prioridade" value="media" />
                Média
                <input type="radio" name="prioridade" value="alta" />
                Alta
            </label>
        </fieldset>

        <label>
            Tarefa concluída:
            <input type="checkbox" name="concluida" value="sim" />
        </label>
        <br>
        <input type="submit" value="cadastrar" />

        <table border="1">
            <tr>
                <th>Tarefas</th>
                <th>Descrição</th>
                <th>prazo</th>
                <th>prioridade</th>
                <th>Ccnluida</th>

            </tr>
            <?php foreach ($lista_tarefas as $tarefa)
            : ?>
                <tr>
                    <td><?php echo $tarefa['nome']; ?></td>
                    <td><?php echo $tarefa['descricao']; ?></td>
                    <td><?php echo $tarefa['prazo']; ?></td>
                    <td><?php echo $tarefa['prioridade']; ?></td>
                    <td><?php echo $tarefa['concluida']; ?></td>

                </tr>
            <?php endforeach; ?>


        </table>


    </form>
</body>

</html>