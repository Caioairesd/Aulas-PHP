<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>



    <?php
    $i = 1;
    $num = 1;

    while ($i <= 10 && $num <= 10) {
        echo "<h1>Tabuada do $num\n";

        while ($i <= 10) {

            echo "$num X $i =" + $num * $i + "<br>";


            $i++;
        }

        $num++;
    }
    ?>
</body>

</html>