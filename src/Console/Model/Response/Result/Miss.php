<?php

declare(strict_types=1);

namespace Console\Model\Response\Result;

use Console\Model\Value\Text;

/**
 * Class Miss
 *
 * @package Console\Model\Response\Result
 */
class Miss implements Result
{
    /**
     * @var Text
     */
    private $text;

    /**
     * Miss constructor.
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