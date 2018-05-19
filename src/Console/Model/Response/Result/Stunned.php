<?php

declare(strict_types=1);

namespace Console\Model\Response\Result;

use Console\Model\Player\Player;
use Console\Model\Value\Factory\Factory;
use Console\Model\Value\Text;

/**
 * Class Stunned
 *
 * @package Console\Model\Response\Result
 */
class Stunned implements Result
{
    /**
     * @var Text
     */
    private $text;

    /**
     * Stunned constructor.
     *
     * @param Text $text
     */
    public function __construct(Text $text)
    {
        $this->text = $text;
    }

    public function getMessage(): Text
    {
        return $this->text;
    }
}
