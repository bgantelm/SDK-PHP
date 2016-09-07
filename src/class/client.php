 <?php

 require_once __DIR__ . '/../../vendor/autoload.php';

 class Client
{
  // var $token = '4d416c43f41a1fa809db7932cae854c1';
  // var $language = 'en';
  // var $text = 'Quel est la capitale de la France?';

// public function Client($token, $language)
// {
//   $token = $this->token;
//   $language = $this->language;
// }
  public static function textRequest($text)
  {
  $token = 'TOKEN';
  $language = 'en';
    $params = array('text' => $text);
    // if ($language)
    // {
    //   echo 'lol';
    //   $params->language = $language;
    // }

    if (!$token)
    {
      return('error');
    }
    else
    {
      $headers = array('Content-Type' => 'application/json', 'Authorization' => "Token " . $token);
      $url = 'https://api.recast.ai/v1/request';

      $response = Requests::post($url, $headers, json_encode($params));
      var_dump($response->body);
      return($response->body);
    }
  }
  // $lol = textRequest($text);
}
$text = 'Quel est la capitale de la France?';

  $lol = Client::textRequest($text);
