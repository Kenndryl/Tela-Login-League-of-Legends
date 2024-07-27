<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link rel="stylesheet" href="./style.css">
  
  <script src="./script.js" defer></script>

  <title>Receber Dados</title>
</head>
<body>
    <?php
    $conexao = mysqli_connect("localhost", "root", "", "teste");
    // CHECAR CONEXÃO
    if (!$conexao) {
        echo "NÃO CONECTADO";
    } else {
        echo "CONECTADO AO BANCO>>>>>";
        
        // RECUPERAR E VERIFICAR SE JÁ EXISTE
        $username = $_POST['username'];
        $username = mysqli_real_escape_string($conexao, $username);
        $sql = "SELECT nome FROM teste.dados WHERE nome = '$username'";
        $retorno = mysqli_query($conexao, $sql);

        if (mysqli_num_rows($retorno) > 0) {
            echo "NOME JÁ CADASTRADO!<br>";
        } else {
            $nome = $_POST['nome'];
            $senha = $_POST['senha'];

            $sql = "INSERT INTO teste.dados(nome,senha) VALUES('$nome', '$senha')";
            $resultado = mysqli_query($conexao, $sql);
            echo ">>USUÁRIO CADASTRADO COM SUCESSO!<br>";
        }

        // Fechar a conexão
        mysqli_close($conexao);
    }
    ?>
</body>
</html>
