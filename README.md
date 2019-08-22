# Validação de CPF
Essa biblioteca, tem como o unico objetivo, validar a digitação do CPF.

## Instalar Via Composer 
```
composer require xxggabriel/verify-cpf:"v1.0.0"
```


## Como usar

```
  <?php 

require_once __DIR__."/vendor/autoload.php";

$cpf = new CPF\Validate();
echo $cpf->validate('111.444.777-35');
```

## Licença
A biblioteca Validate CPF é um software de código aberto licenciado sob a licença [MIT](https://opensource.org/licenses/MIT).
