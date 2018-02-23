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
            return true;

        }catch (\PDOException $e){
            echo $e->getMessage();
            return false;
        }
    }

    public function pesquisa1($curso){
        $sql = "select * from cursos where nome like :nome";
        try{
            $pesquisa = $this->conexao->prepare($sql);
            $pesquisa->bindValue(":nome","%".$curso->getNome()."%");
            $pesquisa->execute();
            $resultado = $pesquisa->fetchAll();
            $cursos = [];
            foreach ($resultado as $item){
                $c = new \App\Model\Curso();
                $c->setId($item['id']);
                $c->setNome($item['nome']);
                $c->setValor($item['valor']);
                $cursos[] = $c;
            }
            return $cursos;
        }catch (\PDOException $e){
            echo $e->getMessage();
        }
    }

    public function pesquisa2($curso)
    {
        $sql = "select * from cursos where nome like :nome";
        try {
            $pesquisa = $this->conexao->prepare($sql);
            $pesquisa->bindValue(":nome", "%".$curso->getNome()."%");
            $pesquisa->execute();
            $lista = $pesquisa->fetchAll(\PDO::FETCH_ASSOC);

                return $lista;

        } catch (\PDOException $e) {
            echo $e->getMessage();
        }
    }

}