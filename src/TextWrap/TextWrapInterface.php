<?php

namespace Galoa\ExerciciosPhp\TextWrap;

/**
 * Define uma interface para o exercício de quebra de linha.
 */
interface TextWrapInterface {
  /**
   * Paramêtros da função.
   *
   * @param $text
   *   Frase ou texto a ser analisado
   * @param $length
   *   Limite de caracteres por linha
   *
   * @return array
   */
  
  public function textWrap(string $text, int $length): array;

}
