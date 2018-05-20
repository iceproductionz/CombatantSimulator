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
     * @var bool
     */
    private $endGame;

    /**
     * Miss constructor.
     *
     * @param Text $text
     * @param bool $endGame
     */
    public function __construct(Text $text, bool $endGame = false)
    {
        $this->text = $text;
        $this->endGame = $endGame;
    }

    /**
     * @return Text
     */
    public function getMessage(): Text
    {
        return $this->text;
    }

    /**
     * @return bool
     */
    public function endGame(): bool
    {
        return $this->endGame;
    }
}