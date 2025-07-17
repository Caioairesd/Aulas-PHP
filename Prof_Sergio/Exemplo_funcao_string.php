<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>



    <?php
    $vogais = array(
        "a",
        "e",
        "i",
        "o",
        "u",
        "A",
        "E",
        "I",
        "O",
        "U"
    );
    echo "Hello word of PHP";
    $cons = str_replace($vogais, "", "hello word of PHP");
    echo "Consoantes: " . $cons, "<br>";
    //0123456789
    $test = "Hello word\n";
    print ("Posição da letra 'o' após 5º: ");
    print strpos($test, "O") . "<br>";
    $mensagem = "Troca letra uma a uma";
    echo $mensagem . "<br/>";
    $new_mensagem = strtr($mensagem, 'abcdef', '123456');
    echo "Criptografando: " . $new_mensagem . "<br/>";
    $new_mensagem = strtr($mensagem, '123456', 'abcdef');
    echo "Descriptografando: " . $new_mensagem . "<br/>";

















    ?>
</body>

</html>