<?php
namespace response;


require_once __DIR__ . '/../vendor/autoload.php';


$response = file_get_contents("test.json");
$lol = new Response($response);
var_dump($lol->{'act'});
$lol::isWhQuery1($lol->{'act'});
class Response
{


  public function __construct($response)
  {
    $res = json_decode($response);
    // $this->entities == [];
    $this->act = $res->{'act'};
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

  public function get($name) {
    if ($entity->{'name'} = $name) {
      $entity[] = $entity->{'name'};
      return ($entity);
    }
    return null;
  }


  public function all($name) {
    for ($i = 0; $entity[$i]->name ; $i++) {
      if ($entity->{'name'} = $name) {
        $entity[] = $entity->{'name'};
        return ($entity);
      }
    }
    return null;
  }


  public function intent() {
    return ($this->{'intents'}[0] || null);
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

  public function isWhQuery1($act) {
    if ($act === 'wh-query') {
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
