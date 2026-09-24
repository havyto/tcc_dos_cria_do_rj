```php
<?php

session_start();

error_reporting(E_ALL);

// ==============================
// CONEXÃO COM O BANCO
// ==============================

$conexao = mysqli_connect("localhost", "root", "", "ghost_gamer");

if (!$conexao) {
    die("Erro na conexão com o banco de dados: " . mysqli_connect_error());
}

// ==============================
// TIPO DO USUÁRIO
// ==============================

$tipo = isset($_SESSION["administrador"])
    ? $_SESSION["administrador"]
    : "usuario";

?>

<!DOCTYPE html>

<html lang="pt-br">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="../ASSETS/CSS/categoria.css">

    <title>Categoria</title>

</head>

<body>

    <!-- HEADER -->

    <header class="header">

        <div class="logo-container">

            <img
                src="../ASSETS/IMG/logo.png"
                alt="Ghost Gamer"
                class="logo-img"
            >

            <span class="logo-text">

                <a href="../index.php">
                    GHOST GAMER
                </a>

            </span>

        </div>

        <div class="search-box">

            <input
                type="text"
                id="searchInput"
                placeholder="Buscar jogos..."
            >

        </div>

        <button id="menu-btn">☰</button>

    </header>


    <!-- MENU LATERAL -->

    <nav id="menu" class="menu">

        <ul>

            <li>
                <a href="../index.php">Home</a>
            </li>

            <li>
                <a href="biblioteca.php">Biblioteca</a>
            </li>

            <li>
                <a href="categoria.php">Categoria</a>
            </li>

            <!-- ADMIN ONLY -->

            <?php if ($tipo === "admin") { ?>

                <li>
                    <a href="../XAMP/consulta.php">
                        Consulta
                    </a>
                </li>

                <li>
                    <a href="../PAGINAS/cadastroEmpresa.php">
                        Cadastro de Empresa
                    </a>
                </li>

                <li>
                    <a href="cadastroJogos.php">
                        Cadastro de Jogos
                    </a>
                </li>

            <?php } ?>

            <li>
                <a href="perfil.php">
                    Perfil
                </a>
            </li>

            <li>
                <a href="suporte.php">
                    Suporte
                </a>
            </li>

            <li>
                <a href="loginCliente.php">
                    Login
                </a>
            </li>

            <li>
                <a href="cadastroCliente.php">
                    Cadastro
                </a>
            </li>

            <li>
                <a href="../XAMP/logout.php">
                    SAIR
                </a>
            </li>

        </ul>

    </nav>


    <!-- GRID DE CATEGORIAS -->

    <div class="grid-jogos">

        <?php

        $sql = "SELECT DISTINCT genero
                FROM jogo
                ORDER BY genero";

        $result_categoria = mysqli_query($conexao, $sql);

        if (!$result_categoria) {

            die(
                "Erro ao buscar categorias: "
                . mysqli_error($conexao)
            );

        }

        if (mysqli_num_rows($result_categoria) > 0) {

            while ($linha = mysqli_fetch_assoc($result_categoria)) {

                $categoria = $linha["genero"];

                echo "<a href='categoria.php?genero="
                    . urlencode($categoria)
                    . "' class='card'>"
                    . htmlspecialchars($categoria)
                    . "</a>";

            }

        } else {

            echo "<p>Nenhuma categoria encontrada.</p>";

        }

        ?>

    </div>


    <?php

    // ==============================
    // JOGOS DA CATEGORIA
    // ==============================

    if (isset($_GET["genero"])) {

        $genero = mysqli_real_escape_string(
            $conexao,
            $_GET["genero"]
        );

    ?>

        <h2>
            JOGOS DE
            <?php echo htmlspecialchars($genero); ?>
        </h2>


        <div class="games-grid">

            <?php

            $sql = "SELECT *
                    FROM jogo
                    WHERE genero = '$genero'
                    ORDER BY titulo";

            $resultado = mysqli_query($conexao, $sql);

            if (!$resultado) {

                die(
                    "Erro ao buscar jogos: "
                    . mysqli_error($conexao)
                );

            }

            if (mysqli_num_rows($resultado) == 0) {

                echo "<p>Nenhum jogo encontrado nesta categoria.</p>";

            } else {

                while ($jogo = mysqli_fetch_assoc($resultado)) {

            ?>

                    <div class="game-card">

                        <h3>

                            <?php
                            echo htmlspecialchars(
                                $jogo["titulo"]
                            );
                            ?>

                        </h3>

                        <p>

                            <?php
                            echo htmlspecialchars(
                                $jogo["genero"]
                            );
                            ?>

                        </p>

                        <a
                            href="telaJogo.php?id=<?php echo $jogo["id_jogo"]; ?>"
                        >
                            VER JOGO
                        </a>

                    </div>

            <?php

                }

            }

            ?>

        </div>

    <?php

    }

    ?>


    <script src="../ASSETS/JS/categoria.JS"></script>

</body>

</html>
```
