<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro | EcoRide</title>
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

        $pesquisa = isset($_POST['busca']) ? $_POST['busca'] : '';

        $sql = "SELECT * FROM pessoa WHERE nome LIKE :pesquisa";
        $stmt = $conn->prepare($sql);
        $stmt->execute([':pesquisa' => '%' . $pesquisa . '%']);
        $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);
    ?>

    <div class="form-wrapper2">
        <h2>Contato</h2>

        <nav class="navbar bg-body-tertiary">
         <div class="container-fluid">
            <a class="navbar-brand">Lista</a>
            <form class="form-cadastro d-flex" role="search" action="lista.php" method="post">
                <input class="form-control me-2" type="search" placeholder="Pesquisar" aria-label="Search" name="busca">
                <button class="btn btn-outline-success" type="submit">Pesquisar</button>
            </form>
         </div>
        </nav>

        <div class="table-responsive">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nome</th>
                    <th scope="col">CPF</th>
                    <th scope="col">Email</th>
                    <th scope="col">Telefone</th>
                    <th scope="col">Data de Nascimento</th>
                    <th scope="col">Funções</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($resultados as $index => $linha): ?>
                    <tr>
                        <th scope="row"><?= $index + 1 ?></th>
                        <td><?= htmlspecialchars($linha['Nome']) ?></td>
                        <td><?= htmlspecialchars($linha['CPF']) ?></td>
                        <td><?= htmlspecialchars($linha['E-mail']) ?></td>
                        <td><?= htmlspecialchars($linha['Telefone']) ?></td>
                        <td><?= htmlspecialchars($linha['Data_de_Nascimento']) ?></td>
                        <td width="150px">
                            <a href="./contato_edit.php?id=<?= htmlspecialchars($linha['Id']) ?>" class="btn btn-success btn-sm">Editar</a>
                            <a href="#" 
                            class="btn btn-danger btn-sm"
                            data-bs-toggle="modal"
                            data-bs-target="#confirma"
                            onclick="pegar_dados(<?= $linha['Id'] ?>, '<?= addslashes($linha['Nome']) ?>')">
                            Excluir
                            </a>
                        </td>
                    </tr>

                <?php endforeach; ?>
                <?php if (count($resultados) === 0): ?>
                <tr>
                    <td colspan="6">Nenhum resultado encontrado.</td>
                </tr>
                <?php endif; ?>
            </tbody>
        </table>
        </div>
    </div>

        <!-- Modal -->
    <div class="modal fade" id="confirma" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Confirmação de exclusão</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form action="excluir_script.php" method="post">
            <p>Deseja realmente excluir <b id="nome_pessoa">Nome da pessoa</b>?</p>
        </div>
        <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Não</button>
                <input type="hidden" name="id" id="id" value=""></input>
                <input type="submit" class="btn btn-danger" value="Sim"></input>
            </form>
        </div>
        </div>
    </div>
    </div>
        
    <script>
        function pegar_dados(id, nome) {
            document.getElementById('id').value = id;
            document.getElementById('nome_pessoa').textContent = nome;
        };

         const toggle = document.getElementById("menu");
         const nav = document.querySelector(".nav");
         toggle.addEventListener('click', () => {
         nav.classList.toggle('active');
    });
    </script>


    <footer>
        <p>@todos os direitos reservados</p>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>