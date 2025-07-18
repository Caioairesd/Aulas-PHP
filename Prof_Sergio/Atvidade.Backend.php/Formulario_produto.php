<!DOCTYPE html>
<html lang="pt-br" xmlns=...>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de produto</title>
    <script src="validacao.js"></script>
    <link rel="stylesheet" type="text/css" href="estilo.css">
</head>

<body>
  
    <center>
        <table align="center">
            <form method="get" action="backend_produto.php">


                <img src="logo.png" height="100" width="100"><br>
                <h1>Cadastro de novo jogo</h1>
                <tr align="left">

                    <td><label for="nome_jogo">Nome do jogo</label></td>
                    <td><input type="text" id="nome_jogo" name="nome_jogo" ></td>
                </tr>

                <tr align="left">
                    <td><label for="desc_jogo">Descrição do jogo</label></td>
                    <td><input type="text" id="desc_jogo" name="desc_jogo"></td>

                </tr>

                <tr align="left">
                    <td><label for="cat_jogo">Categoria do jogo</label></td>
                    <td><input type="text" id="cat_jogo" name="cat_jogo" required onkeypress="mascara(this,catjogo)"></td>


                </tr>

    
                <tr align="left">
                    <td><label for="data_lancamento">Data de lançamento </label></td>
                    <td><input type="date" id="data_lancamento" name="data_lancamento"></td>

                </tr>
                <tr align="left">
                    <td><label for="preco">Preço </label></td>
                    <td><input type="text" id="preco" name="preco" required onkeypress="mascara(this,'preco')"></td>

                </tr>
                <tr align="left">
                    <td><label for="plataforma">Plataforma </label></td>

                    <td><select name="plataforma" id="plataforma">pc
                            <option value="pc">PC</option>
                            <option value="xbox">Xbox</option>
                            <option value="ps5">Playstation 5</option>
                            <option value="mobile">Mobile</option>


                        </select></td>


                </tr>
                <tr align="left">
                    <td><label for="capa_jogo">Capa do jogo </label></td>
                    <td><input type="file" id="capa_jogo" name="capa_jogo"></td>

                </tr>
                <tr align="left">
                    <td><label for="link_trailer">Link do trailer </label></td>
                    <td><input type="url" id="link_trailer" name="link_trailer"></td>

                </tr>
                <tr align="left">
                    <td><label for="obs_adicionais">Observações adicionais </label></td>
                    <td><input type="text" id="obs_adicionais" name="obs_adicionais"></td>

                </tr>




                <tr>
                    <td>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        <button>Cadastrar</button>
                        <button>Limpar</button>
                    </td>
                </tr>

            </form>
        </table>
    </center>
</body>

</html>