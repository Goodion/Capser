<?php

namespace App;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class StringCapser extends Command
{
    private function toggle($element)
    {
        return $element === 0 ? 1 : 0;
    }

    protected function configure()
    {
        $this
            ->setName('Capser')
            ->setDescription('args: string, order(even, odd), makes every even or odd letter uppercase or lowercase')
            ->addArgument('string', InputArgument::REQUIRED, 'input string')
            ->addArgument('order', InputArgument::OPTIONAL, 'order of uppercase letters(even, odd)');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $lettersArray = str_split($input->getArgument('string'));

        $j = ($input->getArgument('order') == '' || $input->getArgument('order') === 'even') ? 1 : 0;

        foreach ($lettersArray as $letter) {
                $finalArray[] = $j === 0 ? strtolower($letter) : strtoupper($letter);
                $j = $this->toggle($j);
        }

        $finalString = implode('', $finalArray);

        $output->writeln($finalString);

        return 0;
    }
}