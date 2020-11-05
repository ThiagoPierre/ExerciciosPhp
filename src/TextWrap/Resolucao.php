<?php
namespace Galoa\ExerciciosPhp\TextWrap;

class Resolucao implements TextWrapInterface
{
    public function textWrap(string $text, int $length): array
    {
        $pedaco = explode(" ", $text);
        $result = array();
        $final_result = array();
        $lengthcounter = 0;
        $save_word = "";
        $w = 0;
        for ($x = 0; $x < sizeof($pedaco); $x++) {
            if ($w + mb_strlen($pedaco[$x]) <= $length) {
                array_push($result, $pedaco[$x]);
                $w +=  mb_strlen($pedaco[$x]);
            } else {
                $width = mb_strlen($pedaco[$x]) / $length;
                $count = 0;
                while ($count < $width) {
                    array_push($result, substr($pedaco[$x], $length * $count, $length));
                    $count++;
                }
            }
        }
        for ($i = 0; $i < sizeof($result); $i++) {
            $lengthcounter += mb_strlen($result[$i]);
            if ($lengthcounter <= $length) {
                $save_word .= $result[$i] . " ";
                $lengthcounter++;
            } else {
                array_push($final_result, $save_word);
                $i--;
                $lengthcounter = 0;
                $save_word = "";
            }
        }
        array_push($final_result, trim($save_word));
        return $final_result;
    }
}
