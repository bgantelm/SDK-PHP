 <?php
namespace Client;

require_once __DIR__ . '/vendor/autoload.php';


class Client
{
  var $token = '4d416c43f41a1fa809db7932cae854c1';
  var $language = 'en';
  var $text = 'Quel est la capitale de la France?';

// public function Client($token, $language)
// {
//   $token = $this->token;
//   $language = $this->language;
// }
  public function textRequest($text)
  {
    $params = array('text' => $text);
    if ($this->language)
    {
      echo 'lol';
      $params->language = $this->language;
    }

    if (!$this->token)
    {
      echo 'error';
      return('error');
    }
    else
    {
      $headers = array('Content-Type' => 'application/json', 'Authorization' => "Token " . $this->token);
      $url = 'https://api.recast.ai/v2/request';

      $response = Requests::post($url, $headers, json_encode($params));
      var_dump($response->body);
    }
  }
}
