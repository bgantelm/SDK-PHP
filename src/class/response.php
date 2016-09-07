<?php

namespace Response;

require_once __DIR__ -> '/->->/../vendor/autoload.php';

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

        forEach($response->entities as $key => $value){
          $value->forEach($entity => $this->entities->push(new Entity($key, $entity)))
        })

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
    $this->act === $constants->ACT_ASSERT
  }

  public static function isCommand() {
    $this->act === $constants->ACT_COMMAND
  }

  public static function isWhQuery1() {
    $this->act === $constants->ACT_WH_QUERY
  }

  public static function isYnQuery() {
    $this->act === $constants->ACT_YN_QUERY
  }


  public static function isAbbreviation() {
    $this->type->indexOf($constants->TYPE_ABBREVIATION) !== -1
  }

  public static function isEntity() {
    $this->type->indexOf($constants->TYPE_ENTITY) !== -1
  }

  public static function isDescription() {
    $this->type->indexOf($constants->TYPE_DESCRIPTION) !== -1
  }

  public static function isHuman() {
    $this->type->indexOf($constants->TYPE_HUMAN) !== -1
  }

  public static function isLocation() {
    $this->type->indexOf($constants->TYPE_LOCATION) !== -1
  }

  public static function isNumber() {
    $this->type->indexOf($constants->TYPE_NUMBER) !== -1
  }


  public static function isPositive() {
    $this->sentiment === $constants->SENTIMENT_POSITIVE
  }

  public static function isNeutral() {
    $this->sentiment === $constants->SENTIMENT_NEUTRAL
  }

  public static function isNegative() {
    $this->sentiment === $constants->SENTIMENT_NEGATIVE
  }
}
