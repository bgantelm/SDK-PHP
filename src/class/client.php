<?php

require_once __DIR__ . '/../../vendor/autoload.php';

//
// use 'Constants';


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

  function __autoload($class_name) {
      include 'classes/'.$class_name . '.php';
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
    } else
    {
      $headers = array('Content-Type' => 'application/json', 'Authorization' => "Token " . $token);
      $API_ENDPOINT = 'https://api.recast.ai/v1/request';

      $response = Requests::post($API_ENDPOINT, $headers, json_encode($params));
      var_dump($response);
      return(new Response($response->body));
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
