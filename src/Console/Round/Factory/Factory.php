<?php

declare(strict_types=1);

namespace Console\Round\Factory;

use Console\Model\Response\Result\Factory\Factory as ResultFactory;
use Console\Round\Round;

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