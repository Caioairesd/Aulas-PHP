<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php

    $nota = 3;
    if ($nota >= 7) {
        echo "Aluno aprovado com nota $nota";
    }
    if ($nota < 7 && $nota > 3) {
        echo "Aluno em exame com nota $nota";
    }
    if ($nota <= 3) {
        echo "Aluno reprovado com nota $nota";

    }

    ?>
</body>

</html>