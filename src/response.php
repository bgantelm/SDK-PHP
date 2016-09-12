<?php
namespace response;


use entity;


$response = file_get_contents("test.json");
echo 'START RESPONSE                 ';
$lol = new Response($response);
 $mdr = $lol->isWhQuery1();
 var_dump($mdr);
 echo 'END RESPONSE                   ';
class Response
{


  public function __construct($response)
  {
    echo 'START CONSTRUCTOR RESPONSE                      ';
    $res = json_decode($response);
    $this->entities = [];

    $this->entities = $res->{'entities'};
    $this->act = $res->{'act'};
    $this->type = $res->{'type'};
    $this->source = $res->{'source'};
    $this->intents = $res->{'intents'};
    $this->sentiment = $res->{'sentiment'};
    $this->entity = [];

    require_once 'entity.php';

    foreach ($res->{'entities'} as $key => $value) {
      foreach ($value as $i => $entity) {
        $this->entity[] = new entity\Entity($key, $entity);
      }
    }

    $this->language = $res->{'language'};
    $this->version = $res->{'version'};
    $this->timestamp = $res->{'timestamp'};
    $this->status = $res->{'status'};
    echo 'END CONSTRUCTOR RESPONSE               ';
  }

  public function get($name) {
    $count = count($this->entity);
    for ($i = 0; $i <= $count; $i++) {
      if ($this->entity[$i]->name == $name) {
       return ($this->entity[$i]);
     }
    }
    return null;
  }


  public function all($name) {
    $count = count($this->entity);
    $res = [];
    for ($i = 0; $i <= $count ; $i++) {
      for ($i = $i; $this->entity[$i]->name == $name; $i++) {
        $res[] = $this->entity[$i];
      }
    }
    return ($res);
  }


  public function intent() {
    if ($this->intents[0])
    return ($this->intents[0]);
    else
     return (null);
  }


  public function isAssert() {
    if ($this->act === 'assert') {
      return (true);
    }
    return (false);
  }

  public function isCommand() {
    if ($this->act === 'command') {
      return (true);
    }
    return (false);
  }

  public function isWhQuery1() {
    if ($this->act === 'wh-query') {
      echo 'OK, function DONE';
      return (true);
    }
    return (false);
  }

  public function isYnQuery() {
    if ($this->act === 'yn-query') {
      return (true);
    }
    return (false);
  }




  public function isAbbreviation() {
    if ($this->type->indexOf('abbr:') !== -1) {
      return (true);
    }
    return (false);
  }

  public function isEntity() {
    if ($this->type->indexOf('enty:') !== -1) {
      return (true);
    }
    return (false);
  }

  public function isDescription() {
    if ($this->type->indexOf('desc:') !== -1) {
      return (true);
    }
    return (false);
  }

  public function isHuman() {
    if ($this->type->indexOf('hum:') !== -1) {
      return (true);
    }
    return (false);
  }

  public function isLocation() {
    if ($this->type->indexOf('loc:') !== -1) {
      return (true);
    }
    return (false);
  }

  public function isNumber() {
    if ($this->type->indexOf('num:') !== -1) {
      return (true);
    }
    return (false);
  }




  public function isPositive() {
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

  public function isNegative() {
    if ($this->sentiment === 'negative') {
      return (true);
    }
    return (false);
  }
}
