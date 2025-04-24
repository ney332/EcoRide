<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro | EcoRide</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="responsivo.css">
    <link rel="shortcut icon" href="img/icon.PNG" type="image/x-icon">
</head>
<body>
<header>
        <h2>EcoRide</h2>
        <div class="menu" id="menu">
            <span></span>
            <span></span>
            <span></span>
        </div>
        <nav class="nav">
            <a href="./index.html">Início</a>
            <a href="./planos.html">Planos</a>
            <a href="./index.php">Contato</a>
            <a href="./lista.php">Lista</a>
        </nav>
    </header>

    <?php
    date_default_timezone_set('America/Sao_Paulo');
    include "conexao.php";

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $nome = $_POST['nome'];
        $cpf = $_POST['cpf'];
        $email = $_POST['email'];
        $telefone = $_POST['telefone'];
        $data_formatada = isset($_POST['data_de_nascimento']) ? $_POST['data_de_nascimento'] : null;

        $sql = "INSERT INTO pessoa (Nome, CPF, `E-mail`, Telefone, Data_de_Nascimento)
                VALUES (:nome, :cpf, :email, :telefone, :data_de_nascimento)";

        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':cpf', $cpf);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':telefone', $telefone);
        $stmt->bindParam(':data_de_nascimento', $data_formatada);

        if ($stmt->execute()) {
            echo "<div class='mensagem'><p>Cadastro realizado com sucesso!</p>
                     <a href='index.php'><button>Voltar</button></a>
                  </div>";
        } else {
            echo "<div class='mensagem'><p>Erro ao cadastrar.</p></div>";
        }
    }
    ?>

    <footer>
        <p>@todos os direitos reservados</p>
    </footer>
    <script>
    const toggle = document.getElementById("menu");
    const nav = document.querySelector(".nav");
    toggle.addEventListener('click', () => {
   nav.classList.toggle('active');
});
</script>
</body>
</html>
