<?php

namespace Nbobtc\Bundle\BitcoindBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

class BitcoindListaccountsCommand extends ContainerAwareCommand
{

    protected function configure()
    {
        $this
            ->setName('bitcoind:listaccounts')
            ->setDescription('List all accounts')
            ->setDefinition(array(
                new InputArgument('minconf', InputArgument::OPTIONAL, 'Min. confirmations', 1),
            ))
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $container = $this->getContainer();
        $bitcoind  = $container->get('bitcoind');
        $accounts = $bitcoind->listaccounts($input->getArgument('minconf'));
        foreach ($accounts as $account) {
            $output->writeln(array(
                sprintf("Account: %s", $account['account']),
                sprintf("Balance: %s", $account['balance']),
                '',
            ));
        }
    }

}


