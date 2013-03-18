NbobtcBitcoindBundle
====================

## Installation

Just run `php composer.phar require nbobtc/bitcoind-bundle` in your symfony2 project
to install in your vendor directory and update you AppKernel.php file.

    // app/AppKernel.php
    public function registerBundles()
    {   
        $bundles = array(
            // ...
            new Nbobtc\Bundle\BitcoindBundle\BitcoindBundle(),
            // ...
        );  

        return $bundles;
    }

## Configuration

This is the default configuration. You can get away with just setting the
username and password if everything else is correct.

    # app/config/config.yml
    bitcoind:             

        # schema used to connect to bitcoind
        schema:               http

        # username used to connect to bitcoind
        username:             ~
        password:             ~
        host:                 127.0.0.1
        port:                 8332

## Usage

You now have access to a bitcoind service.

    // In a controller
    $bitcoind = $this->get('bitcoind');

For more information on how to use the bitcoind wrapper see the [nbobtc/bitcoind-php](https://github.com/nbobtc/bitcoind-php)
project.

## License

Copyright (C) 2013 Joshua Estes

Permission is hereby granted, free of charge, to any person obtaining a copy of
this software and associated documentation files (the "Software"), to deal in
the Software without restriction, including without limitation the rights to
use, copy, modify, merge, publish, distribute, sublicense, and/or sell copies of
the Software, and to permit persons to whom the Software is furnished to do so,
subject to the following conditions:

The above copyright notice and this permission notice shall be included in all
copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS
FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR
COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER
IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN
CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.

