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
<?php
    if($_POST){
        include '../vendor/autoload.php';

        $curso = new \App\Model\Curso();
        $curso->setNome($_POST['nome']);
        $curso->setValor($_POST['valor']);
        $cursoDao = new App\Dao\CursoDao();
        if($cursoDao->insert($curso))
            echo "<div class='alert alert-danger text-center' style='font-weight: Bold'>Inserido com Sucesso!!</div>";
    }
?>
<div class="container">
    <div class="jumbotron">
        <h1>Cadastro de Cursos</h1>
    </div>
    <form class="form-horizontal" action="inserir-curso.php" method="post">
        <div class="form-group">
            <label for="nome">Nome:</label>
            <input type="text" id="nome" name="nome" class="form-control" autofocus>
        </div>
        <div class="form-group">
            <label for="valor">Valor:</label>
            <input type="text" id="valor" name="valor" class="form-control"><br>
        </div>
        <input type="submit" value="Cadastrar" class="btn btn-danger">
    </form>
</div>
</body>
</html>