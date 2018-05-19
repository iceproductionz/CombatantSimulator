<?php

namespace Console\Assert;

use Assert\Assertion as BaseAssertion;
use Console\Exception\InvalidValue;

class Assertion extends BaseAssertion
{
    protected static $exceptionClass = InvalidValue::class;
}