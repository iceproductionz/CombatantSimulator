<?php

namespace Console\Executable\Round;

use Symfony\Component\Console\Output\OutputInterface;

/**
 * Round Info
 *
 * @package Console\Executable\Round
 */
class Info
{
    /**
     * @var OutputInterface
     */
    private $output;

    /**
     * Info constructor.
     *
     * @param OutputInterface $output
     */
    public function __construct(OutputInterface $output)
    {
        $this->output = $output;
    }

    public function __invoke(int $roundNo)
    {

        $this->output->writeln('');
        $this->output->writeln('');
        $this->output->writeln('Round ' . $roundNo);
        $this->output->writeln('');
    }
}