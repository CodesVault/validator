<?php

namespace Codesvault\Validator\Rules;

interface Rule
{
    public function check($attr, $value);
}
