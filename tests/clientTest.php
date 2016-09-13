<?php

namespace client\Tests;

use client;

use response;
use Requests;
use constants;
require './src/client.php';


class ClientTest extends \PHPUnit_Framework_TestCase {

  public function testtextRequestWithoutLanguage() {
    $token = '4d416c43f41a1fa809db7932cae854c1';
    $language = 'FR';

    $this->assertInstanceOf('client\Client', new client\Client($token, null));
  }

  public function testtextRequestWithoutToken() {
    $token = '4d416c43f41a1fa809db7932cae854c1';
    $language = 'FR';

    $this->assertInstanceOf('client\Client', new client\Client(null, $language));
  }

  public function testtextRequestWithoutTokenAndLanguage() {
    $token = '4d416c43f41a1fa809db7932cae854c1';
    $language = 'FR';

    $this->assertInstanceOf('client\Client', new client\Client());
  }

  public function testtextRequestWithTokenAndLanguage() {
    $token = '4d416c43f41a1fa809db7932cae854c1';
    $language = 'FR';

    $this->assertInstanceOf('client\Client', new client\Client($token, $language));
  }

}

 ?>
