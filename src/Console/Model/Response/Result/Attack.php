<?php

declare(strict_types=1);

namespace Console\Model\Response\Result;

use Console\Model\Value\Text;

/**
 * Class Attack
 *
 * @package Console\Model\Response\Result
 */
class Attack implements Result
{
    /**
     * @var Text
     */
    private $text;

    /**
     * Attack constructor.
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