<?php
namespace client;

use response;
use Requests;
use constants;


require 'constants.php';
require 'response.php';


class Client
{
  public  function __construct($token=null, $language=null)
  {
    $this->token = $token;
    $this->language = $language;
  }

  public function textRequest($text, $options=null)
  {
    var_dump($options);

    if (!$options) {
      $token = $this->token;
    } else {
      $token = $options && $options['token'];
    }
    if ($this->language) {
      $params = array('text' => $text, 'language' => $this->language);
    } else {
      $params = array('text' => $text);
    }

    if (!$token) {
      return('Token is missing');
    } else {
      $headers = array('Content-Type' => 'application/json', 'Authorization' => "Token " . $token);
      $response = file_get_contents("test.json");


      $const = new constants\Constants();

      require 'vendor/autoload.php';
      $res = $this->requestPrivate($const->API_ENDPOINT, $headers, $params);
      // return ($res);
      return(new response\Response($response));
    }
  }

  protected function requestPrivate($url, $headers, $params) {
    require 'vendor/autoload.php';

    $res = Requests::post($url, $headers, json_encode($params));
    return ($res);
  }

  protected function requestFilePrivate($url, $params) {
    require 'vendor/autoload.php';

    $client = new \GuzzleHttp\Client();
    $res = $client->request('POST', $url, $params);
    return ($res);

  }

  public  function fileRequest($file, $options=null)
  {
    var_dump($options['token']);
    if (!$options) {
      $token = $this->token;
    } else {
      $token = $options['token'];
      echo $token;
    }
    if (!$token) {
      return('Token is missing');
    } else {
      $const = new constants\Constants();
      $url = $const->API_ENDPOINT;

      if (!$this->language) {
        $params = [
          'headers' => [
            'Authorization' => "Token " . $token
          ],
          'multipart' => [
            [
              'Content-Type' => 'multipart/form-data',
              'name'     => 'voice',
              'contents' => fopen($file, 'r')
            ],
          ]
        ];
        echo 'lol';
        var_dump($params);
        $res = $this->requestFilePrivate($url, $params);
      } else {
        $params = [
          'headers' => [
            'Authorization' => "Token " . $token
          ],
          'multipart' => [
            [
              'Content-Type' => 'multipart/form-data',
              'name'     => 'voice',
              'contents' => fopen($file, 'r')
            ],
            [
              'name' => 'language',
              'contents' => $this->language
            ],
          ]
        ];
        $res = $this->requestFilePrivate($url, $params);
      }
  //     return ($res);
       // $body = (string) $res->getBody();
       $response = file_get_contents("test.json");
       return(new response\Response($response));
    }
  }
}
