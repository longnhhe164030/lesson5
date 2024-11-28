<?php

function checkParentheses($expression) {
    // Tạo một stack rỗng
    $stack = [];

    // Duyệt qua từng ký tự trong biểu thức
    foreach (str_split($expression) as $sym) {
        // Nếu ký tự là dấu ngoặc trái, đưa vào stack
        if ($sym == '(') {
            array_push($stack, $sym);
        }
        // Nếu ký tự là dấu ngoặc phải
        elseif ($sym == ')') {
            // Kiểm tra nếu stack rỗng, tức là không có dấu ngoặc trái tương ứng
            if (empty($stack)) {
                return false;
            }
            // Lấy dấu ngoặc trái ở trên cùng stack
            array_pop($stack);
        }
    }

    // Nếu stack còn dấu ngoặc trái, thì có dấu ngoặc mở không đóng
    return empty($stack);
}

// Kiểm tra các ví dụ
$expressions = [
    "s * (s - a) * (s - b) * (s - c)",       // Well
    "( - b + (b2 - 4*a*c)^0.5) / 2*a",      // Well
    "s * (s - a) * (s - b * (s - c)",       // ??? (mất dấu ngoặc đóng)
    "s * (s - a) * s - b) * (s - c)",       // ??? (dấu ngoặc đóng sai chỗ)
    "( - b + (b^2 - 4*a*c)^(0.5/ 2*a))"    // ??? (mất dấu ngoặc đóng)
];

foreach ($expressions as $expr) {
    echo "Expression: \"$expr\" is " . (checkParentheses($expr) ? "Well" : "Not Well") . "\n";
}

?>
