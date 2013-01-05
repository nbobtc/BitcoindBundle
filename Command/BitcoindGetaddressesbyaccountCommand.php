<?php

namespace Nbobtc\Bundle\BitcoindBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

class BitcoindGetaddressesbyaccountCommand extends ContainerAwareCommand
{

    protected function configure()
    {
        $this
            ->setName('bitcoind:getaddressesbyaccount')
            ->setDescription('Returns the list of addresses for the given account.')
            ->setDefinition(array(
                new InputArgument('account', InputArgument::REQUIRED, 'Account label/name'),
            ))
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $container = $this->getContainer();
        $bitcoind  = $container->get('bitcoind');
        $addresses = $bitcoind->getaddressesbyaccount($input->getArgument('account'));
        $output->writeln($addresses);
    }

}
