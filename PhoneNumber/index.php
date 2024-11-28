<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Categorize phone numbers</title>
</head>
<body>
<form method="post">
    <label for="phone_numbers">Enter a list of phone numbers:</label><br>
    <textarea id="phone_numbers" name="phone_numbers" rows="5" cols="50"></textarea><br><br> 
    <button type="submit">Submit</button>
</form>

<?php
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    
    $input = $_POST['phone_numbers'];

    $viettel_number = ['039','038','037','036','035','034','033','032'];
    $vina_number = ['083','084','085','081','088','082'];
    $mobiphone_number = ['070','079','077','076','078'];

    $viettel = [];
    $vina = [];
    $mobi = [];
    $others = [];

    $phone = explode(',', $input); 
    foreach($phone as $num){
        $num = trim($num);
     
        $prefix = substr($num, 0, 3);

        if (in_array($prefix, $viettel_number)) {
            $viettel[] = $num;
        } elseif (in_array($prefix, $vina_number)) {
            $vina[] = $num;
        } elseif (in_array($prefix, $mobiphone_number)) {
            $mobi[] = $num;
        } else {
            $others[] = $num; 
        }
    }

    echo '<h3>Viettel numbers:</h3>';
    if (!empty($viettel)) {
        echo '<ul>';
        foreach ($viettel as $v) {
            echo "<li>$v</li>";
        }
        echo '</ul>';
    } else {
        echo '<p>No Viettel numbers found.</p>';
    }

    echo '<h3>Vinaphone numbers:</h3>';
    if (!empty($vina)) {
        echo '<ul>';
        foreach ($vina as $v) {
            echo "<li>$v</li>";
        }
        echo '</ul>';
    } else {
        echo '<p>No Vinaphone numbers found.</p>';
    }

    echo '<h3>Mobifone numbers:</h3>';
    if (!empty($mobi)) {
        echo '<ul>';
        foreach ($mobi as $m) {
            echo "<li>$m</li>";
        }
        echo '</ul>';
    } else {
        echo '<p>No Mobifone numbers found.</p>';
    }

    echo '<h3>Other numbers:</h3>';
    if (!empty($others)) {
        echo '<ul>';
        foreach ($others as $o) {
            echo "<li>$o</li>";
        }
        echo '</ul>';
    } else {
        echo '<p>No other numbers found.</p>';
    }
}
?>

</body>
</html>
