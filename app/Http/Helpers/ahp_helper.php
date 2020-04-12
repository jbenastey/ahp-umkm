<?php
if (! function_exists('ri')) {
    function ri($n)
    {
        $result = [
          '1' => 0.00,
          '2' => 0.00,
          '3' => 0.58,
          '4' => 0.90,
          '5' => 1.12,
          '6' => 1.24,
          '7' => 1.32,
          '8' => 1.41,
          '9' => 1.45,
          '10' => 1.49,
          '11' => 1.51,
          '12' => 1.48,
          '13' => 1.56,
          '14' => 1.57,
          '15' => 1.59,
        ];
        return $result[$n];
    }
}

if (! function_exists('combinations')) {

    function combinations($k, $xs){
        if ($k === 0)
            return array(array());
        if (count($xs) === 0)
            return array();
        $x = $xs[0];
        $xs1 = array_slice($xs,1,count($xs)-1);
        $res1 = combinations($k-1,$xs1);
        for ($i = 0; $i < count($res1); $i++) {
            array_splice($res1[$i], 0, 0, $x);
        }
        $res2 = combinations($k,$xs1);
        return array_merge($res1, $res2);
    }
}


if (! function_exists('pertama')) {
    function pertama($jawaban){
        $nilai = 0;
        if ($jawaban == 'ss'){
            $nilai = 5;
        }elseif ($jawaban == 's'){
            $nilai = 4;
        }elseif ($jawaban == 'ks'){
            $nilai = 3;
        }elseif ($jawaban == 'ts'){
            $nilai = 2;
        }elseif ($jawaban == 'sts'){
            $nilai = 1;
        }
        return $nilai;
    }
}
