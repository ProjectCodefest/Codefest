<?php

    class Random {

        function randomNumber($num1, $num2){
            $randomNum = rand($num1, $num2);
            return $randomNum;
        }

        function balance($balance){
            $newBalance = $balance - 1;
            return $balance;
        }
    }

$random = new Random();
echo $random->randomNumber(1,99);

