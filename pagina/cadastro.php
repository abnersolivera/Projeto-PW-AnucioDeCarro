<?php
  session_start();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Projeto PW - Página de Cadastro</title>
</head>
<body>
    <nav>
        <div>
            <ul>
                <li>
                    <a href="../index.php">Página Inicial</a>
                </li>
                <li>
                    <a href="lista.php">Lista</a>
                </li>
                <li>
                    <?php if (isset($_SESSION['usuario'])) { ?>
                        <a href="cadastro.php">Cadastro</a>
                    <?php } else { ?>
                        <a href="cadastro.php">Cadastro</a><!--class="nav-link disabled"-->
                    <?php } ?>
                </li>
            </ul>
        </div>

        <div>
            <?php if(isset($_SESSION['usuario'])) { ?>
                <form action="../login/logout.php">
                    <input type="submit" value="<?php echo $_SESSION['usuario']; ?> - Sair" />
                </form>
            <?php } else { ?>
                <form action="../login/login.php">
                    <input type="submit" value="Entrar" />
                </form>
            <?php } ?>
        </div>
    </nav>

    <div>
        <div>
            <div>
                <h1>Página de Cadastro</h1>
                <form action="../dados/salvar.php" method="post" enctype="multipart/form-data">
                    <div>
                        <label for="txtNome">Nome:</label>
                        <input type="text" id="txtNome" name="txtNome" placeholder="Nome" />
                    </div>
                    <div>
                        <label for="txtAno">Ano:</label>
                        <input type="text" id="txtAno" name="txtAno" placeholder="Ano" />
                    </div>
                    <div>
                        <label for="txtAno">Preço:</label>
                        <input type="text" id="txtPreco" name="txtPreco" placeholder="Preço" />
                    </div>
                    <div>
                        <label for="txtDescricao">Descrição:</label>
                        <input type="text" id="txtDescricao" name="txtDescricao" placeholder="Descrição" />
                    </div>
                    <div>
                        <label for="fileFoto">Selecione a foto:</label>
                        <?php   
                            if(isset($_FILES['fileFoto'])){
                                $arquivo = $_FILES['fileFoto'];

                                if($arquivo['error'])
                                    die("Falha ao enviar o arquivo");
                                    exit;

                                if($arquivo['size'] <= 2097152)
                                    die("Arquivo muito grande!! Maximo 2MB");
                                    exit;
                        ?>
                            <input type="file" id="fileFoto" name="fileFoto" />
                        <?php } else { ?>
                            <input type="file" id="fileFoto" name="fileFoto" />
                        <?php } ?>
                    </div>
                    <div>
                        <button type="submit">Cadastrar</button>
                    </div>
                </form>
            </div>            
        </div>
    </div>
</body>
</html>