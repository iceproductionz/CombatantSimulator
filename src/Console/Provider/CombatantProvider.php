<?php

declare(strict_types=1);

namespace Console\Provider;


use Console\Factory\Combatant\Brute;
use Console\Factory\Combatant\Grappler;
use Console\Factory\Combatant\Swordsman;
use Console\Factory\Player\Player;
use Console\Factory\Value;
use Console\Model\Chance\Chance;
use Console\Executable\Factory\Factory;
use Pimple\Container;
use Pimple\ServiceProviderInterface;
use StringTemplate\Engine;

class CombatantProvider implements ServiceProviderInterface
{

    /**
     * Registers services on the given container.
     *
     * This method should only be used to configure services and parameters.
     * It should not get services.
     *
     * @param Container $pimple A container instance
     */
    public function register(Container $pimple)
    {
        $pimple['model.chance.chance'] = function () {
            return new Chance();
        };
        $pimple['model.response.result.factory.factory'] = function () use ($pimple) {
            return new \Console\Model\Response\Result\Factory\Factory(new Engine(), $pimple['lang.result']);
        };
        $pimple['factory.value'] = function () {
            return new Value();
        };
        $pimple['factory.combatant.brute'] = function () use ($pimple) {
            return new Brute( $pimple['model.chance.chance'], $pimple['factory.value']);
        };
        $pimple['factory.combatant.grappler'] = function () use ($pimple) {
            return new Grappler( $pimple['model.chance.chance'], $pimple['factory.value']);
        };
        $pimple['factory.combatant.swordsman'] = function () use ($pimple) {
            return new Swordsman( $pimple['model.chance.chance'], $pimple['factory.value']);
        };
        $pimple['factory.player.player'] = function () use ($pimple) {
            return new Player( $pimple['factory.combatant.brute'], $pimple['factory.combatant.grappler'], $pimple['factory.combatant.swordsman']);
        };
        $pimple['round.factory.factory'] = function () use ($pimple) {
            return new Factory($pimple['model.response.result.factory.factory']);
        };
    }
}