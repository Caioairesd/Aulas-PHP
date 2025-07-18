<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        $turma = "Técnico de Desenvolvimento de sistemas";
        echo"Turma: ".$turma."<br/>";
        $turma1 = explode(" ",$turma);
        echo"Turma1: "; print_r($turma1); echo"<br/>";
        $turma2 = implode("...",$turma1);
        echo "Turma2: $turma2 <br/>";
        
    
    
    
    
    
    ?>    


</body>
</html>