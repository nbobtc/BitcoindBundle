<?php

namespace Nbobtc\Bundle\BitcoindBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

class BitcoindGetinfoCommand extends ContainerAwareCommand
{

    protected function configure()
    {
        $this
            ->setName('bitcoind:getinfo')
            ->setDescription('Run the getinfo command')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $container = $this->getContainer();
        $bitcoind  = $container->get('bitcoind');
        $info = $bitcoind->getinfo();

        $output->writeln(array(
            sprintf('Version:          %s',$info->version),
            //sprintf('Wallet Version:   %s',$info->walletversion),
            sprintf('Balance:          %s',$info->balance),
            sprintf('Blocks:           %s',$info->blocks),
            sprintf('Connections:      %s',$info->connections),
            sprintf('Proxy:            %s',$info->proxy),
            sprintf('Difficulty:       %s',$info->difficulty),
            sprintf('Testnet           %s',$info->testnet),
            sprintf('Keypool Oldest:   %s',$info->keypoololdest),
            //sprintf('Keypool Size:     %s',$info->keypoolsize),
            sprintf('TX Fee:           %s',$info->paytxfee),
            sprintf('Errors:           %s',$info->errors),
        ));
    }

}
