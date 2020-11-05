<?php

namespace Galoa\ExerciciosPhp\TextWrap;

class Resolucao implements TextWrapInterface
{
    public function textWrap(string $text, int $length): array
    {
        $pedaco = explode(" ", $text);
        $result = array();
        $w = 0;
        $final_result = array();
        $c = 0;
        $a = "";
        for ($x = 0; $x < sizeof($pedaco); $x++) {
            if ($w + strlen($pedaco[$x]) <= $length) {
                array_push($result, $pedaco[$x]);
                $w +=  strlen($pedaco[$x]);
            } else {
                $width = strlen($pedaco[$x]) / $length;
                $count = 0;
                while ($count < $width) {
                    array_push($result, substr($pedaco[$x], $length * $count, $length));
                    $count++;
                }
            }
        }
        for ($i = 0; $i < sizeof($result); $i++) {
            $c += strlen($result[$i]);
            if ($c <= $length) {
                $a .= $result[$i] . " ";
                $c++;
            }  else {
                array_push($final_result, $a);
                $i--;
                $c = 0;
                $a = "";
            }
        }
        array_push($final_result, $a);
        return $final_result;
    }
}
