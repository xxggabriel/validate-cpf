<?php 

require_once __DIR__."/../vendor/autoload.php";

$cpf = new CPF\Validate();
$cpf->validate('750.895.051-87');
echo $cpf->getCpf();

