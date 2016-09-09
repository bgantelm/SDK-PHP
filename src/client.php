<?php
namespace client;
//
require 'response.php';

use response;
// global $foo;
// echo $foo;
// echo $API_ENDPOINT;
// // use 'Constants';
// $response = file_get_contents("test.json");
// var_dump(json_decode($response));

class Client
{
   var $token = '4d416c43f41a1fa809db7932cae854c1';
   var $language = 'en';
   var $text = 'Quel est la capitale de la France?';

  public  function __construct($token, $language)
  {
    $this->token = $token;
    $this->language = $language;
  }

  public function textRequest($text)
  {
   $token = '4d416c43f41a1fa809db7932cae854c1';
    $params = array('text' => $text);
    // if ($language) {
    //   $params->language = $language;
    // }

    if (!$token) {
      return('error');
    } else {
      $headers = array('Content-Type' => 'application/json', 'Authorization' => "Token " . $token);
      $API_ENDPOINT = 'https://api.recast.ai/v1/request';
      $response = file_get_contents("test.json");

      // $lil = new response\Response($response);
      $res = Requests::post($API_ENDPOINT, $headers, json_encode($params));
      var_dump($response);
      return(new response\Response($response->body));
    }
  }

  public static function fileRequest($file)
  {
    $token = '4d416c43f41a1fa809db7932cae854c1';
    $language = 'en';

    $params = array();
    if ($language) {
      $params->language = $language;
    }

    if (!$token)
    {
      return('error');
    }
    else
    {
      $headers = array('Content-Type' => 'application/json', 'Authorization' => "Token " . $token);
      $url = 'https://api.recast.ai/v1/request';

      $response = Requests::post($url, $headers, json_encode($params));
      var_dump($response);
      return($response->body);
    }
  }
}
$text = 'What is the weather in London tomorrow? And in Paris?';

$lol = Client::textRequest($text);
