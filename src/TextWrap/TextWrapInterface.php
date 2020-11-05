<?php

namespace Galoa\ExerciciosPhp\TextWrap;

/**
 * Define uma interface para o exercício de quebra de linha.
 */
interface TextWrapInterface {

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
  public function textWrap(string $text, int $length): array;

}
