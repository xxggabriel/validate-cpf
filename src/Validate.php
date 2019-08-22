<?php 

namespace CPF;

class Validate{
    
    private $cpf;
    private $verifyingDigit;

    /**
     * Start CPF Validation.
     * @var $cpf = CPF for validation
     * @return bool
     */
    public function validate(string $cpf)
    {
        $this->setCpf($cpf);
        return $this->validateVerifiedNumber();
    }

    /** 
     * CPF Validation Rule Manager.
     * @return bool 
    */
    public function validateVerifiedNumber()
    {
        $cpf = (int)substr($this->getCpf(), 0, 9);
        $this->setVerifyingDigit(substr($this->getCpf(), 9, 2));
        
        $checkerNumber1 = $this->checkDigit($cpf, 10);
        $checkerNumber2 =$this->checkDigit($cpf, 11,  $checkerNumber1);
        return $checkerNumber1.$checkerNumber2 == substr($this->getCpf(), 9, 2);
    }

    /**
     * Make the calculation of the verifying digests.
     * @var $cpf = receives the first 9 digits of CPF.
     * @var $som = multiplication value to generate the check digit.
     * @var $firstTester = receive first check digit.
     */
    private function checkDigit(int $cpf,int $sum, $firstTester = '')
    {
        $calc = 0;
        $cpf .= $firstTester;
        
        for ($i=strlen((int)$cpf); $i > 0; $i--) { 
            
            $calc = substr(strrev($cpf), $i - 1, 1) * (1 + $i) + $calc;
            
        }   
        
        
        $restofDivision = floor($calc % 11 );
        
        
        if($restofDivision < 2){
            $verifyingDigit = 0;
        } else {
            $verifyingDigit = $restofDivision - 11;
        }
        return abs($verifyingDigit);
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

            $cpf = str_replace('.', '', $cpf);
            $cpf = str_replace('-', '', $cpf);
            
            
        } else {
            if(strlen($cpf) != 11)
                throw new \Exception("Invalid CPF, must have 11.", 1);
        }
        $this->cpf = $cpf;
    }

    public function getVerifyingDigit()
    {
        return $this->verifyingDigit;
    }

    public function setVerifyingDigit($verifyingDigit)
    {
        $this->verifyingDigit = $verifyingDigit;
    }

}