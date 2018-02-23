<?php

include 'vendor/autoload.php';

$c = new App\Model\Curso();

$c->setNome("");

$cd = new App\Dao\CursoDao();
/*
foreach($cd->pesquisa1($c) as $item){
    echo $item->getId()." - ".$item->getNome().$item->getValor()."<br>";
}
*/
$a = $cd->pesquisa2($c);
foreach ($a as $value){
    echo $value['nome']."<br>";
}

