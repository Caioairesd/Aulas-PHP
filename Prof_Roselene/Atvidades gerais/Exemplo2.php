<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php

        setcookie('preferências_site',"tema=escuro&idioma=pt-BR",time()+ time() + 604800,"/","",false,true);
        echo"<br/> Cookie 'preferencias_Site'Criado com sucesso!";
    
    
    ?>    




</body>
</html>