<?php


namespace App\Http\Controllers\Auth;


class ValidatorConstants
{
    public const REGEX_ACCENTS_SEULS = "áàâäãåçéèêëíìîïñóòôöõúùûüýÿæœÁÀÂÄÃÅÇÉÈÊËÍÌÎÏÑÓÒÔÖÕÚÙÛÜÝŸÆŒ";
    public const REGEX_ALPHABET_AVEC_ACCENTS = 'A-Za-z'.ValidatorConstants::REGEX_ACCENTS_SEULS;
}
