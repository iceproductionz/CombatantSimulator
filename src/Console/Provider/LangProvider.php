<?php

namespace Console\Provider;

use Pimple\Container;

class LangProvider implements \Pimple\ServiceProviderInterface
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
        $pimple['lang.lang']    = function () {
            return json_decode(file_get_contents(__DIR__ . '/../../../config/lang.json'), JSON_OBJECT_AS_ARRAY);
        };

        $pimple['lang.result']  = function () use ($pimple) {
            return $pimple['lang.lang']['results'];
        };
    }
}