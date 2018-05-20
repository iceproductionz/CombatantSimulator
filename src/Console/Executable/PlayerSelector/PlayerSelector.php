<?php

namespace Console\Executable\PlayerSelector;

use Console\Factory\Player\Player;
use Symfony\Component\Console\Helper\QuestionHelper;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Question\ChoiceQuestion;
use Symfony\Component\Console\Question\Question;

class PlayerSelector
{
    /**
     * @var InputInterface
     */
    private $input;

    /**
     * @var OutputInterface
     */
    private $output;

    /**
     * @var QuestionHelper
     */
    private $helper;
    /**
     * @var Player
     */
    private $factory;

    /**
     * Player Selector constructor.
     *
     * @param InputInterface $input
     * @param OutputInterface $output
     * @param QuestionHelper $helper
     * @param Player $factory
     */
    public function __construct(InputInterface $input, OutputInterface $output, QuestionHelper $helper, Player $factory)
    {
        $this->input  = $input;
        $this->output = $output;
        $this->helper = $helper;
        $this->factory = $factory;
    }

    /**
     *
     */
    public function __invoke()
    {
        $question = new Question('What is you name?', false);

        $name = $this->helper->ask($this->input, $this->output, $question);

        $this->output->writeln('Hello ' . $name . '');
        $this->output->writeln('');
        $this->output->writeln('Please select your combatant: ' . $name);

        $chooseCombatant = new ChoiceQuestion('Select you combatant', Player::COMBATANTS);

        $combatant = $this->helper->ask($this->input, $this->output, $chooseCombatant);

        return  $this->factory->make($name, $combatant);
    }
}