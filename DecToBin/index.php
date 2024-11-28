    <?php
    class Stack{
        private $stack = [];

        public function __construct(){}

        public function push($item){
                $this->stack[] = $item;     
        }

        public function pop(){
            if(empty($this->stack)){
                throw new RuntimeException('Stack is empty!');            
        }else{
            return array_pop($this->stack);
        }
    }

    public function isEmpty() {
        return empty($this->stack);
        }
    }
    
    function decimalToBinary($decimal){
        if($decimal == 0){
            return '0';
        }
        elseif ($decimal < 0) {
            throw new InvalidArgumentException('Only non-negative integers are allowed.');
        }
        $stack = new stack();
        while($decimal>0){
            $remainder = $decimal % 2;
            $stack->push($remainder);
            $decimal = intdiv($decimal ,2);
        }
        $binaryResult = "";
        while(!$stack->isEmpty()){
            $binaryResult .= $stack->pop();
        }
        return $binaryResult;
    } 
    ?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
    </head>
    <body>
    <form action="" method="post">
        <label for = "">Enter the decimal number :</label>
        <input type = "number" name = "deciNum">
        <input type= "submit" >
    </form>
    <?php
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $decimal = intval($_POST["deciNum"]);
        $binary = decimalToBinary($decimal);
        echo "Binary number of " . $_POST["deciNum"] ." is : " . $binary;
    }
    ?>
    </body>
    </html>