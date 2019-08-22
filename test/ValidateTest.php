<?php 

require_once __DIR__."/../vendor/autoload.php";

$cpf = new CPF\Validate();
echo $cpf->validate('111.444.777-35');
// echo $cpf->getCpf();
// echo $cpf->getVerifyingDigit();
// echo $this->getVerifyingDigit();

