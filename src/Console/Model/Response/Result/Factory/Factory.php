<?php

declare(strict_types=1);

namespace Console\Model\Response\Result\Factory;

use Console\Exception\InvalidRegex;
use Console\Exception\NotImplemented;
use Console\Model\Player\Player;
use Console\Model\Response\Result\Attack;
use Console\Model\Response\Result\Evaded;
use Console\Model\Response\Result\Result;
use Console\Model\Response\Result\Stunned;
use Console\Model\Value\Text;

class Factory
{
    /**
     * @var array
     */
    private $result;

    /**
     * Factory constructor.
     *
     * @param array $result
     */
    public function __construct(array $result)
    {
        $this->result = $result;
    }

    /**
     * Make Result
     *
     * @param string $code
     * @param Player $attacker
     * @param Player $defender
     * @return Result
     */
    public function make(string $code, Player $attacker, Player $defender) : Result
    {
        $text = '';
        if (isset($this->result[$code])) {
            $text = $this->race(
                $this->result[$code],
                [
                    'attackerName' => $attacker->getName()->getValue(),
                    'defenderName' => $defender->getName()->getValue()
                ]
            );
        }
        $message = new Text($text);

        switch ($code) {
            case 'evaded':
                return new Evaded($message);
            case 'stunned':
                return new Stunned($message);
            case 'attack':
                return new Attack($message);
            default:
                throw new NotImplemented('Result is not implemented');

        }

    }

    /**
     * TODO more this to a proxy class
     *
     * @param $text
     * @param array $replacer
     * @return string
     */
    private function race($text, array $replacer): string
    {
        foreach ($replacer as $key => $value) {
            $text = $this->findReplace($text, $key, $value);
        }
        return $text;
    }

    /**
     * Parses a template argument to the specified value
     * Template variables are defined using double curly brackets: {{ [a-zA-Z] }}
     * Returns the query back once the instances has been replaced
     *
     * @param string $string
     * @param string $find
     * @param string $replace
     * @return string
     * @throws InvalidRegex
     */
    private function findReplace($string, $find, $replace): string
    {
        if (preg_match("/[a-zA-Z\_]+/", $find)) {
            return (string) preg_replace("/\{\{(\s+)?($find)(\s+)?\}\}/", $replace, $string);
        }

        throw new InvalidRegex('Find statement must match regex pattern: /[a-zA-Z]+/');
    }
}