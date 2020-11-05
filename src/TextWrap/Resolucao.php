<?php
/**
 * Transforma acento em palavras normais
 * 
 * @param string $str
 *    string a ser utilizada para retirada de acentos
 * @return string
 *    retorna uma string sem acentos.
 */
function stripAccents($str)
{
    return strtr(utf8_decode($str), utf8_decode('àáâãäçèéêëìíîïñòóôõöùúûüýÿÀÁÂÃÄÇÈÉÊËÌÍÎÏÑÒÓÔÕÖÙÚÛÜÝ'), 'aaaaaceeeeiiiinooooouuuuyyAAAAACEEEEIIIINOOOOOUUUUY');
}
/**  
 * Quebra uma string em diversas strings com tamanho definido.
 * 
 * @param  string $text
 *    Texto utilizado como entrada
 * @param  int $length
 *    Máximo de caracteres por linha
 * @return array
 * array com as strings já cortadas pelo limite de caracteres
 */
function textWrap(string $text, int $length)
{
    $pedaco = explode(" ", stripAccents($text));
    $result = array();
    $final_result = array();
    $lengthcounter = 0;
    $save_word = "";
    $w = 0;
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
        $lengthcounter += strlen($result[$i]);
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
