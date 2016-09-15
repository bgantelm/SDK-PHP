<?php
namespace client;

require 'vendor/autoload.php';

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
    if (!$options) {
      $token = $this->token;
    } else {
      $token = $options['token'];
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

      $res = $this->requestPrivate(constants\Constants::API_ENDPOINT, $headers, $params);
      // return ($res);
      return(new response\Response($response));
    }
  }

  protected function requestPrivate($url, $headers, $params) {
    $res = Requests::post($url, $headers, json_encode($params));

    return ($res);
  }

  protected function requestFilePrivate($url, $params) {
    $client = new \GuzzleHttp\Client();
    $res = $client->request('POST', $url, $params);

    return ($res);
  }

  public  function fileRequest($file, $options=null)
  {
    if (!$options) {
      $token = $this->token;
    } else {
      $token = $options['token'];
    }

    if (!$token) {
      return('Token is missing');
    } else {
      $url = constants\Constants::API_ENDPOINT;

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
