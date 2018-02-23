<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../vendor/twbs/bootstrap/dist/css/bootstrap.css">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <div class="container">
            <h1>Consulta de Cursos</h1>
        </div>

        <div class="container">
            <form class="form-horizontal" action="curso-pesquisar.php" method="post">
                <div class="form-group">
                    <label for="nome">Nome:</label>
                    <input type="text" id="nome" name="nome" class="form-control">
                </div>
                <div class="form-group">
                    <input type="submit" value="Pesquisar" class="btn btn-danger">
                </div>
            </form>
        </div>
            <?php
                if($_POST){
                    include '../vendor/autoload.php';
                    $curso = new App\Model\Curso();
                    $curso->setNome($_POST['nome']);

                    $cursoDao = new App\Dao\CursoDao();
                    echo "<table class='table'>";
                    echo "<tr><th>Id</th><th>Nome</th><th>Valor</th></tr>";
                    foreach ($cursoDao->pesquisa2($curso) as $value){
                        echo "<tr>";
                        echo "<td>{$value['id']}</td>";
                        echo "<td>{$value['nome']}</td>";
                        echo "<td>{$value['valor']}</td>";
                        echo "</tr>";
                    }
                    echo "</table>";
                }
            ?>
        <div class="container">

        </div>
    </div>
</body>
</html>