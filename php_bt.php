<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <style>
        h3 {
            color: #ccc;
        }

        .form-group.operation {
            margin-top: 10px;
        }

        .form-b3-container {
            width: 800px;
            border: 1px solid #ccc;
        }

        .form-b3-container .form-b3-title {
            display: block;
            padding: 10px;
            background-color: #4682B4;
            display: flex;
            justify-content: center;
        }

        .form-b3-container .form-b3 {
            padding: 20px 20px;
        }
    </style>
</head>



<body>

    <?php

    class Operation
    {

        public function operation($firstNumber, $lastNumber, $operation)
        {
            $rs = 0;
            switch ($operation) {
                case "+":
                    $rs = (int)$firstNumber + (int)$lastNumber;
                    break;
                case "-":
                    $rs = (int)$firstNumber - (int)$lastNumber;
                    break;
                case "x":
                    $rs = (int)$firstNumber * (int)$lastNumber;
                    break;
                case "/":
                    $rs = (int)$firstNumber / (int)$lastNumber;
                    break;
                default:
                    echo '';
            }
            return $rs;
        }
    }

    $firstNumber = isset($_POST['firstNumber']) ? $_POST['firstNumber'] : '';
    // echo "firstName: " . $firstNumber;

    // echo "<br>";
    $lastNumber = isset($_POST['lastNumber']) ? $_POST['lastNumber'] : '';
    // echo "lastName: " . $lastNumber;

    // echo "<br>";
    $operation = isset($_POST['operation']) ? $_POST['operation'] : '';
    // echo "Operation: " . $operation;

    // echo "<br>";

    $operat = new Operation();
    $rs_op =  $operat->operation($firstNumber, $lastNumber, $operation);



    ?>



    <h4>Bai 1</h4>

    <?php



    $errors = [];



    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        // $firstNumberErr = '';
        // $lastNumberErr = '';
        // $firstNumberCheck = '';
        // $lastNumberCheck = '';



        if (empty($_POST["firstNumber"])) {
            $firstNumberErr = "FirstNumber is required";
        }
        if (empty($_POST["lastNumber"])) {
            $lastNumberErr = "LastNumber is required";
        }

        if (!is_numeric($_POST["firstNumber"])) {
            $firstNumberCheck = "Please enter the number ";
        }

        if (!is_numeric($_POST["lastNumber"])) {
            $lastNumberCheck = "Please enter the number";
        }
        // var_dump($firstNumberErr);


    }

    ?>

    <form action="php_bt.php" method="POST">
        <h3>Calculation</h3>
        <div class=" form-group">
            <label for="">First Number</label>
            <input type="text" name="firstNumber" value="<?php echo $firstNumber ?>">
            <?php echo isset($firstNumberErr) ?  $firstNumberErr : ''; ?>
            <?php echo isset($firstNumberCheck) ?  $firstNumberCheck : ''; ?>
        </div>

        <br>
        <div class="form-group">
            <label for="">Last Number</label>
            <input type="text" name="lastNumber" value="<?php echo $lastNumber ?>">
            <?php echo isset($lastNumberErr) ?  $lastNumberErr : ''; ?>
            <?php echo isset($lastNumberCheck) ?  $lastNumberCheck : ''; ?>
        </div>

        <div class="form-group operation">
            <label for="">Operation :</label>
            <select name="operation" id="">
                <option>Choose</option>
                <option value="+">+</option>
                <option value="-">-</option>
                <option value="x">*</option>
                <option value="/">/</option>
            </select>
        </div>


        <input type="submit" value="submit" style="margin-top: 10px">
    </form>

    <p>Result: <?php echo isset($firstNumberErr) || isset($lastNumberErr) || isset($lastNumberCheck) || isset($lastNumberCheck)  ? 0 :  $rs_op  ?> </p>




    <?php
    class Circle
    {
        private $radius;

        public function __construct($radius)
        {
            $this->radius = $radius;
        }


        public function Area()
        {
            $area =  3.14 * (int)$this->radius  * (int)$this->radius;
            return $area;
        }
    }
    $radius = isset($_POST['radius']) ? $_POST['radius'] : '';
    $circle = new Circle($radius);
    $rs_area = $circle->Area();





    ?>


    <h4>Bai 2</h4>



    <form action="php_bt.php" method='post'>
        <h3>Circle</h3>
        <label for="">Radius: </label><br>
        <input type="text" placeholder="Enter radius" name="radius" value="<?php echo isset($_POST['radius']) ?  $_POST['radius'] : '';  ?>">
        <?php echo isset($radiusErr) ?  $radiusErr : ''; ?>
        <?php echo isset($radiusCheck) ?  $radiusCheck : ''; ?>

        <br>
        <label for="">Areas: </label><br>

        <input type="text" name="area" value="<?php echo isset($radiusErr) || isset($radiusCheck) ? 0 :  $rs_area ?>">

        <br>
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {


            if (empty($_POST["radius"])) {
                $radiusErr = "radius is required";
            }

            if (!is_numeric(isset($_POST["radius"]) ? $_POST["radius"] : '')) {
                $radiusCheck = "Please enter the number ";
            }
        }
        ?>

        <input type="submit" value="Submit" style="background:  blue; color:white; margin-top:10px" />

    </form>



    <?php

    class Replace
    {
        public function replaceText($input_text, $find_text, $replace_text)
        {
            $output_text = str_replace($input_text, $find_text, $replace_text);
            return $output_text;
        }
    }



    $input_text = isset($_POST['input_text']) ? $_POST['input_text'] : '';
    // echo "input_text: " . $input_text;
    $find_text = isset($_POST['find_text']) ? $_POST['find_text'] : '';
    // echo "find_text: " . $find_text;
    $replace_text = isset($_POST['replace_text']) ? $_POST['replace_text'] : '';
    // echo "replace_text: " . $replace_text;


    $replace = new Replace();
    $output_text = $replace->replaceText($find_text, $replace_text, $input_text);
    // echo $output_text;

    echo "<br>";


    ?>

    <h4>Bai 3</h4>
    <div class=" form-b3-container">
        <div class="form-b3-title" style="text-transform: upper-;">Replace String</div>
        <form action="php_bt.php" method="post" class="form-b3">
            <div class="form-group">
                <label for="">Input</label> <br>
                <textarea placeholder="" class="input_text" name="input_text" style="width: 100%;"> <?php echo $input_text; ?></textarea>
            </div>
            <div class="form-group center " style="display: flex; position:relative; top:10px; justify-content:center;">
                <label for="">Find: </label>
                <input type="text" name="find_text" value="<?php echo $find_text ?>" style="margin-right:10px; margin-left:2px;">
                <label for="">Replace: </label>
                <input type=" text" name="replace_text" value="<?php echo $replace_text ?>" style=" margin-left:2px;">


            </div>
            <div class=" form-group">
                <label for="">Result</label> <br>
                <textarea placeholder="" class="output_text" name="output_text" style="width: 100%;"><?php echo $output_text; ?></textarea>
            </div>
            <div class="form-group" style="display: flex; justify-content:center; ">
                <input type="submit" value="Submit" style="margin-top:10px; background-color: #C0C0C0
; border:none;">

            </div>

        </form>

    </div>










</body>




</html>