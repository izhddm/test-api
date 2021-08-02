<?php

namespace App\Dto;

use Pfilsx\DtoParamConverter\Annotation\Dto;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @Dto()
 */
final class SearchDto
{
    /**
     * @Assert\Range(min="1", max="20")
     */
    public int $count;
    public int $date_from;
    public int $date_to;
    /**
     * @Assert\Choice(choices={"RUB", "EUR","USD"})
     */
    public string $currency_code;
}