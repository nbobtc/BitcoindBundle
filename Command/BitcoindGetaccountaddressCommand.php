<?php

namespace Nbobtc\Bundle\BitcoindBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

class BitcoindGetaccountaddressCommand extends ContainerAwareCommand
{

    protected function configure()
    {
        $this
            ->setName('bitcoind:getaccountaddress')
            ->setDescription('Returns the current Bitcoin address for receiving payments to this account.')
            ->setDefinition(array(
                new InputArgument('account', InputArgument::OPTIONAL, '', ' '),
            ))
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $container = $this->getContainer();
        $bitcoind  = $container->get('bitcoind');
        $address = $bitcoind->getaccountaddress($input->getArgument('account'));
        $output->writeln($address);
    }

}
