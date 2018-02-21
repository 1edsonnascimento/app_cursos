<?php
/**
 * Created by PhpStorm.
 * User: 1813792
 * Date: 20/02/2018
 * Time: 21:33
 */
 namespace App\Dao;

class CursoDao
{
    private $conexao;

    public function __construct()
    {
        $this->conexao = new \PDO("mysql:host=localhost;dbname=db_cursos","root","Suporte99");
        $this->conexao->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
    }
    public function insert($curso){
        $sql = "insert into cursos(nome,valor) VALUES (:nome,:valor)";
        try{
            $inserir = $this->conexao->prepare($sql);
            $inserir->bindValue(":nome",$curso->getNome());
            $inserir->bindValue(":valor",$curso->getValor());
            $inserir->execute();
        }catch (\PDOException $e){
            echo "<h1>Aconteceu um erro: {$e->getMessage()}</h1>";
        }
    }
}