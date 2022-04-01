<?php

class Operation
{
    private $first_number;
    private $last_number;
    private $phep_cong;
    private $phep_tru;
    private $phep_nhan;
    private $phep_chia;

    private $input_text;
    private $output_text;


    public function __construct()
    {
    }


    // public function __construct($pc, $pt, $pn, $pch)
    // {
    //     $this->phep_cong = $pc;
    //     $this->phep_tru = $pt;
    //     $this->phep_nhan = $pn;
    //     $this->phep_chia = $pch;
    // }

    public function setPC($pc)
    {
        $this->phep_cong = $pc;
    }
    public function getPC()
    {
        return $this->phep_cong;
    }


    public function setFirstNumber($firstNumber)
    {
        $this->first_Number = $firstNumber;
    }
    public function getFirstNumber()
    {
        return $this->first_Number;
    }


    public function setlastNumber($lastNumber)
    {
        $this->last_Number = $lastNumber;
    }
    public function getlastNumber()
    {
        return $this->last_number;
    }



    public function setPT($pt)
    {
        $this->phep_tru = $pt;
    }
    public function getPT()
    {
        return $this->phep_tru;
    }

    public function setPN($pn)
    {
        $this->phep_nhan = $pn;
    }
    public function getPN()
    {
        return $this->phep_nhan;
    }

    public function setPCH($pch)
    {
        $this->phep_chia = $pch;
    }
    public function getPCH()
    {
        return $this->phep_chia;
    }


    public function operation($firstNumber, $lastNumber, $operation)
    {
        $rs = 0;
        switch ($operation) {
            case "+":
                $rs = $firstNumber + $lastNumber;
                break;
            case "-":
                $rs = $firstNumber - $lastNumber;
                break;
            case "x":
                $rs = $firstNumber * $lastNumber;
                break;
            case "/":
                $rs = $firstNumber / $lastNumber;
                break;
            default:
                echo 'No result';
        }
        return $rs;
    }

    public function replaceText($input_text, $find_text, $replace_text)
    {
        $output_text = str_replace($input_text, $find_text, $replace_text);
        return $output_text;
    }
}

$firstNumber = isset($_POST['firstNumber']) ? $_POST['firstNumber'] : '';
echo "firstName: " . $firstNumber;

echo "<br>";
$lastNumber = isset($_POST['lastNumber']) ? $_POST['lastNumber'] : '';
echo "lastName: " . $lastNumber;

echo "<br>";
$operation = isset($_POST['operation']) ? $_POST['operation'] : '';
echo "Operation: " . $operation;

echo "<br>";



$input_text = isset($_POST['input_text']) ? $_POST['input_text'] : '';
echo "input_text: " . $input_text;
$find_text = isset($_POST['find_text']) ? $_POST['find_text'] : '';
echo "find_text: " . $find_text;
$replace_text = isset($_POST['replace_text']) ? $_POST['replace_text'] : '';
echo "replace_text: " . $replace_text;

echo "<br>";



$ope = new Operation();
$result = $ope->operation($firstNumber, $lastNumber, $operation);
echo "result: " . $result;