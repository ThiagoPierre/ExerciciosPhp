<?php

namespace Galoa\ExerciciosPhp\TextWrap;

/**
 * Resolução class Doc Comment, teste aplicado pela empresa Galoá.
 *
 * @category Class
 * @package TextWrap
 * @author Thiago Pierre <thiago.barboza.p@gmail.com>
 * @license Dont Have One
 * @link https://github.com/ThiagoPierre/ExerciciosPhp
 */
class Resolucao implements TextWrapInterface {

  /**
   * Paramêtros da função.
   *
   * @param string $text
   *   Frase ou texto a ser analisado.
   * @param int $length
   *   Limite de caracteres por linha.
   *
   * @return array
   *   Retorna uma array com o texto separado por limite de caracteres.
   */
  public function textWrap(string $text, int $length): array {
    $pedaco = explode(" ", $text);
    $result = [];
    $final_result = [];
    $lengthcounter = 0;
    $save_word = "";
    $w = 0;
    for ($x = 0; $x < count($pedaco); $x++) {
      // Ao criar um for para ciclar por toda a array, agora é necessário estabelecer o primeiro parâmetro.
      // Aqui, teremos os casos em que a palavra [$x] cabe no limite, ou é necessário cortá-la.
      if ($w + mb_strlen($pedaco[$x]) <= $length) {
        array_push($result, $pedaco[$x]);
        $w += mb_strlen($pedaco[$x]);
      }
      else {
        $width = mb_strlen($pedaco[$x]) / $length;
        $count = 0;
        while ($count < $width) {
          array_push($result, substr($pedaco[$x], $length * $count, $length));
          $count++;
        }
      }
    }
    for ($i = 0; $i < count($result); $i++) {
      $lengthcounter += mb_strlen($result[$i]);
      if ($lengthcounter <= $length) {
        $save_word = trim($save_word . " " . $result[$i]);
        $lengthcounter++;
      }
      else {
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
