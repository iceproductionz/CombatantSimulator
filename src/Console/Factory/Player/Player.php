<?php

namespace Console\Factory\Player;

use Console\Exception\NotImplemented;
use Console\Factory\Combatant\Brute;
use Console\Factory\Combatant\Grappler;
use Console\Factory\Combatant\Swordsman;
use Console\Model\Player\Combatant\Collection;
use Console\Model\Value\Text;

class Player
{
    /**
     * @var Brute
     */
    private $brute;
    /**
     * @var Grappler
     */
    private $grappler;
    /**
     * @var Swordsman
     */
    private $swordsman;

    /**
     *  TODO: consider if a key map would be better solution here
     *
     * Player constructor.
     *
     * @param Brute $brute
     * @param Grappler $grappler
     * @param Swordsman $swordsman
     */
    public function __construct(Brute $brute, Grappler $grappler, Swordsman $swordsman)
    {
        $this->brute = $brute;
        $this->grappler = $grappler;
        $this->swordsman = $swordsman;
    }

    /**
     *
     *
     * @param string $name
     * @param string $combatantType
     * @return \Console\Model\Player\Player
     */
    public function make(string $name, string $combatantType)
    {
        switch ($combatantType) {
            case 'brute':
                $combatant = $this->brute->make();
                break;
            case 'grappler':
                $combatant = $this->grappler->make();
                break;
            case 'swordsman':
                $combatant = $this->swordsman->make();
                break;
            default:
                throw new NotImplemented('Type requested is not supported or implemented');
        }

        return new \Console\Model\Player\Player(new Text($name), false, new Collection($combatant));
    }
}