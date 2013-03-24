<?php

namespace Nbobtc\Bundle\BitcoindBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

class BitcoindGetbalanceCommand extends ContainerAwareCommand
{

    protected function configure()
    {
        $this
            ->setName('bitcoind:getbalance')
            ->setDescription('')
            ->setDefinition(array(
                new InputArgument('account', InputArgument::REQUIRED, 'Account label/name'),
                new InputArgument('minconf', InputArgument::OPTIONAL, 'Min. confirmations', 1),
            ))
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $container = $this->getContainer();
        $bitcoind  = $container->get('bitcoind');
        $balance = $bitcoind->getbalance($input->getArgument('account'), $input->getArgument('minconf'));
        $output->writeln(sprintf('Balance: %s', $balance));
    }

}


