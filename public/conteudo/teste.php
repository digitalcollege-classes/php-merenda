<?php

include 'Pessoa.php';
include 'Colaborador.php';
include 'Professor.php';
include 'Aluno.php';
include 'Diretor.php';

$p = new Professor();
$p->nome = 'Chiquim';

$p2 = new Professor();
$p2->nome = 'Rosana';

echo "Nome: {$p->nome}";
echo '<br><br>';

$d = new Diretor();
$d->nome = 'Monica';
$d->cpf = '123.123.123-12';

print_r($d);

echo '<br><br>';

$s = new Colaborador();
$s->nome = 'Samuel';

print_r($s);




class Usuario
{}

class UsuarioComum extends Usuario 
{}

class Admin extends Usuario
{}

$alguem = new Usuario();