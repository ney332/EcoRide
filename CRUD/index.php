<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro | EcoRide</title>
    <link rel="stylesheet" href="style.css">
    <link rel="shortcut icon" href="img/icon.PNG" type="image/x-icon">
</head>
<body>
    <header>
        <h2>EcoRide</h2>
        <nav>
            <a href="./index.html">Início</a>
            <a href="./planos.html">Planos</a>
            <a href="./index.php">Contato</a>
            <a href="#">Sobre</a>
        </nav>
    </header>

    <?php include("conexao.php"); ?>
  
    <div class="form-wrapper">
        <h2>Contato</h2>
        <form action="cadastro_script.php" method="POST" class="form-contato">
            <input type="text" name="nome" placeholder="Nome completo" required>
            <input type="text" name="cpf" placeholder="CPF (somente números)" required maxlength="14">
            <input type="text" name="email" placeholder="e-mail" required>
            <input type="text" name="telefone" placeholder="telefone (com DDD)" required maxlength="11">
            <input type="date" name="data_de_nascimento" placeholder="Ex: 11223333">
            <button type="submit" class="butao">Enviar</button>
        </form>
    </div>

    <footer>
        <p>@todos os direitos reservados</p>
    </footer>
</body>
</html>