<?php

require_once __DIR__ . '/../../vendor/autoload.php';

class Client
{
  // var $token = '4d416c43f41a1fa809db7932cae854c1';
  // var $language = 'en';
  // var $text = 'Quel est la capitale de la France?';

  public static function __construct($token, $language)
  {
    $this->token = $token;
    $this->language = $language;
  }

  public static function textRequest($text)
  {
    $params = array('text' => $text);
    if ($language) {
      $params->language = $language;
    }

    if (!$this->token) {
      return('error');
    } else
    {
      $headers = array('Content-Type' => 'application/json', 'Authorization' => "Token " . $this->token);

      $response = Requests::post(Constants->$API_ENDPOINT, $headers, json_encode($params));
      var_dump($response);
      return($response->body);
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
  // $lol = textRequest($text);
}
$text = 'Quel est la capitale de la France?';

$lol = Client::textRequest($text);
