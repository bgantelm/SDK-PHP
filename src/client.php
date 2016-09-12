<?php
namespace client;

use response;
use Requests;


class Client
{
  public  function __construct($token, $language)
  {
    $this->token = $token;
    $this->language = $language;
  }

  public function textRequest($text, $options=null)
  {
    if (!$options) {
      $token = $this->token;
    } else {
      $token = $options && $options->token;
    }
    echo $token;
    if ($this->language) {
      $params = array('text' => $text, 'language' => $this->language);
    } else {
      $params = array('text' => $text);
    }
    var_dump($params);

    if (!$token) {
      return('error');
    } else {
      $headers = array('Content-Type' => 'application/json', 'Authorization' => "Token " . $token);
      $API_ENDPOINT = 'https://api.recast.ai/v1/request';
      $response = file_get_contents("test.json");

      require 'vendor/autoload.php';
      $res = Requests::post($API_ENDPOINT, $headers, json_encode($params));
      var_dump($res);
      require 'response.php';
      return(new response\Response($response));
    }
  }

  public  function fileRequest($file, $options=null)
  {
    if (!$options) {
      $token = $this->token;
    } else {
      $token = $options && $options->token;
    }
    echo $token;
    if ($this->language) {
      $params = array('language' => $this->language);
    } else {
      $params = array();
    }
    if (!$token) {
      return('error');
    } else {
      $headers = array('Content-Type' => '', 'Authorization' => "Token " . $token);
      $url = 'https://api.recast.ai/v1/request';

      $response = Requests::post($url, $headers, json_encode($params));
      var_dump($response);
      return($response->body);
    }
  }
}
