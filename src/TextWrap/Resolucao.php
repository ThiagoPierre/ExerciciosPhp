<?php
/**
 * Comentarios do arquivo textWrap
 * php version 7.4.12
 * 
 * @category File
 * @package  TextWrap
 * @author   Thiago Pierre <thiago.barboza.p@gmail.com>
 * @license  GNU General Public License version 2 or later; see LICENSE
 * @link     https://github.com/ThiagoPierre/ExerciciosPhp
 */
namespace Galoa\ExerciciosPhp\TextWrap;
/**
 * Resolução class Doc Comment
 * 
 * Resolução do teste aplicado pela empresa Galoá
 * 
 * @category Class
 * @package  TextWrap
 * @author   Thiago Pierre <thiago.barboza.p@gmail.com>
 * @license  Dont Have One
 * @link     https://github.com/ThiagoPierre/ExerciciosPhp
 */
class Resolucao implements TextWrapInterface
{
    /**
     * Paramêtros da função
     * 
     * @param $text   Frase ou texto a ser analisado
     * @param $length Limite de caracteres por linha
     * 
     * @return array
     */
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
                $save_word  = trim($save_word . " " . $result[$i]);
                $lengthcounter++;
            } else {
                array_push($final_result, trim($save_word));
                $i--;
                $lengthcounter = 0;
                $save_word = "";
            }
        }
        array_push($final_result, trim($save_word));
        return $final_result;
    }
}

