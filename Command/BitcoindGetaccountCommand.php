<?php

namespace Nbobtc\Bundle\BitcoindBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

class BitcoindGetaccountCommand extends ContainerAwareCommand
{

    protected function configure()
    {
        $this
            ->setName('bitcoind:getaccount')
            ->setDescription('Returns the account associated with the given address.')
            ->setDefinition(array(
                new InputArgument('address', InputArgument::REQUIRED, 'Bitcoin Address'),
            ))
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $container = $this->getContainer();
        $bitcoind  = $container->get('bitcoind');
        $account = $bitcoind->getaccount($input->getArgument('address'));
        die(var_dump($account));
    }

}


