<?php

declare(strict_types=1);

namespace Console\Model\Response\Result;

use Console\Model\Value\Text;

/**
 * Class Evaded
 *
 * @package Console\Model\Response\Result
 */
class Evaded implements Result
{
    /**
     * @var Text
     */
    private $text;

    /**
     * Evaded constructor.
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