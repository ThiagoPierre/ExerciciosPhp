<?php

namespace Galoa\ExerciciosPhp\TextWrap;

/**
 * Resolução do teste aplicado pela empresa Galoá.
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
      // Ao criar um for para ciclar por toda a array,
      // agora é necessário estabelecer o primeiro parâmetro.
      // Aqui, teremos os casos em que a palavra [$x] cabe no limite,
      // Ou que não cabe, e então é necessário cortá-la.
      if ($w + mb_strlen($pedaco[$x]) <= $length) {
        array_push($result, $pedaco[$x]);
        $w += mb_strlen($pedaco[$x]);
      }
      else {
        $width = mb_strlen($pedaco[$x]) / $length;
        $count = 0;
        // Loop pela palavra que é maior que o limite.
        // Continuamente cortará a palavra até o fim da mesma,
        // sempre respeitando o limite.
        while ($count < $width) {
          array_push($result, substr($pedaco[$x], $length * $count, $length));
          $count++;
        }
      }
    }
    // Após atingir a array com as palavras da string
    // inicial respeitando o limite, começa a verificação
    // se duas ou mais palavras menores que o limite cabem
    // na mesma posição.
    for ($i = 0; $i < count($result); $i++) {
      $lengthcounter += mb_strlen($result[$i]);
      // Caso as palavras menores que o limite,
      // ao se concatenarem adicionando um espaço, 
      // continuem menores que o limite, são colocadas
      // na mesma posição.
      if ($lengthcounter <= $length) {
        $save_word = trim($save_word . " " . $result[$i]);
        $lengthcounter++;
      }
      // Caso elas se tornem maior que o limite ao
      // serem concatenadas, então não ocorre mudança.
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
