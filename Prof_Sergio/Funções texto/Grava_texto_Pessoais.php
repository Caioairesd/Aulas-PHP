<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>



    <?php
        list($nome,$hobby,$curso) = file("pessoais.txt");
        echo"Nome: $nome <br/>";
        echo"Hobby: $hobby <br/>";
        echo"Curso: $curso <br/>";
        



    ?>
</body>

</html>