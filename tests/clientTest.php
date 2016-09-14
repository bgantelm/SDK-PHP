<?php

namespace client\Tests;

use client;

use response;
use Requests;
use constants;
require './src/client.php';


class ClientTest extends \PHPUnit_Framework_TestCase {

  public function testClientClassWithoutLanguage() {
    $token = '4d416c43f41a1fa809db7932cae854c1';
    $language = 'en';

    $this->assertInstanceOf('client\Client', new client\Client($token, null));
  }

  public function testClientClassWithoutToken() {
    $token = '4d416c43f41a1fa809db7932cae854c1';
    $language = 'en';

    $this->assertInstanceOf('client\Client', new client\Client(null, $language));
  }

  public function testClientClassWithoutTokenAndLanguage() {
    $token = '4d416c43f41a1fa809db7932cae854c1';
    $language = 'en';

    $this->assertInstanceOf('client\Client', new client\Client());
  }

  public function testClientClassWithTokenAndLanguage() {
    $token = '4d416c43f41a1fa809db7932cae854c1';
    $language = 'en';

    $this->assertInstanceOf('client\Client', new client\Client($token, $language));
  }

  public function testClientClassIfAttributesAreOkay() {
    $token = '4d416c43f41a1fa809db7932cae854c1';
    $language = 'en';
    $client = new client\Client($token, $language);

    $this->assertEquals($client->token, $token);
    $this->assertEquals($client->language, $language);
  }

  public function testtextRequestIfAllOkay() {
    $token = '4d416c43f41a1fa809db7932cae854c1';
    $language = 'en';
    $client = new client\Client($token, $language);

    $res = $client->textRequest('Hello world');
    $this->assertEquals($res->status_code, 200);
  }

  public function testtextRequestIfNoToken() {
    $client = new client\Client();

    $res = $client->textRequest('Hello world');
    $this->assertEquals($res, 'Token is missing');
  }

  // public function testtextRequestIf404() {
  //   $client = new client\Client();
  //
  //   $options = (object) [
  //     'language' => 'fr',
  //   ];
  //   $res = $client->textRequest('Hello world', $options);
  //   var_dump($res);
  //   $this->assertEquals($res->status_code, 404);
  // }

  public function testfileRequestIfAllOkay() {
    $token = '4d416c43f41a1fa809db7932cae854c1';
    $language = 'en';
    $client = new client\Client($token, $language);

    $res = $client->fileRequest('./file.wav');
    $this->assertEquals($res->getStatusCode(), 200);
  }

  public function testfileRequestIfNoToken() {
    $client = new client\Client();

    $res = $client->fileRequest('./file.wav');
    $this->assertEquals($res, 'Token is missing');
  }

  // public function testfileRequestIf404() {
  //   $client = new client\Client();
  //
  //   $options = (object) [
  //     'language' => 'fr',
  //   ];
  //   $res = $client->fileRequest('./file.wav', $options);
  //   var_dump($res);
  //   $this->assertEquals($res->getStatusCode(), 404);
  // }

}

 ?>
