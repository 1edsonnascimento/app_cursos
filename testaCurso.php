<?php

include 'vendor/autoload.php';

$c = new App\Model\Curso();
$c->setNome("Arquitetura");
$c->setValor("1900");
$cd = new App\Dao\CursoDao();
$cd->insert($c);


