<?php

declare(strict_types=1);

namespace Console\Executable\Factory;

use Console\Model\Response\Result\Factory\Factory as ResultFactory;
use Console\Executable\Round;

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
     * @return Round
     */
    public function make(): Round
    {
        return new Round($this->factory);
    }
}