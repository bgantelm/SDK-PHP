<?php

namespace Response;

require_once __DIR__ . '/../../vendor/autoload.php';

class Response
{
  public static function __construct($response)
  {
    $this.entities = []
        $this->act = $response->act
        $this->type = $response->type
        $this->source = $response->source
        $this->intents = $response->intents
        $this->sentiment = $response->sentiment

        // forEach($response->entities as $key => $value){
        //   $value->forEach($entity => $this->entities->push(new Entity($key, $entity)))
        // })

        $this->language = $response->language
        $this->version = $response->version
        $this->timestamp = $response->timestamp
        $this->status = $response->status
  }

  public static function get($name) {

  }


  public static function all($name) {

  }


  public static function intent() {

  }


  public static function isAssert() {
    if ($this->act === $constants->ACT_ASSERT) {
      return (true);
    }
    return (false);
  }

  public static function isCommand() {
    if ($this->act === $constants->ACT_COMMAND) {
      return (true);
    }
    return (false);
  }

  public static function isWhQuery1() {
    if ($this->act === $constants->ACT_WH_QUERY) {
      return (true);
    }
    return (false);
  }

  public static function isYnQuery() {
    if ($this->act === $constants->ACT_YN_QUERY) {
      return (true);
    }
    return (false);
  }




  public static function isAbbreviation() {
    if ($this->type->indexOf($constants->TYPE_ABBREVIATION) !== -1) {
      return (true);
    }
    return (false);
  }

  public static function isEntity() {
    if ($this->type->indexOf($constants->TYPE_ENTITY) !== -1) {
      return (true);
    }
    return (false);
  }

  public static function isDescription() {
    if ($this->type->indexOf($constants->TYPE_DESCRIPTION) !== -1) {
      return (true);
    }
    return (false);
  }

  public static function isHuman() {
    if ($this->type->indexOf($constants->TYPE_HUMAN) !== -1) {
      return (true);
    }
    return (false);
  }

  public static function isLocation() {
    if ($this->type->indexOf($constants->TYPE_LOCATION) !== -1) {
      return (true);
    }
    return (false);
  }

  public static function isNumber() {
    if ($this->type->indexOf($constants->TYPE_NUMBER) !== -1) {
      return (true);
    }
    return (false);
  }




  public static function isPositive() {
    if ($this->sentiment === $constants->SENTIMENT_POSITIVE) {
      return (true);
    }
    return (false);
  }

  public static function isNeutral() {
    if ($this->sentiment === $constants->SENTIMENT_NEUTRAL) {
      return (true);
    }
    return (false);
  }

  public static function isNegative() {
    if ($this->sentiment === $constants->SENTIMENT_NEGATIVE) {
      return (true);
    }
    return (false);
  }
}
