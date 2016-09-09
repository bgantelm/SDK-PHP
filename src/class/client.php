<?php

namespace Client;

require_once __DIR__ . '/../../vendor/autoload.php';
//
// global $foo;
// echo $foo;
// echo $API_ENDPOINT;
// // use 'Constants';
// $response = file_get_contents("test.json");
// var_dump(json_decode($response));

class Client
{
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
    } else {
      $headers = array('Content-Type' => 'application/json', 'Authorization' => "Token " . $token);
      $API_ENDPOINT = 'https://api.recast.ai/v1/request';

      $response = Requests::post($API_ENDPOINT, $headers, json_encode($params));
      //var_dump($response);
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

// class Response
// {
//
//
//   public function __construct($response)
//   {
//     $response = file_get_contents("../../test.json");
//     var_dump(json_decode($response));
//     $entities == []
//     $act = $response->act
//     $type = $response->type
//     $source = $response->source
//     $intents = $response->intents
//     $sentiment = $response->sentiment
//
//     foreach ($response->entities as $key => $value) {
//       $value.foreach($entity) {
//         $entities[] = new Entity(key, entity);
//       }
//     }
//
//     $language = $response->language
//     $version = $response->version
//     $timestamp = $response->timestamp
//     $status = $response->status
//   }
//
//   public static function get($name) {
//     if ($entity->name = $name) {
//       $entity[] = $entity->name;
//       return ($entity);
//     }
//     return null;
//   }
//
//
//   public static function all($name) {
//     for (int i = 0; $entity[i]->name ; i++) {
//       if ($entity->name = $name) {
//         $entity[] = $entity->name;
//         return ($entity);
//       }
//     }
//     return null;
//   }
//
//
//   public static function intent() {
//     return ($this.intent[0] || null);
//   }
//
//
//   public static function isAssert() {
//     if ($this->act === $constants->ACT_ASSERT) {
//       return (true);
//     }
//     return (false);
//   }
//
//   public static function isCommand() {
//     if ($this->act === $constants->ACT_COMMAND) {
//       return (true);
//     }
//     return (false);
//   }
//
//   public static function isWhQuery1() {
//     if ($this->act === $constants->ACT_WH_QUERY) {
//       return (true);
//     }
//     return (false);
//   }
//
//   public static function isYnQuery() {
//     if ($this->act === $constants->ACT_YN_QUERY) {
//       return (true);
//     }
//     return (false);
//   }
//
//
//
//
//   public static function isAbbreviation() {
//     if ($this->type->indexOf($constants->TYPE_ABBREVIATION) !== -1) {
//       return (true);
//     }
//     return (false);
//   }
//
//   public static function isEntity() {
//     if ($this->type->indexOf($constants->TYPE_ENTITY) !== -1) {
//       return (true);
//     }
//     return (false);
//   }
//
//   public static function isDescription() {
//     if ($this->type->indexOf($constants->TYPE_DESCRIPTION) !== -1) {
//       return (true);
//     }
//     return (false);
//   }
//
//   public static function isHuman() {
//     if ($this->type->indexOf($constants->TYPE_HUMAN) !== -1) {
//       return (true);
//     }
//     return (false);
//   }
//
//   public static function isLocation() {
//     if ($this->type->indexOf($constants->TYPE_LOCATION) !== -1) {
//       return (true);
//     }
//     return (false);
//   }
//
//   public static function isNumber() {
//     if ($this->type->indexOf($constants->TYPE_NUMBER) !== -1) {
//       return (true);
//     }
//     return (false);
//   }
//
//
//
//
//   public static function isPositive() {
//     if ($this->sentiment === $constants->SENTIMENT_POSITIVE) {
//       return (true);
//     }
//     return (false);
//   }
//
//   public static function isNeutral() {
//     if ($this->sentiment === $constants->SENTIMENT_NEUTRAL) {
//       return (true);
//     }
//     return (false);
//   }
//
//   public static function isNegative() {
//     if ($this->sentiment === $constants->SENTIMENT_NEGATIVE) {
//       return (true);
//     }
//     return (false);
//   }
// }
$text = 'What is the weather in London tomorrow? And in Paris?';

$lol = Client::textRequest($text);
