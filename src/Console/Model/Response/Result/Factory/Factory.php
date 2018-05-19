<?php

declare(strict_types=1);

namespace Console\Model\Response\Result\Factory;

use Console\Exception\NotImplemented;
use Console\Model\Player\Player;
use Console\Model\Response\Result\Hit;
use Console\Model\Response\Result\Evaded;
use Console\Model\Response\Result\Miss;
use Console\Model\Response\Result\Result;
use Console\Model\Response\Result\Stunned;
use Console\Model\Value\Text;
use StringTemplate\Engine;

class Factory
{
    /**
     * @var array
     */
    private $result;

    /**
     * @var Engine
     */
    private $template;

    /**
     * Factory constructor.
     *
     * @param Engine $template
     * @param array $result
     */
    public function __construct(Engine $template, array $result)
    {
        $this->result = $result;
        $this->template = $template;
    }

    /**
     * Make Result
     *
     * @param string $code
     * @param Player $attacker
     * @param Player $defender
     * @param int $damage
     * @return Result
     */
    public function make(string $code, Player $attacker, Player $defender, int $damage) : Result
    {
        if (!isset($this->result[$code])) {
            throw new NotImplemented('$code, supplied not implemented: '. $code);
        }
        $text = $this->parse(
            $this->result[$code],
            [
                'attacker' => [
                    'name'   => $attacker->getName()->getValue(),
                    'health' => $attacker->getFirstCombatant()->getHealth()->getValue(),
                    'damage' => $damage,
                ],
                'defender' => [
                    'name'   => $defender->getName()->getValue(),
                    'health' => $defender->getFirstCombatant()->getHealth()->getValue(),
                    'damage' => $damage,
                ]
            ]
        );
        $message = new Text($text);

        switch ($code) {
            case 'evaded':
                return new Evaded($message);
            case 'stunned':
                return new Stunned($message);
            case 'miss':
                return new Miss($message);
            case 'hit':
                return new Hit($message);
            default:
                throw new NotImplemented('Result is not implemented');
        }
    }

    /**
     * TODO more this to a proxy class
     *
     * @param string  $text
     * @param array   $replacements
     * @return string
     */
    private function parse(string $text, array $replacements): string
    {
        return $this->template->render($text, $replacements);
    }
}
