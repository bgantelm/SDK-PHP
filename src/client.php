<?php
namespace client;

use response;
use Requests;
use constants;




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
      $token = $options && $options->token;
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

      require 'constants.php';

      $const = new constants\Constants();

      require 'vendor/autoload.php';

      $res = Requests::post($const->API_ENDPOINT, $headers, json_encode($params));
      return ($res);
      // require 'response.php';
      // return(new response\Response($response));
    }
  }

  public  function fileRequest($file, $options=null)
  {
    if (!$options) {
      $token = $this->token;
    } else {
      $token = $options && $options->token;
    }
    if (!$token) {
      return('Token is missing');
    } else {
      $const = new constants\Constants();

      $url = 'https://api.recast.ai/v1/request';
      require 'vendor/autoload.php';
      $client = new \GuzzleHttp\Client();

      if (!$this->language) {
        $res = $client->request('POST', $url, [
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
        ]);
      } else {
        $res = $client->request('POST', $const->API_ENDPOINT, [
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
        ]);
      }
      return ($res);
      $body = (string) $res->getBody();
      //  require 'response.php';
      //  return(new response\Response($res));
      //return(new response\Response($response)
    }
  }
}
