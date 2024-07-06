
<?php
// application/helpers/custom_helper.php

if (!function_exists('captcha')) {
    function captcha()
    {
        $n1 = rand(10, 100);
        $n2 = rand(0, 10);
        $sign = array('+', '-');
        $m = rand(0, 1);
        $math = eval("return $n1$sign[$m]$n2;");
        $a = array('n1' => $n1, 'n2' => $n2, 'sign' => $sign[$m], "captcha_word" => $math);

        return $a;
    }
}

?>