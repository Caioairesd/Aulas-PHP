<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    #Rand gera um inteiro aleatório
    $sorteio = rand(0, 5);
    echo "Sorteado: $sorteio <hr>";

    #array_merge - Combina um ou mais arrays
    #Range - Cria um array contendo uma faixa de elemento 
    # (Inicio, fim, passo)
    $vetor = array_merge(
        range(0, 10),
        range($sorteio, 10, 2),
        array($sorteio)
    );

    print ($vetor);
    echo "<hr>";

    #embaralha
    
    shuffle($vetor);
    print_r($vetor);
    echo "<hr>";
    foreach ($vetor as $valor) {
        echo "O valor" . $valor . "tem 3 elementos.<br>";


    }


    ?>
</body>

</html>