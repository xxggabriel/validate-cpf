<?php 

namespace CPF;

class Validate{
    
    private $cpf;

    public function validate(string $cpf)
    {
        $this->setCpf($cpf);
    }

    public function getCpf()
    {
        return $this->cpf;
    }

    public function setCpf($cpf)
    {

        if(!ctype_digit($cpf)){
        
            if(strlen($cpf) != 14)
                throw new \Exception("Invalid CPF, must have 14.", 1);

            $pattern = '/(.)(-)/';

            if (!preg_match($pattern, $cpf)) 
                throw new \Exception("CPF is invalid character", 1);
                
            
        } else {
            if(strlen($cpf) != 11)
                throw new \Exception("Invalid CPF, must have 11.", 1);
            
        }
        $this->cpf = $cpf;
    }

}