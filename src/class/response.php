<?php

namespace Response;

require_once __DIR__ . '/../../vendor/autoload.php';


$response = file_get_contents("test.json");
$lol = new Response($response);
var_dump($lol->{'type'});
$lol::isWhQuery1($lol->{'type'});
class Response
{


  public function __construct($response)
  {
    $res = json_decode($response);
    // $this->entities == [];
    $this->act = $res->{'act'};
    var_dump($res->{'act'});
    var_dump($this->act);
    $this->type = $res->{'type'};
    $this->source = $res->{'source'};
    $this->intents = $res->{'intents'};
    $this->sentiment = $res->{'sentiment'};

    // foreach ($res->{'entities'} as $key => $value) {
    //   $value.foreach($entity) {
    //     $entities[] = new Entity(key, entity);
    //   }
    // };

    $this->language = $res->{'language'};
    $this->version = $res->{'version'};
    $this->timestamp = $res->{'timestamp'};
    $this->status = $res->{'status'};
  }

  public static function get($name) {
    if ($entity->{'name'} = $name) {
      $entity[] = $entity->{'name'};
      return ($entity);
    }
    return null;
  }


  public static function all($name) {
    for ($i = 0; $entity[$i]->name ; $i++) {
      if ($entity->{'name'} = $name) {
        $entity[] = $entity->{'name'};
        return ($entity);
      }
    }
    return null;
  }


  public static function intent() {
    return ($this->{'intents'}[0] || null);
  }


  public static function isAssert() {
    if ($this->act === 'assert') {
      return (true);
    }
    return (false);
  }

  public static function isCommand() {
    if ($this->act === 'command') {
      return (true);
    }
    return (false);
  }

  public static function isWhQuery1($act) {
    if ($act === 'wh-query') {
      return (true);
    }
    return (false);
  }

  public static function isYnQuery() {
    if ($this->act === 'yn-query') {
      return (true);
    }
    return (false);
  }




  public static function isAbbreviation() {
    if ($this->type->indexOf('abbr:') !== -1) {
      return (true);
    }
    return (false);
  }

  public static function isEntity() {
    if ($this->type->indexOf('enty:') !== -1) {
      return (true);
    }
    return (false);
  }

  public static function isDescription() {
    if ($this->type->indexOf('desc:') !== -1) {
      return (true);
    }
    return (false);
  }

  public static function isHuman() {
    if ($this->type->indexOf('hum:') !== -1) {
      return (true);
    }
    return (false);
  }

  public static function isLocation() {
    if ($this->type->indexOf('loc:') !== -1) {
      return (true);
    }
    return (false);
  }

  public static function isNumber() {
    if ($this->type->indexOf('num:') !== -1) {
      return (true);
    }
    return (false);
  }




  public static function isPositive() {
    if ($this->sentiment === 'positive') {
      return (true);
    }
    return (false);
  }

  public function isNeutral() {
    if ($this->sentiment === 'neutral') {
      return (true);
    }
    return (false);
  }

  public static function isNegative() {
    if ($this->sentiment === 'negative') {
      return (true);
    }
    return (false);
  }
}
