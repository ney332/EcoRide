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

    <?php
    include("conexao.php");

    if (!isset($_GET['id']) || empty($_GET['id'])) {
        echo "ID não fornecido.";
        exit;
    }
    
    $id = $_GET['id'];
    

    $stmt = $conn->prepare("SELECT * FROM pessoa WHERE Id = :id");
    $stmt->execute([':id' => $id]);
    $linha = $stmt->fetch(PDO::FETCH_ASSOC);
    ?>

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

    <div class="form-wrapper">
        <h2>Alteração de Contato</h2>
        <form class="form-cadastro" action="cadastro_script.php" method="POST">
            <input type="hidden" name="id" value="<?= htmlspecialchars($linha['Id']) ?>">
            <input type="text" name="nome" placeholder="Nome completo" required value="<?= htmlspecialchars($linha['Nome']) ?>" >
            <input type="text" name="cpf" placeholder="CPF (somente números)" required maxlength="14" value="<?= htmlspecialchars($linha['CPF']) ?>" >
            <input type="text" name="email" placeholder="e-mail" required value="<?= htmlspecialchars($linha['E-mail']) ?>" >
            <input type="text" name="telefone" placeholder="telefone (com DDD)" required maxlength="11" value="<?= htmlspecialchars($linha['Telefone']) ?>" >
            <input type="date" name="data_de_nascimento" placeholder="Ex: 11223333" value="<?= htmlspecialchars($linha['Data_de_Nascimento']) ?>" >
            <button type="submit" class="butao" value="Salvar Alterações">Enviar</button>
        </form>
    </div>

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