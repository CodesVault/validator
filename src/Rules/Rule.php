<?php

namespace Codesvault\Validator\Rules;

interface Rule
{
    public function check($dataIdentifier, $value, $attribute = null);
}
