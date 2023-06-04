<?php

namespace Codesvault\Validator\Rules\Lib;

interface Rule
{
    public function check($dataIdentifier, $value, $attribute = null);
}
