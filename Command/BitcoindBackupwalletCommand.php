<?php

namespace Nbobtc\Bundle\BitcoindBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

class BitcoindBackupwalletCommand extends ContainerAwareCommand
{

    protected function configure()
    {
        $this
            ->setName('bitcoind:backupwallet')
            ->setDescription('Backup the wallet file')
            ->setDefinition(array(
                new InputArgument('destination', InputArgument::REQUIRED, 'Path to where the wallet should be backed up at.'),
            ))
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $container = $this->getContainer();
        $bitcoind  = $container->get('bitcoind');
        $output->writeln(sprintf('Backing up wallet to "%s"', $input->getArgument('destination')));
        $response = $bitcoind->backupwallet($input->getArgument('destination'));
        $output->writeln(sprintf('Complete'));
    }

}
