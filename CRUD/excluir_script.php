<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exclusão | EcoRide</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="responsivo.css">
    <link rel="shortcut icon" href="img/icon.PNG" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
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
        include("conexao.php");

        $id = $_POST['id'];

        // Buscar o nome da pessoa com base no ID
        $stmt_nome = $conn->prepare("SELECT Nome FROM pessoa WHERE id = :id");
        $stmt_nome->bindValue(':id', $id, PDO::PARAM_INT);
        $stmt_nome->execute();
        $linha = $stmt_nome->fetch(PDO::FETCH_ASSOC);
        $nome = $linha ? $linha['Nome'] : "Contato";

        $stmt = $conn->prepare("DELETE FROM pessoa WHERE id = :id");
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);

        if ($stmt->execute()) {
            echo "
            <main class='d-flex flex-column justify-content-center align-items-center text-center' style='min-height: 60vh;'>
                <h4 class='mb-3'>$nome excluído com sucesso!</h4>
                <a href='lista.php' class='btn btn-secondary'>Voltar</a>
            </main>
            ";
        } else {
            echo "
            <main class='d-flex flex-column justify-content-center align-items-center text-center' style='min-height: 60vh;'>
                <h4 class='mb-3'>Erro ao excluir $nome.</h4>
                <a href='lista.php' class='btn btn-danger'>Voltar</a>
            </main>
            ";
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
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>