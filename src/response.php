<?php
namespace response;


use entity;
use constants;


$response = file_get_contents("test.json");
echo 'START RESPONSE                 ';
$lol = new Response($response);
 $mdr = $lol->isWhQuery();
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
    require 'constants.php';
    $this->const = new constants\Constants();
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
      echo 'OK, function DONE';
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
    if ($this->type->indexOf($this->const->TYPE_ABBREVIATION) !== -1) {
      return (true);
    }
    return (false);
  }

  public function isEntity() {
    if ($this->type->indexOf($this->const->TYPE_ENTITY) !== -1) {
      return (true);
    }
    return (false);
  }

  public function isDescription() {
    if ($this->type->indexOf($this->const->TYPE_DESCRIPTION) !== -1) {
      return (true);
    }
    return (false);
  }

  public function isHuman() {
    if ($this->type->indexOf($this->const->TYPE_HUMAN) !== -1) {
      return (true);
    }
    return (false);
  }

  public function isLocation() {
    if ($this->type->indexOf($this->const->TYPE_LOCATION) !== -1) {
      return (true);
    }
    return (false);
  }

  public function isNumber() {
    if ($this->type->indexOf($this->const->TYPE_NUMBER) !== -1) {
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
