<?php

declare(strict_types=1);

namespace Console\Model\Response\Result;

use Console\Model\Value\Text;

/**
 * Class Hit
 *
 * @package Console\Model\Response\Result
 */
class Hit implements Result
{
    /**
     * @var Text
     */
    private $text;

    /**
     * Hit constructor.
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