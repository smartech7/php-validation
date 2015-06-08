<?php

namespace Respect\Validation\Exceptions;

class FilterVarException extends ValidationException
{
    public static $defaultTemplates = array(
        self::MODE_DEFAULT => array(
            self::STANDARD => '{{name}} must be valid',
        ),
        self::MODE_NEGATIVE => array(
            self::STANDARD => '{{name}} must not be valid',
        ),
    );
}
