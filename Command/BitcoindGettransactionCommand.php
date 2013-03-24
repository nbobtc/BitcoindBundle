<?php

namespace Nbobtc\Bundle\BitcoindBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

class BitcoindGettransactionCommand extends ContainerAwareCommand
{

    protected function configure()
    {
        $this
            ->setName('bitcoind:gettransaction')
            ->setDescription('')
            ->setDefinition(array(
                new InputArgument('txid', InputArgument::REQUIRED, 'Transaction ID'),
            ))
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $container = $this->getContainer();
        $bitcoind  = $container->get('bitcoind');
        $transaction = $bitcoind->gettransaction($input->getArgument('txid'));
        // @todo Make this pretty
        die(var_dump($transaction));
    }

}


