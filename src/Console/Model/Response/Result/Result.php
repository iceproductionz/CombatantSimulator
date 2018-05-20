<?php

declare(strict_types=1);

namespace Console\Model\Response\Result;

use Console\Model\Value\Text;

interface Result
{
    public function getMessage() : Text ;

    public function endGame(): bool;
}
