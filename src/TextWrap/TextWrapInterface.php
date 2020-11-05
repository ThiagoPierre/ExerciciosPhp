<?php

namespace Galoa\ExerciciosPhp\TextWrap;

/**
 * Define uma interface para o exercício de quebra de linha.
 */
interface TextWrapInterface {
  public function textWrap(string $text, int $length): array;

}
