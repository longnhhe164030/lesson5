<!DOCTYPE html>
<html>
    <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Count the number in array</title>
    </head>
    <body>
    <form method="post">
    <label for="numbers">Enter number array:</label><br>
        <input type="text" id="numbers" name="numbers" required><br><br>

        <label for="value">Enter the value need to count:</label><br>
        <input type="number" id="value" name="value" required><br><br>

        <input type="submit" value="Count">
</form>
        <?php
        function countNumber($numbers,$value){
            $count = 0;
            foreach($numbers as $number){
            if($number == $value){
                $count++;
            }
        }
        return $count;
    }
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $numbers = explode(",", $_POST["numbers"]);
        $numbers = array_map('intval', $numbers);
        $value = $_POST["value"];
        $count = countNumber($numbers, $value);
        echo "<p>The '$value' xuất hiện $count lần trong mảng.</p>";    
}
        ?>
    </body>
</html>