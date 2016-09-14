<?php
namespace response;


use entity;
use constants;


// $response = file_get_contents("test.json");
// echo 'START RESPONSE                 ';
// $lol = new Response($response);
//  $mdr = $lol->all('location');
//  var_dump($mdr);
//  echo 'END RESPONSE                   ';
class Response
{


  public function __construct($response)
  {
    echo 'START CONSTRUCTOR RESPONSE                      ';
    $res = json_decode($response);
    $this->entities = [];

    $this->act = $res->{'act'};
    $this->type = $res->{'type'};
    $this->source = $res->{'source'};
    $this->intents = $res->{'intents'};
    $this->sentiment = $res->{'sentiment'};

    require_once 'entity.php';

    foreach ($res->{'entities'} as $key => $value) {
      foreach ($value as $i => $entity) {
        $this->entities[] = new entity\Entity($key, $entity);
      }
    }

    $this->language = $res->{'language'};
    $this->version = $res->{'version'};
    $this->timestamp = $res->{'timestamp'};
    $this->status = $res->{'status'};
    //require 'constants.php';
    $this->const = new constants\Constants();
    echo 'END CONSTRUCTOR RESPONSE               ';
  }

  public function get($name) {
    $count = count($this->entities);
    for ($i = 0; $i <= $count; $i++) {
      if ($this->entities[$i]->name == $name) {
       return ($this->entities[$i]);
     }
    }
    return null;
  }


  public function all($name) {
    $count = count($this->entities);
    $res = [];
    for ($i = 0; $i < $count ; $i++) {
      if ($this->entities[$i]->name == $name) {
        $res[] = $this->entities[$i];
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
    if ($this->act === $this->const->ACT_ASSERT) {

      return (true);
    }
    return (false);
  }

  public function isCommand() {
    if ($this->act === $this->const->ACT_COMMAND) {
      return (true);
    }
    return (false);
  }

  public function isWhQuery() {
    if ($this->act === $this->const->ACT_WH_QUERY) {
      return (true);
    }
    return (false);
  }

  public function isYnQuery() {
    if ($this->act === $this->const->ACT_YN_QUERY) {
      return (true);
    }
    return (false);
  }




  public function isAbbreviation() {
    if (strstr($this->type, $this->const->TYPE_ABBREVIATION)) {
      return (true);
    }
    return (false);
  }

  public function isEntity() {
    if (strstr($this->type, $this->const->TYPE_ENTITY)) {
      return (true);
    }
    return (false);
  }

  public function isDescription() {
    if (strstr($this->type, $this->const->TYPE_DESCRIPTION)) {
      return (true);
    }
    return (false);
  }

  public function isHuman() {
    if (strstr($this->type, $this->const->TYPE_HUMAN)) {
      return (true);
    }
    return (false);
  }

  public function isLocation() {
    if (strstr($this->type, $this->const->TYPE_LOCATION)) {
      return (true);
    }
    return (false);
  }

  public function isNumber() {
    if (strstr($this->type, $this->const->TYPE_NUMBER)) {
      return (true);
    }
    return (false);
  }




  public function isPositive() {
    if ($this->sentiment === $this->const->SENTIMENT_POSITIVE) {
      return (true);
    }
    return (false);
  }

  public function isNeutral() {
    if ($this->sentiment === $this->const->SENTIMENT_NEUTRAL) {
      return (true);
    }
    return (false);
  }

  public function isNegative() {
    if ($this->sentiment === $this->const->SENTIMENT_NEGATIVE) {
      return (true);
    }
    return (false);
  }

  public function isVPositive() {
    if ($this->sentiment === $this->const->SENTIMENT_VPOSITIVE) {
      return (true);
    }
    return (false);
  }

  public function isVNegative() {
    if ($this->sentiment === $this->const->SENTIMENT_VNEGATIVE) {
      return (true);
    }
    return (false);
  }
}
