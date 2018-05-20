<?php

declare(strict_types=1);

namespace Console\Executable\Factory;

use Console\Model\Response\Result\Factory\Factory as ResultFactory;
use Console\Executable\Round\Fight;

class Factory
{
    /**
     * @var ResultFactory
     */
    private $factory;

    /**
     * Factory constructor.
     *
     * @param ResultFactory $factory
     */
    public function __construct(ResultFactory $factory)
    {
        $this->factory = $factory;
    }

    /**
     * @return Fight
     */
    public function make(): Fight
    {
        return new Fight($this->factory);
    }
}